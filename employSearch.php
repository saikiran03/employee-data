<?php

if ($_POST['empId']) {
	require "config/connection.php";
	require "config/helpers.php";

	$empid = $_POST['empId'];
<<<<<<< HEAD
	$sql = "SELECT * FROM mempdata WHERE empid LIKE '$empid%'";
=======
	$sql = "SELECT * FROM empdata WHERE empid LIKE '$empid%'";
>>>>>>> f0d1d4b2fc22b1fa95018ecf99c709dcacdcc19c
	$query = query($connection, $sql);

	while ($result = mysqli_fetch_object($query)) {
		echo json_encode($result)."\n \n";
	}
}

?>