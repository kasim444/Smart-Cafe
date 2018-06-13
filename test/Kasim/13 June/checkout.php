<?php
session_start();
require_once 'dbconnect.php';


//If cart is empty. Cannot check out. Show error.
if (isset($_SESSION['cart']) == "") {
   echo '<script>alert("Sepetiniz boş.")</script>';
   echo '<script>window.location="yourcart.php"</script>';
}

//Check if user already logged in. Jump to orderResult.php page. Otherwise, show log in require.
else /* Üyelik  if (isset($_SESSION['userSession'])!="") */{
         //Insert Database
        if(!empty($_SESSION["cart"]))
	    {
          foreach($_SESSION["cart"] as $keys => $values){

            $product_id=$values["product_id"];
            $item_name=$values["item_name"];
            $quantity=$values["item_quantity"];
            $product_price=$values["product_price"];
            $pro_sum=$values["item_quantity"] * $values["product_price"];
            // $sql = "INSERT INTO order (product_id,item_name,quantity,product_price,pro_sum,total) 
            // VALUES ('".$product_id."','".$item_name."','".$quantity."','".$product_price."','".$pro_sum."','".$total."')";
            $sql="INSERT INTO `order` (`orderID`, `tableID`, `orderDate`, `orderStatus`) VALUES (NULL, '2', '2018-06-12', '1')";
            $sql2="INSERT INTO `order` (`orderID`, `tableID`, `orderDate`, `orderStatus`) VALUES (NULL, '2', '2018-06-12', '1')";
            if( $DBcon -> query($sql) === TRUE){
                echo "New record created succesfully.";
             }else{
                echo "Error : " . $sql . "<br>" . $DBcon->error;
            }
            
          }
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
