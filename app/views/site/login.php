<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'login');
?>
<h1><?= Yii::t('app', 'must log in') ?></h1>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>

   <span title=<?= Yii::t('app', 'username') ?>> 
   <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?></span>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ]) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Logi sisse', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>


<?php
/*
use yii\helpers\Url;

?>
Selle tegevuse jaoks pead sisse logima:
<form action="<?php echo Url::to(['site/login']); ?>" method="post" class="login-form">
    <div>
        <label>
            Nimi:
            <input type="text" name="LoginForm[username]">
        </label>
    </div>
    <div>
    <label>
        Parool:
        <input type="password" name="LoginForm[password]">
    </label>
    </div>
    <div>
        <input type="hidden" name="LoginForm[rememberMe]" value="0">
        <label for="loginform-rememberme">
            Jäta meelde
        </label>
        <input type="checkbox" id="loginform-rememberme" name="LoginForm[rememberMe]" value="1" checked=""> 
    </div>
    <button class="button" type="submit">Logi sisse</button>
    <div class="fb-login-button" data-max-rows="1" data-size="large" 
        data-show-faces="false" data-auto-logout-link="true"></div>
</form>

<?php
*/