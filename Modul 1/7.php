<!DOCTYPE HTML>
<html>
<head>
<title>Casting Tipe</title>
</head>

<body>
<?php

$str = '123abc';

//casting nilai variabel $str ke integer
$bil = (int) $str; //$bil = 123

echo gettype($bil);
//Output : string

echo gettype($bil);
//Output : integer

?>
</body>
</html>
