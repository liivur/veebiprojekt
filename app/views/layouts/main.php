<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\assets\IeAsset;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
IeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <header class="container header">
        <div class="row">
            <div class="col-md-4">
                <?php echo Html::a('<h1>'.Yii::$app->params['siteTitle'].'</h1>', Yii::$app->homeUrl, []); ?>
            </div>
            <div class="col-md-8 menu-container">
                <ul class="menu list-unstyled">
                    <li class="menu-item">
                        <form action="<?php echo Url::to(['site/search']); ?>" class="search-form">
                            <label>
                                Otsi:
                                <input type="text" name="q">
                            </label>
                            <button type="submit">Otsi</button>
                        </form>
                    </li>
                    <li class="menu-item"><a href="<?php echo Url::to(['site/vote']); ?>">Hääleta</a></li>
                    <li class="menu-item"><a href="<?php echo Url::to(['site/candidates']); ?>">Kandidaadid</a></li>
                    <li class="menu-item"><a href="<?php echo Url::to(['site/statistics']); ?>">Statistika</a></li>
                    <?php 
                    if (Yii::$app->user->isGuest) {
                        ?>
                        <li class="menu-item login-item">
                            <a href="#" class="js-login-btn">Logi sisse</a>
                            <form action="<?php echo Url::to(['site/login']); ?>" method="post" class="login-form js-login-form hidden">
                                <label>
                                    Nimi:
                                    <input type="text" name="LoginForm[username]">
                                </label>
                                <label>
                                    Parool:
                                    <input type="password" name="LoginForm[password]">
                                </label>
                                <input type="hidden" name="LoginForm[rememberMe]" value="0">
                                <label for="loginform-rememberme">
                                    Jäta meelde
                                    <input type="checkbox" id="loginform-rememberme" name="LoginForm[rememberMe]" value="1" checked=""> 
                                </label>
                                <button class="button" type="submit">Logi sisse</button>
                                <div class="fb-login-button" data-max-rows="1" data-size="large" 
                                    data-show-faces="false" data-auto-logout-link="true"></div>
                            </form>
                        </li>
                        <?php
                    } else {
                        if (Yii::$app->user->identity->is_admin) {
                            echo '<li class="menu-item"><a href="'.Url::to(['admin/index']).'">Systeemi haldus</a></li>';
                        }
                        echo '<li class="menu-item"><a href="'.Url::to(['site/logout']).'">Logi välja</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </header>
    <section class="content container">
        <?= $content ?>
    </section>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
