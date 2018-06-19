<?php
if(@$_POST["kaydol"]=="Register")
{
	include("baglan.php");
	//veya re1uire "ayar.php";
	/*require eğer veritabanına ulaşmazsa çalışmaz*/
	$cafe=$_POST["cafe2"];
	$ip=$_POST["ip2"];
	$sehir=$_POST["sehir"];
	$ilce=$_POST["ilce"];
	$tel=$_POST["tel"];
	$tarih=date("Y-m-d");//bugünün tarihi
	
	
	$sql=mysqli_query($col,"insert into cafeler (cafeadi,ipno,sehir,ilce,tel,tarih) values('$cafe','$ip','$sehir','$ilce','$tel','$tarih')");
	if($sql)
	{
		echo "Kayıt Eklendi";
	}
	else
	{
		echo "Kayıt Eklenme Hatası";
	}
}


?>
<div id="form2">
            <form action="" method="post" class="yazi">
                Cafe Adı:&nbsp;<input type="text" name="cafe2" value=""><br/>
                İp No:&nbsp;<input type="text" name="ip2" value=""><br/>
                Sehir:&nbsp;<input type="text" name="sehir" value=""><br/>
                İlce:&nbsp;<input type="text" name="ilce" value=""><br/>
                Tel:&nbsp;<input type="text" name="tel" value=""><br/>
                <input type="checkbox" name="kabul" value="">I read and I accept the <a href="http://www.google.com">Terms and Conditions</a><br/>
                <input type="submit" name="kaydol" value="Register" class="buton" >
                
                
            </form>
         </div>