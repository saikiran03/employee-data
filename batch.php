<?php

require "config/connection.php";
require "config/helpers.php";

$sql = "SELECT * FROM empdata";
$query = query($connection, $sql);

while ($res = mysqli_fetch_object($query)) {
	$f = (array(
		'empid' => $res->empid,
		'empname' => $res->empname,
		'father_name' => $res->fathers_name,
		'dob' => $res->dob,
		// 'dob' => date("Y-m-d", strtotime($res->dob)),
		'email' => '',
		'mobile' => $res->mobile_num,
		'aadhaar' => $res->aadhaar_num,
		'pan' => $res->pan_num,
		'dept' => $res->dept,
		'dept_code' => $res->dept_code,
		'acc_num' => $res->account_num,
		'ifsc' => $res->ifs_code,
		'bank' => $res->bank_name,
		'b_area' => $res->bank_area,
		'flat_num' => $res->flat_num,
		'area' => $res->street . ", " . $res->road . ", " . $res->village,
		'post' => $res->post,
		'city' => $res->city,
		'zip' => $res->pin_code,
		'timestamp' => $res->timestamp
	));

	$sql = "INSERT INTO mempdata VALUES ('".join($f, "', '")."')";
	query($connection, $sql);
	echo $res->empid."<br>";
}