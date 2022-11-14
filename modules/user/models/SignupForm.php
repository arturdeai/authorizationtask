<?php
namespace app\modules\user\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $password_repeat;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            ['first_name', 'required'],
            ['first_name', 'string', 'min' => 2, 'max' => 255],

            ['last_name', 'required'],
            ['last_name', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => User::className(), 'message' => 'This email address has already been taken.'],

            ['password', 'compare'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['password_repeat', 'required'],
            ['password_repeat', 'string', 'min' => 6],
        ];
    }

    function emailExtract($email, $item=0) {
        $data = explode("@", $email);
        return @$data[$item];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->emailExtract($this->email);
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->status = User::STATUS_WAIT;
        $user->generateAuthKey();
        $user->generateEmailConfirmToken();

        if ($user->save()) {
            Yii::$app->mailer->compose('@app/modules/user/mail/emailConfirm.php', ['user' => $user])
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->name])
                ->setTo($this->email)
                ->setSubject('Email confirmation for ' . Yii::$app->name)
                ->send();
            return $user;
        }
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['senderEmail']=> Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }


}