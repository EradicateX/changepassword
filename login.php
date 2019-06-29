<?php
	session_start();
	if (isset($_SESSION['login_user'])) {
		header("location:index.php");
		die();
	}
?>
<title>Login</title>
<link rel="shortcut icon" type="image/png" href="favicon.png"/>
<link rel="stylesheet" type="text/css" href="css/common.css" />
<script src="lib/jquery-3.4.1.js"></script>
<script src="lib/common.js"></script>
<style>
</style>
Login using following credential: pathana/avengedSevenfold@2019<br />
<label>Username</label><input type="text" id="txt_username" /><br />
<label>Password</label><input type="password" id="txt_password" /><br />
<label></label><button id='btnLogin'>Login</button><br />
<div id='message'></div>
<script>
$(document).ready(function() {
	$("#btnLogin").click(function() {
		
		var u = $("#txt_username").val().trim();
		var p =  $("#txt_password").val().trim();
		
		if (u == "" || p == "") {
			notifyError("Username/Password could not be empty!!!");
			return;
		}
		
		$.ajax({
			url: "/changepassword/api/api_login.php",
			type: "POST",
			cache: false,
			data: {
				action: "login",
				username: u,
				password: p
			},
			success: function(msg) {
				if (msg == "Login OK") {
					location.href = 'index.php';
				} else {
					notifyError(msg);
				}
				
			}
		});
	});
});
</script>
