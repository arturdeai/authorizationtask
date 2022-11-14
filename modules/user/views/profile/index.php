<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\Modal;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */

$this->title = Yii::t('app', 'Профиль');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile">
    <p>
        <?= Html::a(Yii::t('app',
            'Редактировать профиль'),
            ['update'],
            ['class' => 'btn btn-success', ]) ?>

        <?= Html::a(Yii::t('app',
            'Удалить профиль'),
            ['del'],
            ['class' => 'btn btn-danger',
                'data' => [
                'confirm' => 'Вы действительно хотите удалить профиль?'
                ]
            ]
        ) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'first_name',
            'last_name',
        ],
    ]) ?>

</div>