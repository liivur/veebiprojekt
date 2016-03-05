// to try out how this thing works
<?php
//Step1
 $db = mysql_connect("localhost", "root",""); 
 if (!$db) {
 die("connection failed miserably: " . mysql_error());
 }
//Step2
 $db_select = mysql_select_db("veebiprojekt",$db);
 if (!$db_select) {
 die("Database selection also failed miserably: " . mysql_error());
 }
?>
<html>
 <head>
 <title>Step 3</title>
 </head>
 <body>
 tere<p>
 <?php
//Step3
$result = mysql_query("SELECT * FROM erakonnad", $db);
 if (!$result) {
 die("Database query failed: " . mysql_error());
 }
 	
 while ($row = mysql_fetch_array($result)) {
 echo $row[1]." ".$row[2]."<br />";
 }
?>
 </body>
</html>
<?php
//Step5
 mysql_close($db);
?>