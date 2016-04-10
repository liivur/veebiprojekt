<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

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

    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'title' => Yii::t('app', 'username')]) ?>

    <?= $form->field($model, 'password')->passwordInput(['title' => Yii::t('app', 'password')]) ?>

    <?= $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ]) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Logi sisse', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>
    <?php 
    $error = Yii::$app->session->getFlash('noSuchUser'); 
    if ($error) {
        echo '<div class="error">'.Yii::t('app', 'no such user').'</div>';
    }
    ?>
    <a href="https://www.facebook.com/dialog/oauth?client_id=201017283615903&redirect_uri=<?php echo Url::to(['facebook/login'], true); ?>" class="fb-login-button btn-facebook">
        <?php echo Yii::t('app', 'login with facebook'); ?>
    </a>
<?php ActiveForm::end(); ?>
