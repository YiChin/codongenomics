<?php
define("VIEW_PATH",'');
$host = "localhost";
$user = "root";
$pswd = "123";
$dbname = "codon";

$conn = mysql_connect($host, $user, $pswd) or die ("Error connectiong to MySQL");
//echo "Connected to MySQL <br />";

mysql_select_db($dbname) or die ("Error connecting to Database: ".$dbname);
//echo "Connected to Database <br />";

//Closes specified connection
//mysql_close($conn);
?>