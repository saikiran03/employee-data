<?php

function post($x) {
	return (isset($_POST[$x]) ? $_POST[$x] : NULL);
}

function session($x) {
	return (isset($_SESSION[$x]) ? $_SESSION[$x] : NULL);
}

function redirect_unauth() {
	if (session('username')==NULL) {
		header("location: login.php");
	}
}

function include_jquery() {
	echo "<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>\n";
}

function query($connection, $sql) {
	$query = mysqli_query($connection, $sql);
	$_SESSION['last_active'] = time();
	return $query;
}

function logout() {
	unset($_SESSION['username']);
	unset($_SESSION['last_active']);
	session_destroy();
	header("location: login.php");
}

function session_activity () {
	// timeout in seconds //
	$timeout = 1000 * 60;
	$js = "
		<script>
			alert('Session inactive for too long. Logging out...');
			setTimeout(function(){
				location.href = 'logout.php';
			}, 2000);
		</script>
	";
	
	if (time() - session('last_active') > $timeout)
		echo $js;

	$_SESSION['last_active'] = time();
	return;
}

?>