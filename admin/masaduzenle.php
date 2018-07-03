<?php
	include "ayar.php";
//kayıt silme kodu başlangıcı
	if(@$_POST["btnsil"]=="Sil")
	{
		$id=$_POST["id"];
		$sqlsil=mysqli_query($db,"delete from `table` where tableID='$id'");
		if($sqlsil) echo "<script>alert('Kayıt Silindi')</script>"; else echo "<script>alert('Silinme Hatası')</script>";
	}
//kayıt silme kod bitişi

//kayıt düzenle kod başlangıcı
	if(@$_POST["btnduzenle"]=="Güncelle")
	{
		$id=$_POST["id"];
		$masa=$_POST["tur"];
		@$sqlduzenle=mysqli_query($db,"update `table` set tableName='$masa' where tableID='$id'");
		if($sqlduzenle) echo "<script>alert('Kayıt Değiştirildi.')</script>"; else echo "<script>alert('Düzenleme Hatası')</script>";
	}



//kayıt düzenle kod bitişi

	?>


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

      

    <div id="container">
                <table style="color:  #FFFFFF; font-size: 15px; text-align: center; margin: auto; margin-top: 50px; width: 400px;">
                <form action="" method="post">
                    
<<<<<<< HEAD
                    <tr><td>Masa İd</td><td>Masa Adı</td></tr>
=======
                    <tr><td>Tur İd</td><td>Tür Adı</td></tr>
>>>>>>> 184476e712f4c686a231e8fd0d4a00af87648cfd
                    <?php  
                          $sql=mysqli_query($db,"select * from `table`");
                        while($satir=mysqli_fetch_array($sql))
                        {
        
                ?>

                    <tr>
                        <td><input type="hidden" name="id" value="<?php echo $satir["tableID"];?>"/> <?php echo $satir["tableID"]; ?> </td>
                        <td><input type="text" name="tur" value="<?php echo $satir["tableName"];?>"/></td>
                        
                        <td><input type="submit" name="btnduzenle" value="Güncelle" /></td>
                        <td><input type="submit" name="btnsil" value="Sil" /></td>
                    </tr>   

                <?php 
                }
                ?>
                </form>
                  </table>

    </div>
    

    


</body>
</html>

