<?php
$hostname = "localhost";
$database = "Lazada";
$db_login = "root";
$db_pass = "";

$dlink = mysql_connect($hostname, $db_login, $db_pass) or die("Could not connect");
mysql_select_db($database) or die("Could not select database");
?>