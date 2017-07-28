<?php

$server = "localhost";
<<<<<<< HEAD
$database = "yuvtarang";
$username = "vignanvizag";
$password = "Vignan@123";
=======
$database = "vba_project";
$username = "root";
$password = "";
>>>>>>> f0d1d4b2fc22b1fa95018ecf99c709dcacdcc19c

$connection = mysqli_connect($server, $username, $password, $database);

if (!$connection) {
	die("Unable to make a connection to the database");
}

?>