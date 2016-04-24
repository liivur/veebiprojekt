<?php

/* @var $this yii\web\View */
use app\assets\MessageAsset;
use app\web\Session;
use yii\helpers\Html;
use yii\helpers\Url;
$this->registerJs('var requestUrl = "'.Url::to(['site/long-poll']).'"',  \yii\web\View::POS_HEAD);
MessageAsset::register($this);
$this->title = Yii::$app->params['siteTitle'];




?>

<h2>Teade:</h2>   
<div id="message"></div>
<form method="POST" action="<?php echo Url::to(['site/set-message']); ?>" id="js-set-message-form">
    <input name="message">
    <button><?php echo Yii::t('app', 'send') ?></button>
</form>

<div class="row" id="field">


    <div class="col-md-4">



        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>        
    </div>
    <div class="col-md-4">
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>  
    </div>
    <div class="col-md-4">
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>
        <p><?= Yii::t('app', 'candidate') ?></p>  
    </div>
</div>

