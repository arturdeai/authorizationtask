<?php
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */

$this->title = Yii::t('app', 'Редактирование');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Профиль'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-update">
    <div class="user-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'first_name')
            ->textInput(['maxlength' => true])
            ->label('Имя') ?>

        <?= $form->field($model, 'last_name')
            ->textInput(['maxlength' => true])
            ->label('Фамилия') ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'),
                ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>