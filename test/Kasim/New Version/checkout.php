<?php
session_start();
require_once 'dbconnect.php';


//If cart is empty. Cannot check out. Show error.
if (isset($_SESSION['cart']) == "") {
   echo '<script>alert("Sepetiniz boş.")</script>';
			echo '<script>window.location="yourcart.php"</script>';
}

//Check if user already logged in. Jump to orderResult.php page. Otherwise, show log in require.
else if (isset($_SESSION['userSession'])!="") {
 header("Location: orderResult.php");
 exit;
}
?>

<?php require('header.php'); ?>
<?php require('menu.php'); ?>


<!-- If user has not logged in. They will see this -->

<center><h1 style="color: red">Üzgünüz, ilk olarak giriş yapmalısınız.</h1></center>
<center><h3><a id="orderLogin" href="index.php"> Giriş Yap</a></h3></center>
