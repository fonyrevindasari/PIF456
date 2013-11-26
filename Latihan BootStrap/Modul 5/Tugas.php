<!DOCTYPE> 
<html> 
<head> 
    <title>Sorting Data</title> 
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
<h2 class="heading" align="center">Studi Kasus Modul 5</h2>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		<table class="table">

    <?php
    require "koneksi.php";
    $query1 = "SELECT * FROM Mahasiswa ORDER BY nim ";
	//ubesar = urut dari besar ke kecil
    $ubesar = 'asc';
    $ubesarbaru = 'asc';
    if(isset($_GET['orderby']))
        {
        $orderby=$_GET['orderby'];
        $ubesar=$_GET['ubesar'];
                                
        $query1="SELECT * FROM Mahasiswa order by $orderby $ubesar ";
        if($ubesar=='asc')
                {
            $ubesarbaru='desc';                                        
        }
                else
                {
            $ubesarbaru='asc';
        }
    }
    ?>
    <th>
        <td><a href='Tugas.php?orderby=nim&ubesar=<?=$ubesarbaru;?>'>Nim</a></td>
        <td><a href='Tugas.php?orderby=nama&ubesar=<?=$ubesarbaru;?>'>Nama</a></td>
        <td><a href='Tugas.php?orderby=alamat&ubesar=<?=$ubesarbaru;?>'>Alamat</a></td>
    </th>
                                                        
    <?php
        $result = mysql_query($query1) or die (mysql_error());
        $no = 1;
        while($rows=mysql_fetch_object($result))
                {
        ?>
                        <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $rows -> nim;?></td>
                <td><?php echo $rows -> nama;?></td>
                <td><?php echo $rows -> alamat;?></td>
            </tr>
                
                        <?php
            $no++;
        }
            ?>
    </table>
	</div>
	</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>