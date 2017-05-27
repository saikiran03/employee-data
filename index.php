<?php

session_start();
require "config/helpers.php";
redirect_unauth();
session_activity();

	// $_POST['address'] = "";
	if ($_POST) {
		require "config/connection.php";
		
		$empid = post('emp_no');
		$empname = post('name');
		$fathers_name = post('father_name');
		$dob = post('dob');
		$email = post('email');
		$mobile_num = post('phone');
		$aadhar_num = post('adhar_no');
		$pan_num = post('pan_no');
		$dept = post('dept');
		$dept_code = post('dept_code');
		
		
		// bank stuff
		$acc_no = post('acc_no');
		$ifsc = post('ifsc');
		$bank = post('bank');
		$barea = post('area');

		// address stuff
		$address = post('address'); // address format: flat, area, post
		$f = explode(",", $address);
		$flat_num = $f[0];
		$area = $f[1];
		$post = $f[2];
		$city = post('city');
		$zip = post('zip');

		$date = date($dob);
		$sql = "INSERT INTO `mempdata`(`empid`, `empname`, `father_name`, `dob`, `email`, `mobile`, `aadhaar`, `pan`, `dept`, `dept_code`, `acc_num`, `ifsc`, `bank`, `b_area`, `flat_num`, `area`, `post`, `city`, `zip`) VALUES 
		('$empid', '$empname', '$fathers_name', '$date', '$email', '$mobile_num', '$aadhar_num', '$pan_num', '$dept', '$dept_code', '$acc_no', '$ifsc', '$bank', '$barea', '$flat_num', '$area', '$post', '$city', '$zip')";
		
		$query = query($connection, $sql);

		if ($query) {
			echo "Successfully saved !!";
		}
		else {
			echo "User may already exist.";
		}
	}

?>


<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Bootstrap 3 Contact form with Validation</title>

	<!-- <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script> -->
	<!-- <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'> -->
	<!-- <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'> -->
	<!-- <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'> -->
	<script type="text/javascript" src="req/js/modernizr.js"></script>
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
		<form class="well form-horizontal" action=" " method="post"  id="contact_form">
			<fieldset>

				<!-- Form Name -->
				<legend>Employee data !</legend>
				
				<h3>Basic Info</h3>
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
						<label class="col-md-4 control-label" >Father's Name</label> 
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

					<!-- Text input Email-->
					<div class="form-group">
						<label class="col-md-4 control-label">Email ID</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
								<input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
							</div>
						</div>
					</div>
											
					<!-- Text input Phone-->
					<div class="form-group">
						<label class="col-md-4 control-label">Contact Number</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
								<input name="phone" placeholder="+91-8768789141" class="form-control" type="text">
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
						<div class="col-md-4 selectContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
								<select name="dept" class="form-control selectpicker" onchange="updateDeptCode()">
									<option value="" disabled>Please select department</option>
									<option>Alabama</option>
									<option>Alaska</option>
									<option >Arizona</option>
								</select>
							</div>
						</div>
					</div>

					<!-- Text input Dept Code-->
					<div class="form-group">
						<label class="col-md-4 control-label">Department Code</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
								<input name="dept_code" placeholder="code" class="form-control" type="text">
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
									<label class="col-md-2 control-label">IFSC</label>  
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
											<select name="bank" class="form-control selectpicker" >
												<option value="" disabled>Please select your bank</option>
												<option>Alabama</option>
												<option>Alaska</option>
												<option >Arizona</option>
											</select>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<!-- Text input Bank Area-->
								<div class="form-group">
									<label class="col-md-2 control-label">Area</label>  
									<div class="col-md-6 inputGroupContainer">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
											<input name="area" placeholder="" class="form-control"  type="text">
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
								<input name="address" placeholder="flat, area, post" class="form-control" type="text">
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
	var lact = 0;
	setInterval(function(){
		$("#inac-meter").html("Session inactive for " + lact + " seconds.");
		lact++;
	}, 1000);
</script>

</body>
</html>