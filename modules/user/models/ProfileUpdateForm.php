<?php
namespace app\modules\user\models;

use yii\base\Model;
use yii\db\ActiveQuery;
use Yii;

class ProfileUpdateForm extends Model
{
    public $first_name;
    public $last_name;

    /**
     * @var User
     */
    private $_user;

    public function __construct(User $user, $config = [])
    {
        $this->_user = $user;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            ['first_name', 'required'],
            ['first_name', 'string', 'min' => 2, 'max' => 255],

            ['last_name', 'required'],
            ['last_name', 'string', 'min' => 2, 'max' => 255],
        ];
    }

    public function update()
    {
        if ($this->validate()) {
            $user = $this->_user;
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            return $user->save();
        } else {
            return false;
        }
    }
}