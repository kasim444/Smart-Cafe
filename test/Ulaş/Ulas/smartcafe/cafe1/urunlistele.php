
<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<style type="text/css">


</style>
</head>
<body>
	<center>



<?php
session_start();
	include "admin/ayar.php";
	mysqli_set_charset($col,"utf8");
	$msid=$_SESSION["masa"];
	echo $msid;

	if(@$_POST["btnsil"]=="Sil")
	{
		$id=$_POST["id"];
		$sqlsil=mysqli_query($col,"delete from sepet where sepet_id='$id'");
		if($sqlsil){
			 echo "<script>alert('Kayıt Silindi')</script>";
			 header("Location: #");
		}
		else echo "<script>alert('Silinme Hatası')</script>";
	}
	
	$total=0;
	$sql3=mysqli_query($col,"select * from sepet where masa_id='$msid'");
	echo "<table><tr><td>Urun Adı</td><td>Birim Fiyatı</td><td>Adet</td><td>Toplam Fiyat</td></tr>";
	while(@$kayit3=mysqli_fetch_array($sql3))
	{
		echo "<tr>";
		echo "<td>".$kayit3["urun_adi"]."</td>";
		echo "<td>".$kayit3["birim_fiyat"]."</td>";
		echo "<td>".$kayit3["adet"]."</td>";
		echo "<td>".$kayit3["toplam"]."</td>";
		@$total=$total+$kayit3["toplam"];
		echo "<form action='' method='post'>";
		echo "<input type='hidden' name='id' value='".$kayit3["sepet_id"]."'/>";
		echo "<td><input type='submit' name='btnsil' value='Sil' /></td>";
		echo "</form>";
		echo "</tr>";
	}
	echo "<tr><td colspan='4'><center>Sipariş Toplamı : ".$total."<center></td></tr>";
	echo "<tr><td colspan='4'><center><input type='button' name='tamamla' value='Siparişi Tamamla'/><center></td></tr>";
	echo "</table>";


	if(@$_POST["ekle"]=="Ekle")
	{
		$kont=false;
		$sql4=mysqli_query($col,"select * from sepet");
		while($kayit4=mysqli_fetch_array($sql4))
		{
			if($kayit4["urun_id"]==$_POST["urun_id"] && $kayit4["masa_id"]==$msid){
				$kont=true;
				$eski_adet=$kayit4["adet"];
			}
		}
		if($kont==true){
			echo "güncelleye girdi";
			$guncelle_id=$_POST["urun_id"];
			$ekle_adet=$_POST["adet"];
			$birim_fiyat2=$_POST["birim_fiyati"];;
			$yeni_adet=$eski_adet+$ekle_adet;
			$yeni_toplam=$birim_fiyat2*$yeni_adet;
			echo $eski_adet."+".$ekle_adet."=".$yeni_adet;
			@$duzsep=mysqli_query($col,"update sepet set adet='$yeni_adet',toplam='$yeni_toplam' where urun_id='$guncelle_id'");
			if($duzsep) {
				echo "<script>alert('Kayıt Eklendi.')</script>";
				header("Location: #");
		}
			else echo "<script>alert('Kayıt Eklenemedi')</script>";

			$kont=false;
		}
		else{
			$urun_id=$_POST["urun_id"];
			$urun_adi=$_POST["urun_adi"];
			$adet=$_POST["adet"];
			$birim_fiyati=$_POST["birim_fiyati"];
			$toplam=$birim_fiyati*$adet;
			$sep=mysqli_query($col,"insert into sepet(masa_id,urun_id,urun_adi,adet,birim_fiyat,toplam) values($msid,$urun_id,'$urun_adi',$adet,$birim_fiyati,$toplam)");
			if($sep)
			{
				echo "Kayıt Eklendi";
				header("Location: #");
			}
			else
			{
				echo "Kayıt Eklenme Hatası";
			}
		}
	}


	$sql2=mysqli_query($col,"select * from urun_turu");
	while($kayit2=mysqli_fetch_array($sql2))
	{
		echo "<table><tr><td><h1>".$kayit2["tur"]."</h1></td>"."<td style='padding-left:40px'><img src=".$kayit2["img"]." style='width:100px'></td></tr>";
		$sql=mysqli_query($col,"select * from urunler order by tur_id asc");
		echo "<table id='tablo' style='text-align:center;'>";
		echo "<tr><td><b>Urun Adı</b></td><td><b>Detay</b></td><td><b>Birim Fiyat</b></td></tr>";
		while($kayit=mysqli_fetch_array($sql))
		{
			if ($kayit["tur_id"]==$kayit2["tur_id"])
			{
					echo "<form action='' method='post'>";
					echo "<tr>";
					echo "<td>".$kayit["urun_adi"]."</td>";
					echo "<td>".$kayit["detay"]."</td>";
					echo "<td>".$kayit["birim_fiyati"]."</td>";
					echo "<td><input type='text' name='adet' value='1'></td>";
					//echo "<td><input type='text' name='aciklama'></td>";
					echo "<input type='hidden' name='urun_id' value='".$kayit["urun_id"]."' />";
					echo "<input type='hidden' name='urun_adi' value='".$kayit["urun_adi"]."' />";
					echo "<input type='hidden' name='birim_fiyati' value='".$kayit["birim_fiyati"]."'/>";
					echo "<td><input type='submit' name='ekle' value='Ekle'/></td>";
					echo "</tr>";
					echo "</form>";
			}
		}
	echo "</table>";
	echo "<hr style='height: 0;
  background: none;
  border: 0;
  border-top: 2px solid rgba(0,0,0,0.2);
  width: 40%;
  margin-top:22px;
  margin-bottom:22px;'>";
	}




?>


	</center>
</body>
</html>
