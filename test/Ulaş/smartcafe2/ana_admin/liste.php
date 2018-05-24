<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/admin-style.css">
</head>
<body>
<h1>Üyeler</h1>
<?php
	include ("ayar.php");
	$sql=mysqli_query($col,"select * from cafeler");
	
	echo "<div id='main'>";
	while($kayit=mysqli_fetch_array($sql))
	{
	echo "<div id='listekutu'>";
	echo "<br>Id:".$kayit["id"];
	echo "<br>Cafe Adı:".$kayit["cafeadi"];
	echo "<br>İpno:".$kayit["ipno"];
	echo "<br>Şehir:".$kayit["sehir"];
	echo "<br>İlçe:".$kayit["ilce"];
	echo "<br>Telefon:".$kayit["tel"];
	echo "<br>Kayıt Tarihi:".$kayit["tarih"];
	echo "<hr>";
	echo "</div>";
	}
	echo "</div>";
?>
</body>
</html>