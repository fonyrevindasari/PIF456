<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<?php
defined('_VALID') or die('not allowed');

function init_login()
{
	//simulasi data account nama dan password
	$nama = 'fony';
	$pass = 'fony';
	
	if (isset($_POST['nama']) && isset($_POST['pass']))
	{
		$n = trim($_POST['nama']);
		$p = trim($_POST['pass']);
		
		if (($n === $nama) && ($p === $pass))
		{
			//jika sama, set cookie
			setcookie('nlogin', $n);
			setcookie('time', time());
			
			//redireksi
		?>
		<script type="text/javascript">
		document.location.href="./";
		</script>
		<?php
		}
		else
		{
			echo 'Nama/Password Tidak Sesuai';
			return false;
		}
	}
}
function validate()
{
	if(!isset($_COOKIE['nlogin']) || !isset($_COOKIE['time']))
	{
?>
	<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<form action="" method="post" class="form-horizontal" role="form">
				<div class="form-group">
					 <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
					<div class="col-sm-10">
						<input name="nama" type="text" class="form-control" id="inputEmail3" />
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input name="pass" type="password" class="form-control" id="inputPassword3" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						 <button type="submit" class="btn btn-default">Log in</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

	<!--<div class="inner">
	<form action="" method="post">
	<table border=0 cellpadding=5>
	<tr>
		<td>Nama</td>
		<td><input type="text" name="nama" /></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="password" name="pass" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="LOGIN" /></td>
	</tr>
	</table>
	</form>
	</div>-->
	<?php
	exit;
	}
	if (isset($_GET['m']) && $_GET['m'] == 'logout')
	{
		//hapus cookie
		if (isset($_COOKIE['nlogin']))
		{
			setcookie('nlogin', '', time() - 3 * 3600);
		}
		if (isset($_COOKIE['time']))
		{
			setcookie('time', '', time() - 3 * 3600);
		}
		
		//redireksi halaman
		?>
		<script type="text/javascript">
		document.location.href="./";
		</script>
	<?php
	}
}
?>
</body>
</html>