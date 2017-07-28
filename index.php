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
<<<<<<< HEAD
		$dept_data = explode("-", post('dept'));
		$dept = $dept_data[0];
		$dept_code = $dept_data[1];
=======
		$dept = post('dept');
		$dept_code = post('dept_code');
>>>>>>> f0d1d4b2fc22b1fa95018ecf99c709dcacdcc19c
		
		
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
<<<<<<< HEAD
		$tsql = "SELECT empid from mempdata WHERE empid='$empid';";
		$tquery = mysqli_query($connection, $tsql);

		$resStat = 0;
		if ($tquery)
			while ($res = mysqli_fetch_array($tquery)) { $resStat++; }
		
		if ($resStat > 0) {
			// echo "found similar entry.<br>";
			$sql = "UPDATE mempdata SET empname='$empname', father_name='$fathers_name', dob='$date', email='$email', mobile='$mobile_num', aadhaar='$aadhar_num', pan='$pan_num', dept='$dept', dept_code='$dept_code', acc_num='$acc_no', ifsc='$ifsc', bank='$bank', b_area='$barea',flat_num='$flat_num', area='$area', post='$post', city='$city', zip='$zip' WHERE empid=$empid";
		}
		else {
			$sql = "INSERT INTO `mempdata` (`empid`, `empname`, `father_name`, `dob`, `email`, `mobile`, `aadhaar`, `pan`, `dept`, `dept_code`, `acc_num`, `ifsc`, `bank`, `b_area`, `flat_num`, `area`, `post`, `city`, `zip`) VALUES 
			('$empid', '$empname', '$fathers_name', '$date', '$email', '$mobile_num', '$aadhar_num', '$pan_num', '$dept', '$dept_code', '$acc_no', '$ifsc', '$bank', '$barea', '$flat_num', '$area', '$post', '$city', '$zip')";		
		}
		
		// echo $sql;
		$query = query($connection, $sql);
		if ($query) {
			$error_message = "Successfully saved !!";
		}
		else {
			$error_message = "Query failure!";
=======
		$sql = "INSERT INTO `mempdata`(`empid`, `empname`, `father_name`, `dob`, `email`, `mobile`, `aadhaar`, `pan`, `dept`, `dept_code`, `acc_num`, `ifsc`, `bank`, `b_area`, `flat_num`, `area`, `post`, `city`, `zip`) VALUES 
		('$empid', '$empname', '$fathers_name', '$date', '$email', '$mobile_num', '$aadhar_num', '$pan_num', '$dept', '$dept_code', '$acc_no', '$ifsc', '$bank', '$barea', '$flat_num', '$area', '$post', '$city', '$zip')";
		
		$query = query($connection, $sql);

		if ($query) {
			echo "Successfully saved !!";
		}
		else {
			echo "User may already exist.";
>>>>>>> f0d1d4b2fc22b1fa95018ecf99c709dcacdcc19c
		}
	}

?>


<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
<<<<<<< HEAD
	<title>Employee Details</title>
=======
	<title>Bootstrap 3 Contact form with Validation</title>
>>>>>>> f0d1d4b2fc22b1fa95018ecf99c709dcacdcc19c

	<!-- <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script> -->
	<!-- <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'> -->
	<!-- <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'> -->
	<!-- <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'> -->
	<script type="text/javascript" src="req/js/modernizr.js"></script>
<<<<<<< HEAD
         <link rel="icon" href="cat_favicon.png" type="image/gif">
=======
>>>>>>> f0d1d4b2fc22b1fa95018ecf99c709dcacdcc19c
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
<<<<<<< HEAD
		<form class="well form-horizontal" action="index.php" method="post"  id="contact_form">
			<fieldset>

				<!-- Form Name -->
				<legend style="text-align:center">Employee Data </legend>
				
				<h3 >Basic Info</h3>
=======
		<form class="well form-horizontal" action=" " method="post"  id="contact_form">
			<fieldset>

				<!-- Form Name -->
				<legend>Employee data !</legend>
				
				<h3>Basic Info</h3>
>>>>>>> f0d1d4b2fc22b1fa95018ecf99c709dcacdcc19c
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
<<<<<<< HEAD
						<label class="col-md-4 control-label" >Father Name</label> 
=======
						<label class="col-md-4 control-label" >Father's Name</label> 
>>>>>>> f0d1d4b2fc22b1fa95018ecf99c709dcacdcc19c
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
<<<<<<< HEAD
								<input name="phone" placeholder="+91-1234567890" class="form-control" type="text">
=======
								<input name="phone" placeholder="+91-8768789141" class="form-control" type="text">
