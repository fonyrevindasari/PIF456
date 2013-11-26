<!DOCTYPE html>
<html>
<head>
<title>Studi Kasus Modul 5</title>
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
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    $rec_limit = 5;

        if(! $conn )
            {
                die('Could not connect: ' . mysql_error());
            }
        
        mysql_select_db('myweb');
        $sql = "SELECT count(nim) FROM mahasiswa ";
        $res = mysql_query( $sql, $conn );
         if(! $res )
                        {
                die('Could not get data: ' . mysql_error());
                        }
                        
        $row = mysql_fetch_array($res, MYSQL_NUM );
        $rec_count = $row[0];
    if( isset($_GET{'page'} ) )
                {
                        $page = $_GET{'page'} + 1;
                        $offset = $rec_limit * $page;
        }
    else
       {
                        $page = 0;
                        $offset = 0;
                }
                
        $left_rec = $rec_count - ($page * $rec_limit);
        
        $sql = "SELECT nim, nama, alamat FROM mahasiswa LIMIT $offset, $rec_limit";

        $res = mysql_query( $sql, $conn );
        if(! $res )
                {
                        die('Could not get data: ' . mysql_error());
                }
?>
<h2 class="heading" align="center">Studi Kasus Modul 5</h2>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		<table class="table">
<thead>
<tr>
	<th >NIM</th>
	<th >Nama</th>
	<th>Alamat</th>
</tr> </thead> 
<tbody>     
<?php
        while($row = mysql_fetch_array($res, MYSQL_ASSOC))
        {
?>
        <tr>
                <td>
                        <?php echo $row['nim']; ?>
                </td>
                <td>
                        <?php echo $row['nama']; ?>
                </td>
                <td>
                        <?php echo $row['alamat']; ?>
                </td>
        </tr>
   
<?php
        
                }
?>


</tbody>
</table>
<ul class="pagination">	

<?php

        if( $page > 0 )
                {
            $last = $page - 2;
            echo "<li> <a href=\"?page=$last\">Last 10 Records</a> </li>";
            echo "<li> <a href=\"?page=$page\">Next 10 Records</a> </li>";
        }
     else if( $page == 0 )
        {
            echo "<li> <a href=\"?page=$page\">Next 10 Records</a> </li>";
        }
        else if( $left_rec < $rec_limit )
                {
            $last = $page - 2;
            echo "<li> <a href=\"?page=$last\">Last 10 Records</a> </li>";
        }
    mysql_close($conn);
?>
</ul>
</div>
</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>