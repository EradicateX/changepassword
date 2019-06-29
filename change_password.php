<title>Change Password</title>
<?php
	include("session.php");
	include("header.php");
?>
<style>
input{width:250px;}
</style>

<h1>Change Password</h1>
<label>Old Password</label><input type="text" id="txt_oldpassword"/><br />
<label>New Password</label><input type="text" id="txt_newpassword" /><br />
<label>Re-type Password</label><input type="text" id="txt_newpassword2" /><br />
<label></label><button id='btnChangePassword'>Change Password</button><br />
<div id='message'></div><br />

<b>Password requirement</b><br/>
<br/>
- At least 18 alphanumeric characters and list of special chars !@#$&*<br/>
- At least 1 Upper case, 1 lower case, least 1 numeric, 1 special character<br/>
- No duplicate repeat characters more than 4<br/>
- No more than 4 special characters<br/>
- 50 % of password should not be a number<br/>
<br/>
<b>Change password requirement</b><br/>
<br/>
- Old password should match with system<br/>
- New password should be a valid password<br/>
- New password is not similar to old password < 80% match.<br/>

<script>
$(document).ready(function() {
	$("#btnChangePassword").click(function() {
		var old_password = $("#txt_oldpassword").val();
		var new_password = $("#txt_newpassword").val();
		var confirm_password = $("#txt_newpassword2").val();		
		verifyPassword(old_password, new_password, confirm_password);
		
		//var username = "<?php echo $_SESSION['login_user']; ?>";
		//console.log("Changing password of username: '" + username + "'");		
		// changePassword(username, new_password);
	});
	
	function changePassword(username, new_password) {
		$.ajax({
			url: "/changepassword/api/api_password.php",
			type: "POST",
			cache: false,
			data: {
				action: "changepassword",
				username: username,
				password: new_password
			},
			success: function(msg) {
			}
		});
	}
	
	/*
	Password requirement:
	-At least 18 alphanumeric characters and list of special chars !@#$&*
	-At least 1 Upper case, 1 lower case, least 1 numeric, 1 special character
	-No duplicate repeat characters more than 4
	-No more than 4 special characters
	-50 % of password should not be a number
	-User can input new password with characters belong to alphabets, digits and these 6 special characters only: "!@#$&*", any characters else should be considered invalid.
	 
	Change password requirement:
	-Old password should match with system
	-New password should be a valid password
	-password is not similar to old password < 80% match.
	*/
	function isEmpty(t) {
		return t.trim() == "" ? true : false;
	}
	
	function containsUppercase(p) {
		for (var i = 0; i < p.length; i++) {
			if (/[A-Z]/.test(p[i])) {
				return true;
			}
		}
		return false;
	}
	
	function containsLowercase(p) {
		for (var i = 0; i < p.length; i++) {
			if (/[a-z]/.test(p[i])) {
				return true;
			}
		}
		return false;
	}
	
	function containsNumeric(p) {
		for (var i = 0; i < p.length; i++) {
			if (/[0-9]/.test(p[i])) {
				return true;
			}
		}
		return false;
	}
	
	function countNumbericChars(p) {
		var count = 0;
		for (var i = 0; i < p.length; i++) {
			if (/[0-9]/.test(p[i])) {
				count++;
			}
		}
		var rate = parseFloat(count/p.length) * 100;
		console.log("Percentage of numbers: " + rate + "%");
		return rate;
	}
	
	function containsInvalidCharacters(p) {
		var result = /[^A-Za-z0-9!@#$&*]/g.test(p); // return any characters not belong to alphabets, numbers and the list of 6 special chars
		return result;
	}
	
	function contains5RepeatCharacters(p) {
		var a = [];
		for (var i = 0; i < p.length; i++) {
			if (!a.includes(p[i])) {
				var count = p.split(p[i]).length - 1;
				a.push(p[i]);
				if (count > 4) {
					console.log(p[i] + " repeats for " + count + " times");
					return true;
				}
			}
		}
		return false;
	}
	
	// list of special chars !@#$&*
	// https://www.w3schools.com/jsref/jsref_obj_regexp.asp
	function countSpecialCharacters(p) {
		count = 0;
		for (var i = 0; i < p.length; i++) {
			if (/[!@#$&*]/.test(p[i])) {
				count++;
			}
		}
		return count;
	}

	function matchWithSystem(p) {
		return p == "<?php echo $_SESSION['login_pass']; ?>" ? true : false;
	}

	function verifyPassword(old_password, new_password, new_password2) {
		if (isEmpty(old_password)) {
			notifyError("Old password could not be empty");
			return false;
		} else {
			if (!matchWithSystem(old_password)) {
				notifyError("Old password does not match with system");
				return false;
			}		
		}
		
		if (isEmpty(new_password)) {
			notifyError("New password could not be empty");
			return false;
		} else {
			if (new_password2 != new_password) {
				notifyError("Re-typed password does not match");
				return false;
			}
			
			if (new_password.trim().length < 18) {
				notifyError("New password must contain at least 18 characters");
				return false;
			}
			
			if(containsInvalidCharacters(new_password)) {
				notifyError("New password must contain alphabets, numbers and these special characters: '!@#$&*' only");
				return false;
			}
			
			if (!containsUppercase(new_password)) {
				notifyError("New password must contain at least 1 uppercase character");
				return false;
			}
			
			if (!containsLowercase(new_password)) {
				notifyError("New password must contain at least 1 lowercase character");
				return false;
			}
			
			if (!containsNumeric(new_password)) {
				notifyError("New password must contain at least 1 number");
				return false;
			} else {
				if (countNumbericChars(new_password) >= 50) {
					notifyError("Numberic characters should not be greater than 50%");
					return false;
				}
			}
			
			if (contains5RepeatCharacters(new_password)) {
				notifyError("New password contains a character repeating for more than 4 times");
				return false;
			}
			
			if (countSpecialCharacters(new_password) == 0) {
				notifyError("New password must contain at least 1 special character");
				return false;
			} else if (countSpecialCharacters(new_password) > 4) {
				notifyError("New password should not have more than 4 special characters");
				return false;
			}
		
			var s = similarity(old_password, new_password);
			console.log("Similarity: " + s + "%");
			if (s >= 80) {
				notifyError("New password should not be similar to the old password");
				return false;
			}
		}		
		
		notifySuccess("Password changed");
		return true;
	}
});
</script>