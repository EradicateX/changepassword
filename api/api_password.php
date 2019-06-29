<?php
	include("../config/config.php");
	
	if (isset($_POST['action'])) {
		if ($_POST['action'] == 'changepassword') {
			$u = $_POST['username'];
			$p = $_POST['password'];
			$rs = mysqli_query($db, "UPDATE users SET password='$p' WHERE username='$u'");
			if ($rs) {
				echo "Đổi mật khẩu thành công!!!";
			} else {
				echo "Đổi mật khẩu thành thất bại!!!";
			}
		}
	}
	die;
?>