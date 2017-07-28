<?php


function download ($filename) {
	require_once "config/connection.php";

	$sql = "select * from `mempdata`;";
	$query = mysqli_query($connection, $sql);

	// $filename = "empdetails.xls";
	header("Content-Disposition: attachment; filename=\"$filename\"");
	header("Content-Type: application/vnd.ms-excel");

	$flag = false;
	while ($row = mysqli_fetch_assoc($query)) {
		if (!$flag) {
			echo implode("\t", array_keys($row)). "\r\n";
			$flag = true;
		}

		echo implode("\t", array_values($row)). "\r\n";
	}
}

// download("GOPI_IS_GAY.xls");

$fetch = false;
if ($_POST){
	$fetch = true;
}

if ($fetch) {
	echo "has post data";

	require_once 'config/connection.php';

	echo date($_POST['startTime'])." <-> ";
	echo $_POST['endTime']."<br>";

	$startTime = date( "Y-m-d H:i:s", strtotime($_POST['startTime']) );
	$endTime = date( "Y-m-d H:i:s", strtotime($_POST['endTime']) );
	echo $startTime.", "$endTime."<br>";

	$sql = "select * from `mempdata` where timestamp BETWEEN '$startTime' and '$endTime';";
	echo $sql;

	// exit(0);
	// $query = mysqli_query($connection, $sql);

	// $filename = "empdetails.xls";
	// header("Content-Disposition: attachment; filename=\"$filename\"");
	// header("Content-Type: application/vnd.ms-excel");

	// $flag = false;
	// while ($row = mysqli_fetch_assoc($query)) {
	// 	if (!$flag) {
	// 		echo implode("\t", array_keys($row)). "\r\n";
	// 		$flag = true;
	// 	}

	// 	echo implode("\t", array_values($row)). "\r\n";
	// }

	// header("Location: redirect.php");
}
else {
	echo "no post data";
?>

<!DOCTYPE HTML>
<html>
	<head>
		<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
		<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
		<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
	</head>
	<body>
		<?php
			 //include "header.php"; 
		?>
		<div class="container">
			<div class="col-md-offset-4 col-md-4" style="padding-top:103px;">
				<form action="fetchDb.php" method="post">
					<div id="datetimepicker" class="input-append date">
						<label>Start Time: </label>
						<input data-format="yyyy/mm/dd" type="text" name="startTime"></input>
						<span class="add-on">
							<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
						</span>
					</div>

					<div id="datetimepicker1" class="input-append date">
						<label>End Time: </label>
						<input data-format="yyyy/mm/dd" type="text" name="endTime"></input>
						<span class="add-on">
							<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
						</span>
					</div>

					<button class="btn btn-primary"> Submit </button>
				</form>
			</div>
		</div>
	
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
		<!--
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"> </script> 
		<script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"> </script>
	-->
		<script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js"> </script>
		<script type="text/javascript">
			$('#datetimepicker').datetimepicker({
				format: 'dd/MM/yyyy hh:mm:ss',
				language: 'en'
			});

			$('#datetimepicker1').datetimepicker({
				format: 'dd/MM/yyyy hh:mm:ss',
				language: 'en'
			});
		</script>
	</body>
<html>

<?php 
} 
?>