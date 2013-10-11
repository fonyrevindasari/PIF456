<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<p>Fony Revindasari - 110533430524 - PTI 2011 off B</p>
<p>*** <strong>Studi Kasus</strong> ***</p>
<p>Masukkan jumlah baris dan kolom :</p>
<table width="352" border="0">
  <tr>
    <td width="141"><p>Banyak Baris </p>
    <p>Banyak Kolom </p></td>
    <td width="10"><p>:</p>
    <p>:</p></td>
    <td width="190"><form id="form1" name="form1" method="post" action="">
      <p>
        <input name="baris" type="text" id="baris" />
 </p>
      <p>       
        <input name="kolom" type="text" id="kolom" />
      </p>
      </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="Hitung" type="submit" id="Hitung" value="Submit" /></td>
	</form>    </td>
  </tr>
</table>
<?php
            $baris = $_POST["baris"];
            $kolom = $_POST["kolom"];
           
            function generate($baris, $kolom){
                $sel = 0;
                echo "<table border='5' cellpadding='10' bordercolor='#3399FF' >";
                for($i = 0; $i < $baris; $i++){
                    echo "<tr>";
                        for($j = 0; $j < $kolom; $j++){
                            $sel++;
                            echo "<td>$sel</td>";
                        }
                    echo "</tr>";
                }
                echo "</table>";
            }
            if(isset($baris) AND isset($kolom)){
                generate($baris, $kolom);
            }
        ?>
</body>
</html>