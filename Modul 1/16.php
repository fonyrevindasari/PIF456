<?php
//contoh prosedur
function do_print()
{
	//mencetak informasi timestamp
	echo time();
}

//memanggil prosedur
do_print();

echo '<br />';

//contoh fungsi penjumlahan
function jumlah ($a, $b)
{
	return ($a + $b);
}

echo jumlah(2,3);
//output : 5
?>
