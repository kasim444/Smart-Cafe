<?php
session_start();

include "admin/ayar.php";

$tbid = rand(61,100);

$tbname = "usr$tbid";
$_SESSION["tablo"]=$tbname;
$newTable   = $col->query("CREATE TABLE IF NOT EXISTS $tbname (
urun_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
urun_adi VARCHAR(30) NOT NULL,
adet INT NOT NULL,
birim_fiyat INT,
toplam INT
)");
//echo $tbname;
header("Location: urunlistele.php");
?>
