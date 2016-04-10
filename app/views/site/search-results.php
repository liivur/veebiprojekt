<?php
$this->title = Yii::t('app', 'search');
?>


<h1><?= Yii::t('app', 'search') ?></h1>
<form class="row">
	<div class="col-md-12">
	   	<span title=<?= Yii::t('app', 'username help') ?>>
			<label>
			   		<?= Yii::t('app', 'search') ?>: <input type="text" name="q">
			</label>
			<button type="submit"><?= Yii::t('app', 'search') ?></button>
	   	</span>
	</div>
	<div class="col-md-12">
		<span title=<?= Yii::t('app', 'candidate help') ?>> 
			<label>
					<?= Yii::t('app', 'candidate') ?>: <input type="checkbox" name="candidate" checked>
			</label>
		</span>
		<span title=<?= Yii::t('app', 'region help') ?>> 
			<label>
				<?= Yii::t('app', 'region') ?>: <input type="checkbox" name="area">
			</label>
		</span>
		<span title=<?= Yii::t('app', 'party help') ?>> 
			<label>
				<?= Yii::t('app', 'party') ?>: <input type="checkbox" name="party">
			</label>
		</span>
	</div>
</form>
<hr>
<h3><?= Yii::t('app', 'results') ?>:</h3>
<div>
	<div>
		Kandidaat <a href="#"><?= Yii::t('app', 'vote') ?></a>
	</div>
	<div>
		Kandidaat <a href="#"><?= Yii::t('app', 'vote') ?></a>
	</div>
	<div>
		Kandidaat <a href="#"><?= Yii::t('app', 'vote') ?></a>
	</div>
	<div>
		Kandidaat <a href="#"><?= Yii::t('app', 'vote') ?></a>
	</div>
</div>