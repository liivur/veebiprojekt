<div class="row">
	<div class="col-md-4">
		<a href="./index.php"><h1>E-HÄÄLETUS</h1></a>
	</div>
	<div class="col-md-8 menu-container">
		<ul class="menu list-unstyled">
			<li class="menu-item">
				<form action="./search.php" class="search-form">
					<label>
						Otsi:
						<input type="text" name="q">
					</label>
					<button type="submit">Otsi</button>
				</form>
			</li>
			<li class="menu-item"><a href="./candidates.php">Kandidaadid</a></li>
			<li class="menu-item"><a href="./statistics.php">Statistika</a></li>
			<li class="menu-item login-item">
				<a href="#" class="js-login-btn">Logi sisse</a>
				<form action="./admin.php" class="login-form js-login-form hidden">
					<label>
						Nimi:
						<input type="text" name="user">
					</label>
					<label>
						Parool:
						<input type="password" name="password">
					</label>
					<button type="submit">Logi sisse</button>
					<div class="fb-login-button" data-max-rows="1" data-size="large" 
						data-show-faces="false" data-auto-logout-link="true"></div>
				</form>
			</li>
		</ul>
	</div>
</div>