<?php ?>

<?php
session_start();
require_once 'dbconnect.php';
?>

<?php require('header.php'); ?>

<?php require('menu.php'); ?>


    <h1 style="text-align: center; color: #04284b;">Sepetim</h1>
   <?php 
$total = 0;
if (empty($_SESSION["cart"])) { ?>
    <div>
            <table style='width: 100%'>
            <tr>
            <th class='cart'>Sepetiniz boş, lütfen istediğiniz ürünleri sepetinize ekleyiniz.</th></tr></table>
<?php } else { ?><?php
            ?>
            <div style="padding-top:25px;">
            <table style="margin-left:25%;width: 50%;">
            <tr>
            <th class="cart">Ürün İsmi</th>
            <th class="cart">Miktar</th>
            <th class="cart">Fiyat Detayları</th>
            <th class="cart">Sipariş Toplamı</th>
            <th class="cart">Sil</th>    
            </tr>
    <?php      
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
        ?>
        </table>
    </div>
	<center>
	<div style="padding-top:25px;">        
		<p><u>Ürün toplamı: </u><?php echo number_format($total,2); ?> ₺</p>
		<p><u>Vergiler ve Ücretler : </u><?php echo number_format($total*0.18); ?> ₺</p>
		<h3>Toplam: <?php echo number_format($total*1.18); ?> ₺</h3>
		<a class="btn btn-circle btn-raised ripple-effect btn-default" id="checkout" href="checkout.php"> Siparişi Tamamla</a>
	</div>
	</center>
<?php } ?>





<?php require('footer.php'); ?>