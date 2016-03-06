<?php
 
//Sample Database Connection Script 
 
//Setup connection variables, such as database username
//and password
$hostname="localhost";
$username="root";
$password="";
$dbname="veebirojekt";

$usertable1="kandidaadid";
$usertable2="inimesed";
$usertable3="erakonnad";
$usertable3="maakonnad";
$yourfield = "nimi";
 
//Connect to the database

$connection = @mysql_connect($hostname, $username, $password);
mysql_select_db($dbname, $connection);

 if(!$connection){
 	echo "no connection";
 }
//Setup our query

$query1="CREATE VIEW "view1" AS
SELECT "nimi"
FROM "inimesed"
WHERE "on_valinud"=1;"
 $result1 = mysql_query($query1);

 if($result1)
{
  while($row = mysql_fetch_array($result1))
  {
    $name = $row["$yourfield"];
    echo $name, "<br>"; 

  }
}
else{
	echo "no result";
}
// $query1 = "SELECT COUNT(NULLIF(0, on_valinud)) FROM $usertable2";

//Run the Query

/*$result1 = mysql_query($query1);

if(!$result1){
	echo "ei läinud läbi";
}
  echo "valinud on juba ", $result1, " inimest", "<br>";
 
*/
 $query2 = "SELECT * FROM $usertable3";

 $result2 = mysql_query($query2);
//If the query returned results, loop through
// each result
if($result2)
{
  while($row = mysql_fetch_array($result2))
  {
    $name = $row["$yourfield"];
    echo $name, "<br>"; 

  }
}
else{
	echo "no result";
}
 
?>
<?php
//close the connection
mysql_close($connection);
?>