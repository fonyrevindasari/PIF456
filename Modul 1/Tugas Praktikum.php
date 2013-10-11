<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tugas Praktikum</title>
<style type="text/CSS">
	table {border='5' cellpadding='10' bordercolor='#3399FF'}
	td {border='5' cellpadding='10' bordercolor='#3399FF'}
	</style>
</head>

<body>
<p>Fony Revindasari - 110533430524 - PTI 2011 off B</p>
<p>*** <strong>Tugas Praktikum</strong> ***</p>
<p>Masukkan jumlah kolom dan cell :</p>
<table width="352" border="0">
  <tr>
    <td width="141"><p>Banyak Kolom </p>
    <p>Banyak Cell </p></td>
    <td width="10"><p>:</p>
    <p>:</p></td>
    <td width="190"><form id="form1" name="form1" method="post" action="">
      <p>
        <input name="coloumn" type="text" id="coloumn" />
 </p>
      <p>       
        <input name="cell" type="text" id="cell" />
      </p>
      </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input name="Generate" type="submit" id="generate" value="Generate" /></td>
	</form>    </td>
  </tr>
</table>
<?php
	$generate = 1;
	$cell = $_POST["cell"];
	$coloumn = $_POST["coloumn"];
	$row = ceil($cell/$coloumn);
	echo "<table border='5' cellpadding='10' bordercolor='#3399FF' >";
	
	for($i = 0; $i < $row; $i++)
	{
		echo '<tr>';
		for($j = 0; $j < $_POST["coloumn"]; $j++)
		{
			if($generate != NULL)
			{
				echo '<td>'.$generate.'</td>';
				if($generate < $cell AND $generate != NULL)
				{
					$generate = $generate + 1;
				}
				else
				{
					$generate = NULL;
				}
			}
		}
		echo '</tr>';
	}
	echo '</table>';
?>
</body>
</html>
