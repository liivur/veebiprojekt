<div  id="field">
	<div class="row">
	<?= Yii::t('app', 'you have chosen') ?>
		
		<button type="candidacy"><?= Yii::t('app', 'cancel') ?></button>
	</div>
		
	<div class="row">	
		<p><?= Yii::t('app', 'choose') ?></p>
			<select name="party">
				<option><?= Yii::t('app', 'candidate') ?></option>
				<option><?= Yii::t('app', 'candidate') ?></option>
				<option><?= Yii::t('app', 'candidate') ?></option>
			</select>

		<button type="candidacy"><?= Yii::t('app', 'submit') ?></button>
	</div>
</div>