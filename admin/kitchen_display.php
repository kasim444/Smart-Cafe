<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/style.css">
  <title></title>
</head>
<body>
<h1>Kasa Ekranı</h1>
<hr>
<?php

require_once '../dbconnect.php';

$t=0;

$sql="SELECT * FROM `order` WHERE `orderStatus`=2 ORDER BY `orderDate`";
$result=$DBcon->query($sql);

while($row=$result->fetch_array()){

  $sql2="SELECT * FROM `table`";
  $result2=$DBcon->query($sql2);

  ?>
  <div style="float:left;width:35%;margin:44px;padding:44px;-moz-box-shadow: 0 0 10px black;-webkit-box-shadow: 0 0 10px black;box-shadow: 0 0 10px black;justify-content:center;">
      <h2><?php echo "Sipariş No :". $row["orderID"]; ?></h2>
      <?php

      while($row2=$result2->fetch_array()){

        if ($row["tableID"]==$row2["tableID"]) {
          ?>
          <h4><?php echo "Masa Adı : ".$row2["tableName"]; ?></h4><hr>

        <?php
      }else{

      }

      $sql3="SELECT * FROM `orderdetail`";
      $result3 = $DBcon->query($sql3);

      while($row3=$result3->fetch_array()){
        if ($row["orderID"]==$row3["orderID"]) {

          $sql4="SELECT * FROM `products`";
          $result4=$DBcon->query($sql4);

          while ($row4=$result4->fetch_array()) {
            if ($row3["productID"]==$row4["productID"] && $row["tableID"]==$row2["tableID"]) {
              $f=$row4["productPrice"];
              $f2=$f*$row3["quantity"];
              $t+=$f2;
              ?>
              <h6><?php echo $row4["productName"]." 1 adet ".$row4["productPrice"]." "."TL"." x ".$row3["quantity"]."  "." adet "; ?></h6>
            <?php
          }
        }
      }else{

      }
    }

  }?>
  <br>
  <h6><?php echo "Toplam fiyat=".$t; ?></h6>
  <?php $t=0; ?>
  <a id="update" href="../shop.php?action=update2&orderID=<?php echo $row["orderID"]; ?>"><span>Tamamlandı</span></a>
   </div>
   </body>
</html>

<?php
}

?>
