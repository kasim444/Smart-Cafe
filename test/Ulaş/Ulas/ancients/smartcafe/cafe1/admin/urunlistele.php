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
	
	$sql2=mysqli_query($col,"select * from urun_turu");
	while($kayit2=mysqli_fetch_array($sql2))
	{
		echo "<table><tr><td><h1>".$kayit2["tur"]."</h1></td>"."<td><img src=img/".$kayit2["img"]." height='50px'></td></tr><table>";
		$sql=mysqli_query($col,"select * from urunler order by tur_id asc");
		while($kayit=mysqli_fetch_array($sql))
		{
			if ($kayit["tur_id"]==$kayit2["tur_id"])
			{
					echo "<table id='tablo'>";
					echo "<tr>";
					echo "<tr><td>Urun Adı</td><td>Detay</td><td>Birim Fiyat</td></tr>";
					echo "<tr>";
					echo "<td>".$kayit["urun_adi"]."</td>";
					echo "<td>".$kayit["detay"]."</td>";
					echo "<td>".$kayit["birim_fiyati"]."</td>";
					echo "</tr>";
					echo "</table>";
				
			}
		}
	}
	

?>
</body>
</html>