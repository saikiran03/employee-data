<?php

if ($_POST['empId']) {
	require "config/connection.php";
	require "config/helpers.php";

	if ($_POST['empId'] == ""){
		$empid = "#~$$~#";
	} else {
		$empid = $_POST['empId'];
	}
	$sql = "SELECT * FROM employees WHERE empid LIKE '$empid%'";
	$query = query($connection, $sql);

	while ($result = mysqli_fetch_object($query)) {
		echo json_encode($result)."\n \n";
	}
}

?>