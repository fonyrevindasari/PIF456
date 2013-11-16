<!DOCTYPE> 
<html> 
<head> 
    <title>Sorting Data</title> 
</head> 

<body>
    <table border=1 cellspacing=1 cellpadding=5>

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
</body>
</html>