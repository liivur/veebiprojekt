<div class="row">
	<div class="col-md-2">
		<button class="js-form-toggle" data-target=".js-add-user-form">Lisa kasutaja</button>
	</div>
	<div class="col-md-2">
		<button class="js-form-toggle" data-target=".js-add-party-form">Lisa partei</button>
	</div>
	<div class="col-md-2">
		<button class="js-form-toggle" data-target=".js-add-area-form">Lisa piirkond</button>
	</div>
</div>
<div class="row js-forms admin-forms" id="field">
	<div class="col-md-12">
		<form class="js-add-user-form hidden">
			<label>
				Nimi:
				<input type="text" name="user">
			</label>
			<label>
				E-mail:
				<input type="password" name="email">
			</label>
			<label>
				Partei:
				<select name="party">
					<option>Keskerakond</option>
					<option>Reformierakond</option>
					<option>Sotsiaaldemokraadid</option>
				</select>
			</label>
			<label>
				Piirkond:
				<select name="piirkond">
					<option>Tallinn</option>
					<option>Tartumaa</option>
					<option>Harjumaa</option>
				</select>
			</label>
			<button type="submit">Lisa kasutaja</button>
		</form>
	</div>
	<div class="col-md-12">
		<form class="js-add-party-form hidden">
			<label>
				Nimi:
				<input type="text" name="user">
			</label>
			<button type="submit">Lisa Partei</button>
		</form>
	</div>
	<div class="col-md-12">
		<form class="js-add-area-form hidden">
			<label>
				Nimi:
				<input type="text" name="user">
			</label>
			<button type="submit">Lisa piirkond</button>
		</form>
	</div>
</div>