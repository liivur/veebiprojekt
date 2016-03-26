<?php

use app\models\activerecord\Areas;
use app\models\activerecord\Parties;
use yii\helpers\Url;

if (!isset($errors)) {
	$errors = [];
}
if (!isset($success)) {
	$success = false;
}

$parties = Parties::find()->all();
$areas = Areas::find()->all();
?>
<div class="row">
	<div class="col-md-2">
		<button class="js-form-toggle" data-target=".js-add-user-form"><?= Yii::t('app', 'add user') ?></button>
	</div>
	<div class="col-md-2">
		<button class="js-form-toggle" data-target=".js-add-party-form"><?= Yii::t('app', 'add party') ?></button>
	</div>
	<div class="col-md-2">
		<button class="js-form-toggle" data-target=".js-add-area-form"><?= Yii::t('app', 'add region') ?></button>
	</div>
</div>
<div class="row js-forms admin-forms" id="field">
	<div class="errors js-errors">
		<?php
		foreach ($errors as $error) {
			foreach ($error as $msg) {
				echo '<p class="error">'.$msg.'</p>';
			}
		}
		?>
	</div>
	<div class="js-success">
		<?php
		if ($success) {
			echo '<p class="success">Operatsioon oli edukas</p>';
		}
		?>
	</div>
	<div class="col-md-12">
		<form action="<?php echo Url::to(['admin/adduser']); ?>" method="post" class="js-add-user-form hidden">
			<label>
				Nimi:
				<input type="text" name="Users[name]">
			</label>
			<label>
				Kasutaja nimi:
				<input type="text" name="Users[username]">
			</label>
			<label>
				Parool:
				<input type="password" name="Users[password]">
			</label>
			<label>
				E-mail:
				<input type="text" name="Users[email]">
			</label>
			<label>
				Isikukood:
				<input type="text" name="Users[code]">
			</label>
			<label>
				Partei:
				<select name="Users[party_id]">
					<option value="">-</option>
					<?php
					foreach ($parties as $party) {
						echo '<option value="'.$party->id.'">'.$party->name.'</option>';
					}
					?>
				</select>
			</label>
			<label>
				Piirkond:
				<select name="Users[voting_area]">
					<option value="">-</option>
					<?php
					foreach ($areas as $area) {
						echo '<option value="'.$area->id.'">'.$area->name.'</option>';
					}
					?>
				</select>
			</label>
			<button type="submit">Lisa kasutaja</button>
		</form>
	</div>
	<div class="col-md-12">
		<form action="<?php echo Url::to(['admin/addparty']); ?>" method="post" class="js-add-party-form hidden">
			<label>
				Nimi:
				<input type="text" name="Parties[name]">
			</label>
			<button type="submit">Lisa Partei</button>
		</form>
	</div>
	<div class="col-md-12">
		<form action="<?php echo Url::to(['admin/addarea']); ?>" method="post" class="js-add-area-form hidden">
			<label>
				Nimi:
				<input type="text" name="Areas[name]">
			</label>
			<button type="submit">Lisa piirkond</button>
		</form>
	</div>
</div>