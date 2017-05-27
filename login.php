<?php
	session_start();
	require "config/helpers.php";

	if (session("username")!=NULL){
		header("location: index.php");
	}

	if (post("username")!=NULL) {
		require "config/connection.php";
		$username = post("username");
		$password = post("password");
		$sql = "SELECT * FROM admin WHERE `username`='$username' and `password`='$password';";
		
		$query = mysqli_query($connection, $sql);
		if (mysqli_num_rows($query)>0) {
			// successful login.
			$_SESSION['username'] = $username;
			$_SESSION['last_active'] = time();
			header("location: index.php");
		}
		else {
			// invalid username password.
			$err = "Invalid username & password combination. Please try again. <br>";
		}
	}
?>

<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Login Form</title>
	<link rel="stylesheet" href="css/login.css">
</head>

<body>
	<div class="login-page">
		<div class="form">
			<!--
			<form class="register-form">
				<input type="text" placeholder="name"/>
				<input type="password" placeholder="password"/>
				<input type="text" placeholder="email address"/>
				<button>create</button>
				<p class="message">Already registered? <a href="#">Sign In</a></p>
			</form>
			-->
			<form class="login-form" action="login.php" method="post">
				<input type="text" placeholder="username" name="username"/>
				<input type="password" placeholder="password" name="password"/>
				<span id="error_message" style="color: red; font-size: 13px;">
					<?php echo isset($err) ? $err : ""; ?>
				</span>
				<button>login</button>
				<!--
				<p class="message">Not registered? <a href="#">Create an account</a></p>
				-->
			</form>
		</div>
	</div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script>
		$('.message a').click(function(){
			$('form').animate({
				height: "toggle", 
				opacity: "toggle"
			}, "slow");
		});
	</script>
</body>
</html>
