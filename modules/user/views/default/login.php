<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \app\modules\user\models\LoginForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <p class="text-center">Чтобы войти, заполните следующие поля:</p>

    <div class="row">
        <div class="col-lg-4 w-50 mx-auto">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => [
                    'class' => 'form-horizontal col-lg-11'
                ],
            ]); ?>

            <?= $form->field($model, 'email')->textInput([
                'autofocus' => true,
                'class' => 'form-control',
                'placeholder' => 'E-mail'
            ])->label('E-mail', ['class' => "sr-only"]) ?>

            <?= $form->field($model, 'password')->passwordInput([
                'autofocus' => true,
                'class' => 'form-control',
                'placeholder' => 'Пароль'
            ])->label('Пароль', ['class' => "sr-only"]) ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div class="form-group">
                <?= Html::submitButton('Войти', [
                    'class' => 'btn btn-primary btn-block',
                    'name' => 'login-button',
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>