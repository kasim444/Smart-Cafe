
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="../css/style.css">

    <!-- Animate Css-->
<link rel="stylesheet" href="../css/animate.min.css">

<!-- Bootstrap Cdn-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="wow fadeIn" data-wow-delay="0.5s">
    
        
     <?php 
     require('header.php'); 
     require('menu.php'); 
     ?>


</body>
</html>


<?php
	include "ayar.php";
//kayıt silme kodu başlangıcı
	if(@$_POST["btnsil"]=="Sil")
	{
		$id=$_POST["id"];
		$sqlsil=mysqli_query($db,"delete from products where productID='$id'");
		if($sqlsil) echo "<script>alert('Kayıt Silindi')</script>"; else echo "<script>alert('Silinme Hatası')</script>";
	}
//kayıt silme kod bitişi

//kayıt düzenle kod başlangıcı
	if(@$_POST["btnduzenle"]=="Düzenle")
	{
		$id=$_POST["id"];
		$cafeadi=$_POST["cafeadi"];
		$ipno=$_POST["fiyat"];
		$sehir=$_POST["tur"];
		@$sqlduzenle=mysqli_query($db,"update products set productName='$cafeadi',productPrice='$ipno', categoryId='$sehir' where productID='$id'");
		if($sqlduzenle) echo "<script>alert('Kayıt Değiştirildi.')</script>"; else echo "<script>alert('Düzenleme Hatası')</script>";
	}

//kayıt düzenle kod bitişi
?>
<div id="uyelistele">
<form action="" method="post">
	<table style="text-align: center; margin: auto; margin-top: 50px; width: 800px;">
		<tr><td></td><td>Urun Adı</td><td>Birim Fiyatı</td><td>Urunun Türü</td><td>Tür Değiştirmesi</td></tr>
	<?php
		$sql=mysqli_query($db,"select * from products");
	while($satir=mysqli_fetch_array($sql))
	{
		$urun_tur=$satir["categoryId"];
		$sql3=mysqli_query($db,"select * from category where categoryId=".$urun_tur);
		while($satir2=mysqli_fetch_array($sql3))
		{

	?>

    <tr style="height: 35px;">
        <td><input type="hidden" name="id" value="<?php echo $satir["productID"];?>"/></td>

        <td><input type="text" name="cafeadi" value="<?php echo $satir["productName"];?>"/></td>
        <td><input type="text" name="fiyat" value="<?php echo $satir["productPrice"];?>"/></td>
        <td><?php echo $satir2["categoryName"] ?></td>
        <td>
        	<select name="tur">
                	<?php
                	include("ayar.php");
                	$sql2=mysqli_query($db,"select * from category");
                	while($kayit2=mysqli_fetch_array($sql2))
					 {
						echo "<option value='".$kayit2["categoryId"]."'>".$kayit2["categoryName"]."</option>";

 				 	}
                	?>
				</select><br/>
        </td>
 
    	<td><input type="submit" name="btnduzenle" value="Düzenle" /></td>
    	<td><input type="submit" name="btnsil" value="Sil" /></td>

     </tr>
     <?php 
 		}
 	 }
	 ?>
    </table>
</form>
</div>
