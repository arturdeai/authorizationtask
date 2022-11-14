<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <p class="text-center">Чтобы зарегистрироваться, заполните следующие поля:</p>
    <div class="row">
        <div class="col-lg-4 w-50 mx-auto">
            <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
                'options' => [
                    'class' => 'form-horizontal col-lg-11'
                ],
            ]); ?>
            <?= $form->field($model, 'first_name')->textInput([
                'autofocus' => true,
                'class' => 'form-control',
                'placeholder' => 'Имя'
            ])->label('Имя', ['class' => "sr-only"]) ?>

            <?= $form->field($model, 'last_name')->textInput([
                'autofocus' => true,
                'class' => 'form-control',
                'placeholder' => 'Фамилия'
            ])->label('Фамилия', ['class' => "sr-only"]) ?>

            <?= $form->field($model, 'email')->textInput([
                'autofocus' => true,
                'class' => 'form-control',
                'placeholder' => 'E-mail'
            ])->label('E-mail', ['class' => "sr-only"]) ?>

            <?= $form->field($model, 'password_repeat')->passwordInput([
                'autofocus' => true,
                'class' => 'form-control',
                'placeholder' => 'Пароль'
            ])->label('Повтор пароля', ['class' => "sr-only"]) ?>

            <?= $form->field($model, 'password')->passwordInput([
                'autofocus' => true,
                'class' => 'form-control',
                'placeholder' => 'Повтор пароля'
            ])->label('Пароль', ['class' => "sr-only"]) ?>

            <div class="form-group">
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>