>>>>>>> f0d1d4b2fc22b1fa95018ecf99c709dcacdcc19c
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
<<<<<<< HEAD
								<select name="dept" class="form-control selectpicker" onchange="updateDeptCode()" id="deptcode">
										<option value="" disabled>Please select department</option>
									  	<option value="00569G">HSBC-00569G</option>
										<option value="1266">HSBC-1266</option>
									   	<option value="3000">SAFETY-3000</option>
									   	<option value="3031">CO&CCP/CSP-3031</option>
		         						        <option value="3060">CO&CCP/Benzol-3060</option>	 
									   	<option value="3070">CO&CCP/ARS-3070</option>
									   	<option value="3100">CO&CCP/Batt/Elec-3100</option>
									  	<option value="3150">CO&CCP/TDP-3150</option>
									  	<option value="3160">CRG-3160</option>
			  							<option value="3200">CO&CCP/TDP/Mech-3200</option>
									  	<option value="3300">SP-3300</option>
		                                                         	<option value="3360">BF/SGP2-3360</option>
									  	<option value="3400">BF/Mech-3400</option>
									  	<option value="3500">SMS-3500</option>
									  	<option value="3600">LMMM/Billet Mill-3600</option>
									  	<option value="3660">WRM-3660</option>
									  	<option value="3700">WRM/Mech-3700</option>
									  	<option value="3700">WRM/Elec-3700</option>
									  	<option value="3760">MMSM-3760</option>
									  	<option value="4900">MMSM/Mech-4900</option>
									  	<option value="500">RMHP/CHP-500</option>
									  	<option value="5000">Medical-5000</option>
									   	<option value="5000">TPP/CDCP/Boilers-5000</option>
									   	<option value="69">Arizona-69</option>
									   	<option value="3300">BF-3300</option>
									   	<option value="3300">BF/BHS-3300</option>
									   	<option value="3300">BF/CH-3300</option>
									   	<option value="3300">BF/Desp1-3300</option>
									   	<option value="3360">BF/Elec-3360</option>
									   	<option value="3360">BF/Mech-3360</option>
									   	<option value="3300">BF/PCM-3300</option>
									   	<option value="3300">BF/SGP2-3300</option>
									   	<option value="3300">BF/SSY-3300</option>
									   	<option value="7100">CDCP/Inst/Rtd-7100</option>
									   	<option value="7100">CDCP/Instrumentation-7100</option>
									   	<option value="6702">CME/BF-6702</option>
									   	<option value="6800">CMM-6800</option>
									  	<option value="6800">CMM/Mill Zone-6800</option>
									  	<option value="3000">CO&/CCP/CDCP3-3000</option>
									  	<option value="1266">CO&/CCP/CDCP2-3000</option>
		                                                                <option value="3000">CO&CCP-3000</option>
									   	<option value="3060">CO&CCP/CO&CCP/ARS-3060</option>
									   	<option value="3070">CO&CCP/Bat/Elec-3070</option>
									   	<option value="3070">CO&CCP/Bat/G/Elec-3070</option>
									   	<option value="3000">CO&CCP/Bat/H&R-3000<option>					  							 
=======
								<select name="dept" class="form-control selectpicker" onchange="updateDeptCode()">
									<option value="" disabled>Please select department</option>
									<option>Alabama</option>
									<option>Alaska</option>
									<option >Arizona</option>
>>>>>>> f0d1d4b2fc22b1fa95018ecf99c709dcacdcc19c
								</select>
							</div>
						</div>
					</div>

					<!-- Text input Dept Code-->
<<<<<<< HEAD
					<!-- <div class="form-group">
=======
					<div class="form-group">
>>>>>>> f0d1d4b2fc22b1fa95018ecf99c709dcacdcc19c
						<label class="col-md-4 control-label">Department Code</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
								<input name="dept_code" placeholder="code" class="form-control" type="text">
							</div>
						</div>
<<<<<<< HEAD
					</div> -->
=======
					</div>
>>>>>>> f0d1d4b2fc22b1fa95018ecf99c709dcacdcc19c
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
<<<<<<< HEAD
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
=======
											<select name="bank" class="form-control selectpicker" >
												<option value="" disabled>Please select your bank</option>
												<option>Alabama</option>
												<option>Alaska</option>
												<option >Arizona</option>
>>>>>>> f0d1d4b2fc22b1fa95018ecf99c709dcacdcc19c
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
<<<<<<< HEAD
	
    <footer class="footer">
      <div class="container">
        <p style="text-align:center">Designed and Developed by <a href="http://www.creativecat.in" target="blank">creativecat.in</a></p>
      </div>
    </footer>
=======
>>>>>>> f0d1d4b2fc22b1fa95018ecf99c709dcacdcc19c
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
<<<<<<< HEAD

	$("input[name='email'").attr("required", false);

	var error = "<?php echo $error_message; ?>";
	if (error!=="")
		showNotification(error);


=======
>>>>>>> f0d1d4b2fc22b1fa95018ecf99c709dcacdcc19c
	var lact = 0;
	setInterval(function(){
		$("#inac-meter").html("Session inactive for " + lact + " seconds.");
		lact++;
	}, 1000);
</script>

</body>
</html>