<?php
session_start();
require_once 'dbconnect.php';

$time=date('Y.m.d H:i:s');
$table_id=$_SESSION["table_id"];
if ($table_id == 0){
  header("Location: error.html");
} else


//If cart is empty. Cannot check out. Show error.
if (isset($_SESSION['cart']) == "") {
   echo '<script>alert("Sepetiniz boş.")</script>';
   echo '<script>window.location="yourcart.php"</script>';
}


else {
         //Insert Database        
          $sql="INSERT INTO `order` (`orderID`, `tableID`, `orderDate`, `orderStatus`) VALUES (NULL, '".$table_id."', '".$time."', '1')";
          $DBcon->query($sql);
          $last_id=mysqli_insert_id($DBcon);
          
          foreach($_SESSION["cart"] as $keys => $values){
            $product_id=$values["product_id"];
            $item_name=$values["item_name"];
            $quantity=$values["item_quantity"];
            $product_price=$values["product_price"];
            $pro_sum=$values["item_quantity"] * $values["product_price"];
            $query .= "INSERT INTO `orderdetail` (`orderdId`,`orderID`, `productID`, `unitPrice`, `quantity`, `total`) VALUES (NULL,'".$last_id."', '".$product_id."' ,'".$product_price."', '".$quantity."', '".$pro_sum."');";
            
          }
          if( $DBcon -> multi_query($query)){             
              echo " Kayıt gönderildi ";
            }else{
              echo " Komut hatalı.";
            }
   header("Location: orderResult.php");

 exit;
} 
  



?>

<?php require('header.php'); ?>
<?php require('menu.php'); ?>




<!-- If user has not logged in. They will see this -->

<!-- <center><h1 style="color: red">Üzgünüz, ilk olarak giriş yapmalısınız.</h1></center>
<center><h3><a id="orderLogin" href="index.php"> Giriş Yap</a></h3></center> -->
