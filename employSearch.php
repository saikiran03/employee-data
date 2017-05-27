<?php

if ($_POST['empId']) {
	require "config/connection.php";
	require "config/helpers.php";

	$empid = $_POST['empId'];
	$sql = "SELECT * FROM empdata WHERE empid LIKE '$empid%'";

	$query = query($connection, $sql);

	$empids = array();
	while ($result = mysqli_fetch_object($query)) {
		array_push($empids, $result);
	}

	print_r($empids);
}

?>