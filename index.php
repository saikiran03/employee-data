<?php

session_start();
require "config/helpers.php";
redirect_unauth();
session_activity();

if ($_POST) {
	require "config/connection.php";
	
	$empid = post('emp_no');
	$empname = post('name');
	$fathers_name = post('father_name');
	$dob = post('dob');
	$mobile_num = post('phone');
	$aadhar_num = post('adhar_no');
	$pan_num = post('pan_no');
	$dept = post("dept");
	$dept_code = post("deptcode");
	
	
	// bank stuff
	$acc_no = post('acc_no');
	$ifsc = post('ifsc');
	$bank = post('bank');
	$branch = post('branch');

	// address stuff
	$door_no = post("dno");
	$flat_no = post("fno");
	$street = post("street");
	$area = post("area");
	$post = post("post");
	$city = post('city');
	$zip = post('zip');

	$date = date($dob);
	$tsql = "SELECT empid from employees WHERE empid='$empid';";
	$tquery = mysqli_query($connection, $tsql);

	$resStat = 0;
	if ($tquery)
		while ($res = mysqli_fetch_array($tquery)) { $resStat++; }
	
	if ($resStat > 0) {
		// echo "found similar entry.<br>";
		$sql = "UPDATE employees SET empname='$empname', father_name='$fathers_name', dob='$date', mobile='$mobile_num', aadhaar='$aadhar_num', pan='$pan_num', dept='$dept', dept_code='$dept_code', acc_no='$acc_no', ifsc='$ifsc', bankname='$bank', branch='$branch',flat_no='$flat_no',street='$street', area='$area', post='$post', city='$city', pincode='$zip' WHERE empid=$empid";
	}
	else {
		$sql = "INSERT INTO `employees` (`empid`, `empname`, `dept`, `dept_code`, `acc_no`, `ifsc`, `bankname`, `branch`, `dob`, `father_name`, `aadhaar`, `pan`, `mobile`, `doorno`, `flat_no`, `street`, `area`, `post`, `city`, `pincode`) VALUES 
		('$empid', '$empname', '$dept', '$dept_code', '$acc_no', '$ifsc', '$bank', '$branch', '$date', '$fathers_name', '$aadhar_num', '$pan_num', '$mobile_num', '$door_no', '$flat_no', '$street', '$area', '$post', '$city', '$zip')";		
	}
	
	echo $sql;
	$query = query($connection, $sql);
	if ($query) {
		$error_message = "Successfully saved !!";
	}
	else {
		$error_message = "Query failure!";
	}
}

?>


<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Employee Details</title>

	<!-- <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script> -->
	<!-- <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'> -->
	<!-- <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'> -->
	<!-- <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'> -->
	<script type="text/javascript" src="req/js/modernizr.js"></script>
	<link rel="icon" href="cat_favicon.png" type="image/gif">
	<link rel="stylesheet" type="text/css" href="req/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="req/css/bootstrapValidator.min.css">
	<link rel="stylesheet" href="css/style.css">
	<style>
		body { padding-top: 70px; }
	</style>
</head>

