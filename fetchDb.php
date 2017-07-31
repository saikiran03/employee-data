<?php


function download ($filename) {
	require_once "config/connection.php";

	$sql = "select * from `employees`;";
	$query = mysqli_query($connection, $sql);

	header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Content-Type: application/vnd.ms-excel");

	$flag = false;
	while ($row = mysqli_fetch_assoc($query)) {
		if (!$flag) {
			echo implode("\t", array_keys($row)). "\r\n";
			$flag = true;
		}

		echo implode("\t", array_values($row)). "\r\n";
		echo implode("|||", array_values($row))."\r\n";
	}
}

try {
	download("details.xls");
} catch (Exception $e) {
	echo "Some error occured while downloading excel file.". $e->getMessage()."\n";
}

?>