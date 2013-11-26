<!DOCTYPE html >
 <html>
 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
 
 <title>Hapus Data</title>

 <script language="JavaScript">
    function konfirmasi(id)
    {
        ask = confirm('Anda yakin ingin menghapus data dengan NIM '+ id + '?');
        if (ask == true)
            return true;
        else
            return false;
    }
 </script>

 </head>

 <body>
    <?php
		error_reporting(0);
        include "koneksi.php";
       
        $id = $_GET['id'];
        if ($id)
        {
            $query = mysql_query("DELETE FROM mahasiswa WHERE nim=$id");
            header("Location:".$_SERVER['PHP_SELF']);
        }
    ?>
	<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		<h2 class="heading" align="center">Hapus Data Siswa</h2>
 <form id="form1" name="form1" method="post" action="">
 <table class="table">
    <tr>
      <td>NIM</td>
      <td>Nama </td>
      <td>Alamat</td>
	  <td>Menu</td> 
    </tr>
    <?php
        $sql = mysql_query("SELECT * FROM mahasiswa");
    while ($row = mysql_fetch_array($sql))
    {
        $id = $row['nim'];
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $_SERVER['PHP_SELF'];
    ?>
    <tr>
      <td><?php echo $id; ?></td>
      <td><?php echo $nama; ?></td>
      <td><?php echo $alamat; ?></td>
      <td><?php echo "<a href=\"".$_SERVER['PHP_SELF']."?id=$id\" onclick=\"return konfirmasi('$id')\">Delete</a>"; ?></td>
    </tr>
    <?php
    }
    ?>
  </table>
  <a href ="index.php"> Back </a>|<a href="?m=logout"> Keluar</a>
 </form>
 </div>
 </div>
 </div>
 
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 </body>
 </html>