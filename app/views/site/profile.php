<?php

use app\models\activerecord\Credentials;
use yii\helpers\Url;

$this->title = Yii::t('app', 'profile');

$fbLinks = Credentials::find()->where([
		'user_id' => Yii::$app->user->id,
		'type' => Credentials::FACEBOOK
	])->all();
?>

<div class="row">
	<?php
	foreach ($fbLinks as $link) {
		echo '<div class="col-sm-12">'.Yii::t('app', 'fb user').': '.$link->token.'</div>';
	}
	?>

	<div class="col-md-2">
		<a href="https://www.facebook.com/dialog/oauth?client_id=201017283615903&redirect_uri=<?php echo Url::to(['facebook/link'], true); ?>" class="">
	        <?php echo Yii::t('app', 'link with facebook'); ?>
	    </a>
	</div>
</div>