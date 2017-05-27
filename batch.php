<?php

require "config/connection.php";
require "config/helpers.php";

function save ($res	) {
	$sql = "INSERT INTO mempdata VALUES ()";
	echo $sql;
}

$sql = "SELECT * FROM empdata";
$query = query($connection, $sql);

$objects = array();

while ($res = mysqli_fetch_object($query)) {
	if ($res->empid!='100637')
		continue;

	$f = (object)(array(
		'empid' => $res->empid,
		'empname' => $res->empname,
		'father_name' => $res->fathers_name,
		'dob' => $res->dob,
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

	$ser = serialize($f);
	// echo $ser;
	// echo json_encode($f);
	echo "INSERT INTO mempdata VALUES ('unserialize($ser)')";

	// mysqli_query($connection, "INSERT INTO mempdata VALUES ('$f')")

}