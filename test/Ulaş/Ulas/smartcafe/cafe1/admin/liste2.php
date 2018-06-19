<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Üyeler Div</title>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/admin-style.css">
</head>

<body>
<h1>Üyeler</h1>
<?php
	include "ayar.php";
	$sql=mysql_query("select * from cafeler");

	echo "<table id='tablo'>";
	echo "<tr>";
	echo "<tr><td>İd</td><td>CafeAdı</td><td>İpNod</td><td>Sehir</td><td>İlce</td><td>Telefon</td><td>Tarih</td>";
	
	while($kayit=mysql_fetch_array($sql))
	{
	echo "<tr>";
	echo "<td>".$kayit["tur_id"]."</td>";
	echo "<td>".$kayit["tur"]."</td>";
	echo "</tr>";
	}
	echo "</table>";

?>
</body>
</html>