<?php
$this->title = Yii::$app->params['siteTitle'] . ' - '. Yii::t('app', 'welcome');
?>


<ul class="menu list-unstyled">
	<div class="row">
		<div class="col-md-3">
			<li class="menu-item"><a href="./candidacy.php"><h3><?= Yii::t('app', 'stand for elections') ?></h3></a></li>
			<li class="menu-item"><a href="./vote.php"><h3><?= Yii::t('app', 'vote') ?></h3></a></li>
		</div>	
	</div>
</ul>