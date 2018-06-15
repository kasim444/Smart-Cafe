 <?php
if(@$_POST["kaydol"]=="Register")
{
	include "ayar.php";
	//veya re1uire "ayar.php";
	/*require eğer veritabanına ulaşmazsa çalışmaz*/
	$tur=$_POST["tur"];
	
	
	$sql=mysqli_query($col,"insert into urun_turu(tur) values('$tur')");
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
                Tur Adı:&nbsp;<input type="text" name="tur" value=""><br/>
                <input type="submit" name="kaydol" value="Register" class="buton" >
                
                
            </form>
         </div>

<?php
	include "ayar.php";
	$sql=mysqli_query($col,"select * from urun_turu");

	echo "<table id='tablo'>";
	echo "<tr>";
	echo "<tr><td>Tur_İd</td><td>Tur</td>";
	
	while($kayit=mysqli_fetch_array($sql))
	{
	echo "<tr>";
	echo "<td>".$kayit["tur_id"]."</td>";
	echo "<td>".$kayit["tur"]."</td>";
	echo "</tr>";
	}
	echo "</table>";

?>