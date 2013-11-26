<!DOCTYPE HTML>
<html>
<head>
	<title>Latihan Bootstrap</title>
	<style type="text/css">
	.even
	{
		background: #ddd;
	}
	</style>
</head>
<body>
<?php
ini_set('display_errors', 1);
define('VALID', 1);

require_once './auth.php';

init_login();
validate();

require_once('./home.php');
?>
</body>
</html>