<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.1.1/Chart.js"></script>
<script>window.Chart || document.write('<script src="<?php echo Yii::$app->homeUrl; ?>js/vendor/Chart.js">\x3C/script>')</script>

<?php
$voted = 25012;
$total = 33443;
?>


<h1 class="middle"><?= Yii::t('app', 'statistics') ?></h1>
<hr>
<div class="row text-center">
	<div class="col-md-3">
	<h3><?= Yii::t('app', 'votes by country') ?>
		</h3>

	</div>

	
	<div class="col-md-3">
		<h3><?= Yii::t('app', 'votes by regions') ?></h3>
	</div>
	<div class="col-md-3">
		<h3><?= Yii::t('app', 'votes by parties') ?></h3>
	</div>
	<div class="col-md-3">
		<h3><?= Yii::t('app', 'votes by candidates') ?></h3>
	</div>
</div>
<div class="row text-center">
	<div class="col-md-3">
		<p><?php echo $voted; ?>/<?php echo $total; ?></p>
		<canvas id="votedChart"></canvas>
		<p>

		<iframe src="https://www.google.com/maps/d/embed?mid=z97xje16_Zdc.kAnvGN2s_Vts" width="300" height="300"></iframe>
		</p>
	</div>
	<div class="col-md-3">
		<p>Piirkond - 1111/2222</p>
		<p>Piirkond - 1111/2222</p>
		<p>Piirkond - 1111/2222</p>
		<p>Piirkond - 1111/2222</p>
		<p>Piirkond - 1111/2222</p>
		<p>Piirkond - 1111/2222</p>
		<p>Piirkond - 1111/2222</p>
		<p>Piirkond - 1111/2222</p>
		<p>Piirkond - 1111/2222</p>
		<p>Piirkond - 1111/2222</p>
		<p>Piirkond - 1111/2222</p>
		<p>Piirkond - 1111/2222</p>
	</div>
	<div class="col-md-3">
		<p>Partei - 1111</p>
		<p>Partei - 1111</p>
		<p>Partei - 1111</p>
		<p>Partei - 1111</p>
		<p>Partei - 1111</p>
		<p>Partei - 1111</p>
		<p>Partei - 1111</p>
		<p>Partei - 1111</p>
		<p>Partei - 1111</p>
		<p>Partei - 1111</p>
		<p>Partei - 1111</p>
		<p>Partei - 1111</p>
	</div>
	<div class="col-md-3">
		<p>Kandidaat - 1111</p>
		<p>Kandidaat - 1111</p>
		<p>Kandidaat - 1111</p>
		<p>Kandidaat - 1111</p>
		<p>Kandidaat - 1111</p>
		<p>Kandidaat - 1111</p>
		<p>Kandidaat - 1111</p>
		<p>Kandidaat - 1111</p>
		<p>Kandidaat - 1111</p>
		<p>Kandidaat - 1111</p>
		<p>Kandidaat - 1111</p>
		<p>Kandidaat - 1111</p>
	</div>
</div>
<div class="row text-center">
	<div class="col-md-3">
	
	</div>
</div>

<script>
	console.log('asd');
	var data = [
	    {
	        value: parseInt("<?php echo $voted; ?>"),
	        color:"#F7464A",
	        highlight: "#FF5A5E",
	        label: "<?php echo Yii::t('app', 'voted'); ?>"
	    },
	    {
	        value: parseInt("<?php echo $total-$voted; ?>"),
	        color: "#46BFBD",
	        highlight: "#5AD3D1",
	        label: "<?php echo Yii::t('app', 'not voted'); ?>"
	    }
	];
	console.log(data);
	var ctx = document.getElementById("votedChart").getContext("2d");
	var myPieChart = new Chart(ctx).Pie(data);
</script