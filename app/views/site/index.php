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
<?php //siin peaks välja printima  

 ?>
<div id="message"></div>
            
      

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

