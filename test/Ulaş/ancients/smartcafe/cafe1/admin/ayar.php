<?php
//sınav sorusu 2. dönem 2 ve 3. sınav geçen yıl
//Bağlantı yapılacak sunucu adı:
	$sunucuadi="localhost";

//sunucuya bağlantı için gerekli kullanıcı adı:
	$sunucukuladi="root";

//sunucuya bağlantı için gerekli şifre:
	$sunucusifre="";

//sunucuya çalışacağımız veritabanı
	$veritabani="cafe1";	

	
//veritabanının bulunduğu sunucuya bağlantı komutu;
mysqli_connect($sunucuadi,$sunucukuladi,$sunucusifre,$veritabani) or die("Sunucuya Bağlanamadı:(");
$col=mysqli_connect($sunucuadi,$sunucukuladi,$sunucusifre,$veritabani)

//databaseyi seçiyoruz
//mysqli_select_db($veritabani) or die("Sunucuya Bağlanamadı:(");
//veya mysql_select_db("kimbu")

//türkçe karakter için
//mysqli_query("set names 'utf8'");


?>