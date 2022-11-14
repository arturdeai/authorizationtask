<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '@web/favicon.ico']);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header id="header">
        <?php
        NavBar::begin([
            'brandLabel' => 'Authorizationtask',//Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-inverse navbar-expand-sm  ',
                'style '=> 'background-color: #e3f2fd;'
            ]
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav nav-pills ml-auto'],
            'items' => array_filter([
                Yii::$app->user->isGuest ?
                    ['label' => 'Регистрация', 'url' => ['/user/default/signup']] :
                    false,
                !Yii::$app->user->isGuest ?
                    ['label' => Yii::t('app', 'Профиль'), 'url' => ['/user/profile/index']] :
                    false,
                Yii::$app->user->isGuest ?
                    ['label' => 'Вход', 'url' => ['/user/default/login']] :
                    ['label' => 'Выход (' . Yii::$app->user->identity->username . ')', 'url' => ['/user/default/logout'],
                        'linkOptions' => ['data-method' => 'post']],
            ]),
        ]);
        NavBar::end();
        ?>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">

            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget([
                    'links' => $this->params['breadcrumbs'],
                    'options' => [
                        'style'=>'background-color: #e3f2fd;'
                    ],
                ]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>