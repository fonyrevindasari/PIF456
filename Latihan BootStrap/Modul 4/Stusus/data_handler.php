<!DOCTYPE html>
<html>
  <head>
    <title>Administrasi Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <?php
/**
 * Fungsi utama untuk menangani pengolahan data
 * @param string root parameter menu
 */

function data_handler($root)
{
	if (isset($_GET['act']) && $_GET['act'] == 'add')
	{
		data_editor($root);
		return;
	}
	
	$sql = 'SELECT COUNT(*) AS total FROM ' . MHS;
	$res = mysql_query($sql);
	
	//jika data di tabel ada
	if (mysql_num_rows($res))
	{
		if (isset($_GET['act']) && $_GET['act'] != '')
		{
			switch($_GET['act'])
			{
				case 'edit':
					if (isset($_GET['id']) && ctype_digit($_GET['id']))
					{
						data_editor($root, $_GET['id']);
					}
					else
					{
						show_admin_data($root);
					}
					break;
				case 'view':
					if (isset($_GET['id']) && ctype_digit($_GET['id']))
					{
						data_detail($root, $_GET['id'], 1);
					}
					else
					{
						show_admin_data($root);
					}
					break;
				case 'del':
					if (isset($_GET['id']) && ctype_digit($_GET['id']))
					{
						//key untuk penghapusan data
						$id = $_GET['id'];
						$sql = "DELETE FROM mahasiswa WHERE nim='$id'";
						//lengkapi pernyataan SQL hapus data
						$res = mysql_query($sql);
						if ($res)
						{ 
?>
						<?php
						}
						else
						{
							echo 'Gagal menghapus data';
						}
					}
					else
					{
						show_admin_data($root);
					}
					break;
				default:
				show_admin_data($root);
			}
		}
		else
		{
			show_admin_data($root);
		}
		@mysql_close($res);
	}
	else
	{
		echo 'Data Tidak Ditemukan';
	}
}
/**
 * Fungsi untuk menampilkan menu administrasi
 * @param string root parameter menu
 */
function show_admin_data($root)
{
?>
<h2 class="heading" align="center">Administrasi Data</h2>
<?php
	$sql = 'SELECT nim, nama, alamat FROM ' . MHS;
	$res = mysql_query($sql);
	
	if ($res)
	{
		$num = mysql_num_rows($res);
		if ($num)
		{
?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		<table class="table">
			<a href="<?php echo $root;?>&amp;act=add">Tambah Data </a>
			<thead>
			<tr>
				<th>#</th>
				<th>NIM</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Menu</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$i = 1;
			while ($row = mysql_fetch_row($res))
			{
				$bg = (($i % 2) != 0) ? '' : 'even';
				$id = $row[0]; ?>
				<tr class="<?php echo $bg;?>">
					<td width="2%"><?php echo $i;?></td>
					<td>
						<a href="<?php echo $root;?>&amp;act=view&amp;id=<?php echo $id;?>" title="Lihat Data"><?php echo $id;?></a>
					</td>
					<td><?php echo $row[1];?></td>
					<td><?php echo $row[2];?></td>
					<td>
					| <a href="<?php echo $root;?>&amp;act=edit&amp;id=<?php echo $id;?>">Edit</a> |
					<a href="delete.php">Hapus</a>
					<!--
					Lengkapi kode PHP untuk membuat link hapus data
					-->
					</td>
				</tr>
				<?php
				$i++;
			}
			?>
			</tbody>
		</table>
		</div>
	</div>
</div>
		<?php
		}
		else
		{
			echo 'Beluma ada data, isi <a href="'.$root.'&amp;act=add">di sini</a>';
		}
		@mysql_close($res);
	}
}
/** 
 * Fungsi untuk menampilkan detail data mahasiswa
 * @param string root parameter menu
 * @param integer id nim mahasiswa
 */
function data_detail($root, $id)
{
	$sql = 'SELECT nim, nama, alamat FROM' .MHS. 'WHERE nim='.$id;
	$res = mysql_query($sql);
	if ($res)
	{
		if (mysql_num_rows($res))
		{
		?>
		<div class="tabel">
		<table border=1 width=700 cellpadding=4 cellspacing=0>
			<?php
			$row = mysql_fetch_row($res);
			?>
			<tr>
				<td>NIM</td>
				<td><?php echo $row[0];?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><?php echo $row[1];?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><?php echo $row[2];?></td>
			</tr>
		</table>
		</div>
		<?php
		}
		else
		{
			echo 'Data tidak ditemukan';
		}
		@mysql_close($res);
	}
}
/**
 * Fungsi untuk menghasilkan form penambahan/pengubahan
 * @param string root parameter menu
 * @param integer id nim mahasiswa
 */
function data_editor($root, $id = 0)
{
	$view = true;
	if (isset($_POST['nim']) && $_POST['nim'])
	{
		//jika tidak disertai id, berarti insert baru
		if (!$id)
		{
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			//lengkapi pernyataan php SQL untuk insert data
			$res = mysql_query("INSERT INTO mahasiswa VALUES('".$nim."','".$nama."','".$alamat."')");
			if ($res)
			{
			?>
				<script type="text/javascript">
				document.location.href="<?php echo $root;?>";
				</script>
			<?php
			}
			else
			{
				echo 'Gagal menambah data';
			}
		}
		else
		{
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			//lengkapi pernyataan php sql untuk update data
			$res = mysql_query("UPDATE mahasiswa SET nim='.$nim.',nama='.$nama.',alamat='.$alamat.' WHERE nim='$id'");
			if ($res)
			{
			?>
			<?php
			}
			else
			{
				echo 'Gagal memodifikasi';
			}
		}
	}	
	//menyiapkan data untuk updating
	if ($view)
	{
		if ($id)
		{
			$sql = "SELECT nim,nama,alamat FROM mahasiswa WHERE nim='$id'";
			$res = mysql_query($sql);
			if ($res)
			{
				if (mysql_num_rows($res))
				{
					$row = mysql_fetch_row($res);
					$nim = $row[0];
					$nama = $row[1];
					$alamat = $row[2];
				}
				else
				{
					show_admin_data();
					return;
				}
			}
		}
		else
		{
			$nim = @$_POST['nim'];
			$nama = @$_POST['nama'];
			$alamat = @$_POST['alamat'];
		}
		?>
		<h2 align="center"><?php echo $id ? 'Edit' : 'Tambah';?> Data</h2>
		<div class="container">
		<div class="row clearfix">
		<div class="col-md-12 column">
			<form class="form-horizontal" role="form" action="" method="post">
		<div class="form-group">
					 <label for="NIM" class="col-sm-2 control-label">NIM</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim;?>"/>
					</div>
		</div>
		<div class="form-group">
					 <label for="Nama" class="col-sm-2 control-label">Nama</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama;?>"/>
					</div>
		</div>
		<div class="form-group">
					 <label for="NIM" class="col-sm-2 control-label">Alamat</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat;?>"/>
					</div>
		</div>
		<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						 <button type="submit" class="btn btn-default">Submit</button>
						 <button type="submit" class="btn btn-default" onclick="history.go(-1)">Cancel</button>
					<br><br><p><b>Ket : * Harus Diisi</b></p>
					</div>
					
		</div>
		</form><br/>
		</div>
		</div>
		</div>
		
	<?php
	}
	return false;
}
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>