<?php
	include("../config/config.php");
	session_start();
	
	if (isset($_POST['action'])) {
		if ($_POST['action'] == 'login') {
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			$sql = "SELECT id FROM users WHERE username='$username' AND password='$password'";
			$rs = mysqli_query($db, $sql);
			$count = mysqli_num_rows($rs);
			
			if ($count == 1) {
				$_SESSION['login_user'] = $username;
				$_SESSION['login_pass'] = $password;
				echo "Login OK";
			} else {
				echo "Username or password is not correct!";
			}
		}
	}
?>