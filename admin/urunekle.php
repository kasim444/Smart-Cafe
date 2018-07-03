
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
    

        
     <?php require('header.php'); ?>

     <?php require('menu.php'); ?>
       

    <div id="container">
            
      <div id="sol"></div>

      <div id="sag">

      	<?php
if(@$_POST["kaydol"]=="Register")
{
	include("ayar.php");
	//veya re1uire "ayar.php";
	/*require eğer veritabanına ulaşmazsa çalışmaz*/
	@$urun=$_POST["urun"];
	@$fiyat=$_POST["fiyat"];
	@$tur=$_POST["tur"];

	echo $urun.",".$fiyat.",".$tur;
	
	
	$sql=mysqli_query($db,"insert into `products`(productName,productPrice,categoryId) values('$urun','$fiyat','$tur')");
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
            <form method="post">
                Ürün Adı:&nbsp;<input type="text" name="urun"><br/>
                Birim Fiyatı:&nbsp;<input type="text" name="fiyat"><br/>
                Türü:&nbsp;
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
                <input type="submit" name="kaydol" value="Register" class="buton" style="margin-top: 10px;">
            </form>

	  </div>

</div>
    

    


</body>
</html>



    
    