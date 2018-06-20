<?php
	include "ayar.php";
//kayıt silme kodu başlangıcı
	if(@$_POST["btnsil"]=="Sil")
	{
		$id=$_POST["id"];
		$sqlsil=mysqli_query($col,"delete from cafeler where id='$id'");
		if($sqlsil) echo "<script>alert('Kayıt Silindi')</script>"; else echo "<script>alert('Silinme Hatası')</script>";
	}
//kayıt silme kod bitişi

//kayıt düzenle kod başlangıcı
	if(@$_POST["btnduzenle"]=="Düzenle")
	{
		$id=$_POST["id"];
		$cafeadi=$_POST["cafeadi"];
		$ipno=$_POST["ipno"];
		$sehir=$_POST["sehir"];
		$ilce=$_POST["ilce"];
		$tel=$_POST["tel"];
		@$sqlduzenle=mysqli_query($col,"update cafeler set cafeadi='$cafeadi',ipno='$ipno', sehir='$sehir', ilce='$ilce',tel='$tel' where id='$id'");
		if($sqlduzenle) echo "<script>alert('Kayıt Değiştirildi.')</script>"; else echo "<script>alert('Düzenleme Hatası')</script>";
	}



//kayıt düzenle kod bitişi

	$sql=mysqli_query($col,"select * from cafeler");
	while($satir=mysqli_fetch_array($sql))
	{
		
?>
<div id="uyelistele">
<form action="" method="post">
	<table>
    <tr>
        <td colspan="2"><input type="hidden" name="id" value="<?php echo $satir["id"];?>"/></td>
    </tr>
    <tr>
    	<td>Cafe Adı</td>
        <td><input type="text" name="cafeadi" value="<?php echo $satir["cafeadi"];?>"/></td>
    </tr>
    <tr>
    	<td>İp No</td>
        <td><input type="text" name="ipno" value="<?php echo $satir["ipno"];?>"/></td>
    </tr>
    <tr>
    	<td>Sehir</td>
        <td><input type="text" name="sehir" value="<?php echo $satir["sehir"];?>"/></td>
    </tr>
    <tr>
    	<td>İlce</td>
        <td><input type="text" name="ilce" value="<?php echo $satir["ilce"];?>"/></td>
    </tr>
    <tr>
    	<td>Telefon</td>
        <td><input type="text" name="tel" value="<?php echo $satir["tel"];?>"/></td>
    </tr>
    
    <tr>
    	<td><input type="submit" name="btnsil" value="Sil" /></td>
       	<td><input type="submit" name="btnduzenle" value="Düzenle" /></td></tr>
    </table>
</form>
</div>
<?php }
?>