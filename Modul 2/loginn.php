<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tugas Web</title>
<style type="text/css">
<!--
.style1 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: medium;
	font-weight: bold;
}
.style2 {
	font-size: xx-large;
	font-family: Geneva, Arial, Helvetica, sans-serif;
}
.style3 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: x-large; font-weight: bold; }
-->
</style>
</head>

<body>
<script language="JavaScript" type="text/javascript">

function checkuser(input) {
	re = /^\D{4,}$/;
	return re.test(input);
}

function checkpass(input) {
	re = /^\D{4,}$/;
	return re.test(input);
}

function checkform(form1) {
	if(!checkuser(form1.username.value)) {
	alert("Username Salah");
	form1.username.focus();
	return false; 
	}
	
	if(!checkpass(form1.password.value)) {
	alert("Password Salah");
	form1.password.focus();
	return false;
	}
return true;
}
</script>
<form id="form1" name="form1" method="POST" action="masuk.php" onSubmit="return checkform(this)">
  <p align="center" class="style2">LOGIN</p>
  <p align="center" class="style1">Username  </p>
  <p align="center" class="style1">
    <input name="username" type="text" id="username" />
  </p>
  <p align="center" class="style1">Password  </p>
  <p align="center" class="style1">
    <input name="password" type="password" id="password" />
  </p>
  <p align="center">
    <span class="style1">
    <input name="Submit" type="submit" class="style3" value="Log in" />
  </span> </p>
</form>
<?php
if(isset($_POST["loginn"])) {
	$username = $_POST['username'];	
	$password = $_POST['password'];
	if($username == "fony" && $password == "revin") 
	{
		echo '<a href="masuk.php"></a></h2>';
	}
		else {echo '<h2> Login gagal </h2>';}
}
?>
</body>
</html>
