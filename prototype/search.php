<!DOCTYPE html>
<html lang="en">
  	<head>
    	<?php require './components/head.php'; ?>
  	</head>
  	<body>
	  	<header class="container header">
	  		<?php require './components/header.php'; ?>
		</header>
		<section class="content container">
	    	<h1>Otsing</h1>
    		<form class="row">
    			<div class="col-md-12">
	    			<label>
						Otsi: <input type="text" name="q">
					</label>
					<button type="submit">Otsi</button>
				</div>
				<div class="col-md-12">
					<label>
						Kandidaat: <input type="checkbox" name="candidate" checked>
					</label>
					<label>
						Piirkond: <input type="checkbox" name="area">
					</label>
					<label>
						Partei: <input type="checkbox" name="party">
					</label>
				</div>
    		</form>
			<hr>
    		<h3>Tulemused:</h3>
    		<div>
    			<div>
    				Kandidaat <a href="#">Hääleta</a>
    			</div>
    			<div>
    				Kandidaat <a href="#">Hääleta</a>
    			</div>
    			<div>
    				Kandidaat <a href="#">Hääleta</a>
    			</div>
    			<div>
    				Kandidaat <a href="#">Hääleta</a>
    			</div>
    		</div>
		</section>

	    <?php require './components/javascripts.php'; ?>
  	</body>
</html>