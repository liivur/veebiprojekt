
<h1><?= Yii::t('app', 'search') ?></h1>
<form class="row">
	<div class="col-md-12">
		<label>
			   <span title=<?= Yii::t('app', 'username help') ?>> <?= Yii::t('app', 'search') ?>: <input type="text" name="q">
		</label>
		<button type="submit"><?= Yii::t('app', 'search') ?></button>
	</div>
	<div class="col-md-12">
	
	</span>
		<label>
		<span title=<?= Yii::t('app', 'candidate help') ?>> 
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