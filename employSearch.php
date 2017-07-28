<?php

if ($_POST['empId']) {
	require "config/connection.php";
	require "config/helpers.php";

	$empid = $_POST['empId'];
	$sql = "SELECT * FROM mempdata WHERE empid LIKE '$empid%'";
	$query = query($connection, $sql);

	while ($result = mysqli_fetch_object($query)) {
		echo json_encode($result)."\n \n";
	}
}

?>