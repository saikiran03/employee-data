<?php

$server = "localhost";
$database = "yuvtarang";
$username = "vignanvizag";
$password = "Vignan@123";

$connection = mysqli_connect($server, $username, $password, $database);

if (!$connection) {
	die("Unable to make a connection to the database");
}

?>