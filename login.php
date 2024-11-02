<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript">
		function validate(){


			var username=document.forms[0]['username'].value.trim();

			var password=document.getElementById("password").value.trim();

			passwordError=document.getElementById("passwordError");
			usernameError=document.getElementById("usernameError");
			if(username==""&&username.length==0){
				//alert("Enter Username");
				usernameError.style.display="inline-block";
				document.getElementById("username").focus();
				return false;
			}
			usernameError.style.display="none";
			if(password==""&&password.length==0){
				//alert("Enter Password");
				passwordError.style.display="inline-block";
				document.getElementById("password").focus();
				return false;
			}
			
			passwordError.style.display="none";

			document.forms[0].submit();

			return true;
		}

	</script>
</head>
<body >

<form action="validate.php"  method="POST">
	<table>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username" id="username"><span id="usernameError">Fill the field</span></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" id="password"><span id="passwordError">Fill the field</span></td>
		</tr>
		<tr>
			<td></td>
			<td><button type="button" onclick="validate()">Login</button></td>
		</tr>
		<tr><td><div><?php

			$error="";
			if(isset($_GET['error'])){
				$error=$_GET['error'];
			}
			echo $error;

		 ?></div></td></tr>
	</table>
	 
	 
	
</form>


</body>
</html>