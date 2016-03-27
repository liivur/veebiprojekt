<!DOCTYPE html>
<html lang="en">
  	<head>
    	<?php require './components/head.php'; ?>
  	</head>
  	<body>
	  	<header class="container header">
	  		<?php require './components/admin-header.php'; ?>
		</header>
		
		
		<section class="content container">
			<div  id="field">
				<div class="row">
					oled valinud kandidaadi XXX
					<button type="candidacy">Tühista valik</button>
				</div>
					
				<div class="row">	
					<p>vali kandidaat</p>
						<select name="party">
									<option>kandidaat</option>
									<option>kandidaat</option>
									<option>kandidaat</option>
								</select>
	
					<button type="candidacy">Valin</button>
			
				</div>
			</div>
		</section>

	    <?php require './components/javascripts.php'; ?>
  	</body>
</html>