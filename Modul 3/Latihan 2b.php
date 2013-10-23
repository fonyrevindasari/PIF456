<!DOCTYPE html>
<html>
<head>
<title>Hapus Session</title>
</head>
<body>
<?php
//inisialisasi data session
session_start();

//set session jika belum ada
if (isset($_SESSION['test']))
{
	//hapus session test
	unset($_SESSION['test']);
	
	echo 'session dihapus';
}
else
{
	echo 'unset';
	//mencetak semua elemen session
	print_r($_SESSION);
}
?>
<p>Tekan Refresh (F5);
</body>
</html>