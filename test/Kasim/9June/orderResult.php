<?php



   date_default_timezone_set('Europe/Istanbul');
   session_start();
   require_once 'dbconnect.php';

	//Get customerID.
   $id = $_SESSION['userSession'];
   $query = $DBcon->query("SELECT customerName, customerAddress, customerPhone, customerEmail FROM Customers WHERE customerID='$id'");
   $row = $query->fetch_array();

   $name = $row['customerName'];
   $address = $row['customerAddress'];
   $phone = $row['customerPhone'];
   $email = $row['customerEmail'];
?>

<?php require('header.php'); ?>

<?php require('menu.php'); ?>

      <?php
         echo "<p style=\"text-align: center\">Talep alındı ".date('H:i:s d.m.Y')."</p>";

         echo "<p style=\"text-align: center\"> Alıcı: <b>$name</b> </p>" ;

         echo "<p style=\"text-align: center\"> Adres: <b>$address</b></p>" ;

         echo "<p style=\"text-align: center\"> Telefon Numaranız : <b>$phone</b> </p>" ;

         echo "<p style=\"text-align: center\"> E-mail: <b>$email</b> </p>" ;



         echo "<p style=\"text-align: center\"><h1 style=\"color: black;\"> Siparişiniz aşağıdaki gibidir : </h1></p>";

      $total = 0;


		//If cart is not empty. Display item.
      if(!empty($_SESSION["cart"]))
      {

         foreach($_SESSION["cart"] as $keys => $values)
         {
            echo '<center>';
            echo '<br>';
            echo '<p> Ürün Siparişi: <b>'. $values["item_name"]. '</b></p>';
            echo '<p> Miktar: <b>'. $values["item_quantity"]. '</b></p>';
            echo '<p> Tutar: <b>'. $values["product_price"]. '</b></p>';
            echo '<br>';
            echo '</center>';

		$total = $total + ($values["item_quantity"] * $values["product_price"]);
	   }

	}

      ?>


      </table>
    </div>
	<center>
	<div>
		<p><u>Tutar</u>: $ <?php echo number_format($total,2); ?> </p>
		<p><u>Vergi ve ödemeler: </u>$ <?php echo number_format($total*0.1,2); ?> </p>
		<h3><u>Toplam tutar: </u>$ <?php echo number_format($total*1.1,2); ?> </h3>
		<br>
      <h2 style="color: red">Smart Cafe'yi kullandığınız için teşekkür ederiz. </h2>
      <h2><a id="continue" href="product.php"> Alışverişe devam etmek için tıklayın. </a></h2>

	</div>
	</center>

<?php require('footer.php'); ?>

<?php
 //Clear the cart after checked out.

 unset($_SESSION['cart']);

?>
