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
  include "ayar.php";
  //veya re1uire "ayar.php";
  /*require eğer veritabanına ulaşmazsa çalışmaz*/
  $tur=$_POST["tur"];
  
  
  $sql=mysqli_query($db,"insert into `table`(tableName) values('$tur')");
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
            <form action="" method="post" class="yazi" style="margin-top: 50px;">
<<<<<<< HEAD
                Masa Adı:&nbsp;<input type="text" name="tur" value=""><br/>
=======
                Tur Adı:&nbsp;<input type="text" name="tur" value=""><br/>
>>>>>>> 184476e712f4c686a231e8fd0d4a00af87648cfd
                <input type="submit" name="kaydol" value="Register" class="buton" style="margin-top: 10px;">
                   
            </form>
         

<?php
  include "ayar.php";
  $sql2=mysqli_query($db,"select * from `table`");

  ?>
  
  <table style="border-style: solid 1px; color: #FFFFFF; margin:auto; margin-top: 30px; width: 200px; font-size: 60px ; ">
  <tr>
  <tr><td>Tur_İd</td><td>Tur</td>

  <?php
  while($kayit2=mysqli_fetch_array($sql2))
  {
  echo "<tr>";
  echo "<td>".$kayit2["tableID"]."</td>";
  echo "<td>".$kayit2["tableName"]."</td>";
  echo "</tr>";
  }
  ?>

  </table>

      </div> 

    </div>
    

    


</body>
</html>
