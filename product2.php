<?php
session_start();
require_once 'dbconnect.php';

if(@$_POST["onay"]=="Onayla")
{
    @$turunuz=$_POST["turunuz"];
    
        

}


?>

<?php require('header.php'); ?>

<?php require('menu.php'); ?>

<?php
if(!empty($_COOKIE['table_id'])){
    echo "Masa = " .$_COOKIE['table_id'];
    $_SESSION["table_id"] = $_COOKIE['table_id'];
} 


    //Display all products in Products table.

// $table_id=$_POST["table_id"];
// echo $table_id;
// var_dump($_POST);
// var_dump($_GET);

$query2 ="SELECT * FROM category order by CategoryId " ;
$result2=$DBcon->query($query2);
?>
</br>
<form action="" method="post">
<select name="turunuz">
                	<?php
                	while ($row2 = $result2->fetch_array()){

				
						echo "<option value='".$row2["categoryId"]."'>".$row2["categoryName"]."</option>";

                      }
                      
                	?>
                    <input type="submit" name="onay" value="Onayla">
    </select>
</form>      



<?php

    $query3 ="SELECT * FROM category WHERE CategoryId='".$turunuz."'";
    $result3=$DBcon->query($query3);
    while ($row3 = $result3->fetch_array()){

?>
        <img style="width:100px;" src="<?php echo $row3["image"]; ?>">
<?php
    
    }         
                      
  
    $query = "SELECT * FROM Products ORDER BY CategoryId asc";
    $result = $DBcon->query($query);

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_array())
        {
            if ($row["categoryId"] == @$turunuz){ 
                ?>
                <div>
                    <form method="post" action="shop.php?action=add&id=<?php echo $row["productID"]; ?>">
                        <div align="center">
                            <h5><?php echo $row["productName"]; ?></h5>
                            <h5><?php echo $row["productPrice"]; ?> ₺</h5>
                            <input type="number" name="quantity" value="1" min="1" max="10">
                            <input id="name" type="hidden" name="hidden_name" value="<?php echo $row["productName"]; ?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $row["productPrice"]; ?>">
                            <button style="background:linear-gradient(35deg,#2bbbad,#0069ff);" class="btn btn-circle btn-raised ripple-effect btn-default" type="submit" name="add" value="Ekle">Ekle</button>
                            </div>  
                        </div>
                    </form>
                </div>
            </div>
                <hr>
                <?php
            }
        }
    }
?>
<?php require('footer.php'); ?>
