<?php

/**
 * Boilerplate/reused MySQLi code, used/made for convenience when handling MySQLi functionalities
 */

$host = "localhost";
$database = "Lazada";
$db_login = "root";
$db_pass = "";

$lazada = mysqli_connect($host, $db_login, $db_pass, $database) or die(mysqli_error($lazada));
