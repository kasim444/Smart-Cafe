<?php ?>

<?php
session_start();
require_once 'dbconnect.php';
?>

<?php require('header.php'); ?>

<?php require('menu.php'); ?>


    <h1 style="text-align: center; color: blue;">Sepetim</h1>
    <div>
    <table style="width: 100%">
    <tr>
    <th class="cart">Ürün İsmi</th>
    <th class="cart">Miktar</th>
    <th class="cart">Fiyat Detayları</th>
    <th class="cart">Sipariş Toplamı</th>
    <th class="cart">Sil</th>
    </tr>
    <?php
	$total = 0;
    
    //If have something in the cart. Display it.
	if(!empty($_SESSION["cart"]))
	{
	
		foreach($_SESSION["cart"] as $keys => $values)
		{
			?>
            <tr class="cart">
            <td style="background-color: #d3dcf2"><?php echo $values["item_name"]; ?></td>
            <td class="cart"><?php echo $values["item_quantity"] ?></td>
            <td class="cart"><?php echo $values["product_price"]; ?> ₺</td>
            <td class="cart"><?php echo number_format($values["item_quantity"] * $values["product_price"], 2); ?> ₺</td>
            <td class="cart"><a id="delete" href="shop.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span> X</span></a></td>
            </tr>
            <?php 
			$total = $total + ($values["item_quantity"] * $values["product_price"]);
		}
		
	} 
	?>
    </table>
    </div>
	<center>
	<div>
        <?php 
        echo "<br>";
        //products with basket added.
        echo "<b>Added products </b><br>";
        print_r(array_values($_SESSION["cart"]));

         echo "<br><br> <b>Array keys</b><br>";
        $column=implode("," , array_keys($_SESSION["cart"][0]));
        echo "$column";

        echo "<br>";
        echo "<br><br> <b>Array values</b><br>";
        $values=implode(",",array_values($_SESSION["cart"][0]));
        echo "$values";
        echo "<br><br>";

        echo "<b>Count in Array</b><br>";
        $count=count($_SESSION["cart"]);
        echo $count;

        echo "<br><br>";

        //Insert Database
        if(!empty($_SESSION["cart"]))
	    {
          foreach($_SESSION["cart"] as $keys => $values){

            $product_id=mysql_real_escape_string($values['product_id']);
            $item_name=$values['item_name'];
            $quantity=$values['item_quantity'];
            $product_price=$values['product_price'];
            $pro_sum=$values['item_quantity'] * $values['product_price'];
            $sql = "INSERT INTO order (product_id,item_name,quantity,product_price,pro_sum,total) 
            VALUES ("'.$product_id.'","'.$item_name.'","'.$quantity.'","'.$product_price.'","'.$pro_sum.'","'.$total.'")";

            if( $DBcon -> query($sql) === TRUE){
                echo "New record created succesfully.";
             }else{
                echo "Error : " . $sql . "<br>" . $DBcon->error;
            }
            
          }
        }

        
        echo "<br><br>";
        
        echo "<br><br>";

         ?>
		<p><u>Ürün toplamı: </u><?php echo number_format($total,2); ?> ₺</p>
		<p><u>Vergiler ve Ücretler : </u><?php echo number_format($total*0.18); ?> ₺</p>
		<h3>Toplam: <?php echo number_format($total*1.18); ?> ₺</h3>
		<h4><a id="checkout" href="checkout.php"> Siparişi Tamamla</a></h4>
	</div>
	</center>







<?php require('footer.php'); ?>