<body>

	<?php include "header.php"; ?>
	
	<div class="container">

		<!-- <div id="inac-meter"></div> -->
		<form class="well form-horizontal" action="index.php" method="post"  id="contact_form">
			<fieldset>

				<!-- Form Name -->
				<legend style="text-align:center">Employee Data </legend>
				
				<h3 >Basic Info</h3>
				<div class="alert alert-info">	

					<!-- Text input Emp ID-->
					<div class="form-group">
						<label class="col-md-4 control-label" >Employee ID</label> 
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input name="emp_no" placeholder="Employee ID" class="form-control"  type="number">
							</div>
						</div>
					</div>
					
					<!-- Text input Name-->
					<div class="form-group">
						<label class="col-md-4 control-label">Employee Name</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input  name="name" placeholder="Employee Full Name" class="form-control"  type="text">
							</div>
						</div>
					</div>

					<!-- Text input Father Name-->
					<div class="form-group">
						<label class="col-md-4 control-label" >Father Name</label> 
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input name="father_name" placeholder="Father Name" class="form-control"  type="text">
							</div>
						</div>
					</div>
					
					<!-- Text input DOB-->
					<div class="form-group">
						<label class="col-md-4 control-label">Date Of Birth</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
								<input name="dob" placeholder="dd/mm/yyyy" class="form-control" type="text">
							</div>
						</div>
					</div>

					<!-- Text input Phone-->
					<div class="form-group">
						<label class="col-md-4 control-label">Contact Number</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
								<input name="phone" placeholder="+91-1234567890" class="form-control" type="text">
							</div>
						</div>
					</div>

					<!-- Text input Aadhar No.-->
					<div class="form-group">
						<label class="col-md-4 control-label">Aadhar Number</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
								<input name="adhar_no" placeholder="Aadhar UID" class="form-control"  type="text">
							</div>
						</div>
					</div>

					<!-- Text input Pan No.-->
					<div class="form-group">
						<label class="col-md-4 control-label">Pan Number</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
								<input name="pan_no" placeholder="Pan Number" class="form-control"  type="text">
							</div>
						</div>
					</div>

					<!-- Select Basic Dept -->
					<div class="form-group"> 
						<label class="col-md-4 control-label">Department</label>
						<div class="col-md-4">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
								<input class="form-control" placeholder="Department" name="dept" type="text">
							</div>
						</div>
						<div class="col-md-4">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
								<input class="form-control" placeholder="Department Code" name="deptcode" type="text">
							</div>
						</div>
					</div>

				</div>
				<hr>
				
				<!-- Bank details start -->
				<div id="bank_details">
					
					<h3>Bank Details</h3>
					<div class="alert alert-danger">

						<div class="container">
							<div class="col-md-6">
								<!-- Text input Acc. No.-->
								<div class="form-group">
									<label class="col-md-2 control-label">Account Number</label>  
									<div class="col-md-6 inputGroupContainer">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
											<input name="acc_no" placeholder="" class="form-control"  type="text">
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<!-- Text input IFSC-->
								<div class="form-group">
									<label class="col-md-2 control-label">IFS Code</label>  
									<div class="col-md-6 inputGroupContainer">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
											<input name="ifsc" placeholder="" class="form-control"  type="text">
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="container">
							<div class="col-md-6">
								<!-- Select Basic Bank Name-->
								<div class="form-group"> 
									<label class="col-md-2 control-label">BANK</label>
									<div class="col-md-6 selectContainer">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
											<select name="bank" class="form-control selectpicker" id="bank">
												<option value="" disabled>Please select your bank</option>
												<option  value="">Bank Name</option>
												<option  value="Andhra Bank">Andhra Bank</option>
												<option  value="Axis Bank">Axis Bank</option>
												<option  value="BI">BI</option> 
												<option  value="BOB">BOB</option>
												<option  value="CBI">CBI</option>
												<option  value="Syndicate Bank">Syndicate Bank</option>
												<option  value="SBH">SBH</option>
												<option value="Canara  Bank">Canara  Bank</option>
												<option  value="IndusInd Bank">IndusInd Bank</option>
												<option  value="SBI">SBI</option>
												<option  value="CBI">CBI</option>
												<option  value="DCC Bank">DCC Bank</option>
												<option  value="HDFC Bank">HDFC Bank</option>
												<option  value="HSBC Bank">HSBC Bank</option>
											</select>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<!-- Text input Bank Area-->
								<div class="form-group">
									<label class="col-md-2 control-label">Branch</label>  
									<div class="col-md-6 inputGroupContainer">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
											<input name="branch" placeholder="" class="form-control"  type="text">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>

				<!-- Residential Details -->
				<h3>Residential Details</h3>
				<div class="alert alert-warning">
					<!-- Text input Address-->
					<div class="form-group">
						<label class="col-md-4 control-label">Address</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
								<input name="dno" placeholder="Door/Quarter Number" class="form-control" type="text">
							</div>

							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
								<input name="fno" placeholder="Flat Number" class="form-control" type="text">
							</div>

							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
								<input name="street" placeholder="Street/Sector" class="form-control" type="text">
							</div>

							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
								<input name="area" placeholder="Area" class="form-control" type="text">
							</div>

							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
								<input name="post" placeholder="Post" class="form-control" type="text">
							</div>
						</div>
					</div>
					
					<!-- Text input city-->
					<div class="form-group">
						<label class="col-md-4 control-label">City</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
								<input name="city" placeholder="city" class="form-control"  type="text">
							</div>
						</div>
					</div>

					<!-- Text input zip code-->
					<div class="form-group">
						<label class="col-md-4 control-label">Zip Code</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
								<input name="zip" placeholder="Zip Code" class="form-control"  type="text">
							</div>
						</div>
					</div>
				</div>
				<hr>

				<!-- Success message -->
				<div class="alert alert-success" role="alert" id="success_message">Success<i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

				<!-- Button SEND-->
				<div class="form-group">
					<label class="col-md-4 control-label"></label>
					<div class="col-md-4">
						<button type="submit" class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
					</div>
				</div>

			</fieldset>
		</form>
	
    <footer class="footer">
      <div class="container">
        <p style="text-align:center">Designed and Developed by <a href="http://www.creativecat.in" target="blank">creativecat.in</a></p>
      </div>
    </footer>
	</div>
	
</div><!-- /.container -->
<!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script> -->
<script type="text/javascript" src="req/js/jquery.min.js"></script>
<script type="text/javascript" src="req/js/bootstrap.min.js"></script>
<script type="text/javascript" src="req/js/bootstrapvalidator.min.js"></script>
<script src="js/validation.js"></script>
<script>

	$("input[name='email']").attr("required", false);

	var error = "<?php echo $error_message; ?>";
	if (error!=="")
		showNotification(error);


	var lact = 0;
	setInterval(function(){
		$("#inac-meter").html("Session inactive for " + lact + " seconds.");
		lact++;
	}, 1000);
</script>

</body>
</html>