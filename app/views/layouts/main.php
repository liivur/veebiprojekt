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
use app\common\components\languageSwitcher;
use app\web\Session;
AppAsset::register($this);
IeAsset::register($this);
?>

<!DOCTYPE html>
<html >
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
                <?php echo Html::a('<h1>'.Yii::$app->params['siteTitle'].'</h1>', Yii::$app->homeUrl, []);
                ?>
            </div>
            <div class="col-md-8 menu-container">
                <ul class="menu list-unstyled">
                    <li class="menu-item">


                        <form action="<?php echo Url::to(['site/search']); ?>" class="search-form">
                            <label for="otsi">
                                <?= Yii::t('app', 'search') ?>

                                <input id="otsi" type="text" name="q">
                            </label>
                            <button type="submit"><?= Yii::t('app', 'search') ?></button>
                        </form>
                    </li>
                    <li class="menu-item"><a href="<?php echo Url::to(['site/vote']); ?>"><?= Yii::t('app', 'vote') ?></a></li>
                    <li class="menu-item"><a href="<?php echo Url::to(['site/candidates']); ?>"><?= Yii::t('app', 'candidates') ?></a></li>
                    <li class="menu-item"><a href="<?php echo Url::to(['site/statistics']); ?>"><?= Yii::t('app', 'statistics') ?></a></li>


                     <li class="menu-item">
                         <?= languageSwitcher::Widget() ?>
                    </li>
                        
                    <?php 
                    if (Yii::$app->user->isGuest) {
                        ?>
                        <li class="menu-item login-item">
                            <a href="#" class="js-login-btn"><?= Yii::t('app', 'login') ?></a>
                            <form action="<?php echo Url::to(['site/login']); ?>" method="post" class="login-form js-login-form hidden">
                                <label for="loginnimi">
                                    Nimi:
                                    <input id="loginnimi" type="text" name="LoginForm[username]">
                                </label>
                                <label for="loginpassword">
                                    Parool:
                                    <input id="loginpassword" type="password" name="LoginForm[password]">
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
                            echo '<li class="menu-item"><a href="'.Url::to(['admin/index']).'"> '.Yii::t('app', 'systemmanagement').'</a></li>';
                        }
                        echo '<li class="menu-item"><a href="'.Url::to(['site/logout']).'">'.Yii::t('app', 'logout').'</a></li>';
                    }
                    ?>
                   
                </ul>
            </div>
        </div>
    </header>
    <div class="content container">
        <?= $content ?>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
