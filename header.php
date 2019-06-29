<script src="lib/jquery-3.4.1.js"></script>
<script src="lib/common.js"></script>
<link rel="stylesheet" type="text/css" href="css/common.css" />
<link rel="shortcut icon" type="image/png" href="favicon.png"/>

<a href='index.php' id='navHome'>Home</a> | Hello <b><?php echo $_SESSION['login_user']; ?></b> | <a id='navChangePassword' href='change_password.php'>Change Password</a> | <a href='logout.php'>Logout</a>
<script>
$(document).ready(function() {
	if (window.location.pathname == "/changepassword/change_password.php") {
		$("#navChangePassword").css("color", "red");
	}
	if (window.location.pathname == "/changepassword/index.php") {
		$("#navHome").css("color", "red");
	}
});
</script>