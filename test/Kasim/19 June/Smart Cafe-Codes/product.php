<?php
session_start();
require_once 'dbconnect.php';

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

while ($row2 = $result2->fetch_array()){
    ?>
    <div><h1><?php echo $row2["categoryName"]; ?></h1></div>
    <img style="width:100px;" src="<?php echo $row2["image"]; ?>">
    <?php
    $query = "SELECT * FROM Products ORDER BY CategoryId asc";
    $result = $DBcon->query($query);

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_array())
        {
            if ($row["categoryId"] == $row2["categoryId"]){ 
                ?>
                <div>
                    <form method="post" action="shop.php?action=add&id=<?php echo $row["productID"]; ?>">
                        <div align="center">
                            <h5><?php echo $row["productName"]; ?></h5>
                            <h5><?php echo $row["productPrice"]; ?> ₺</h5>
                            <input type="number" name="quantity" value="1">
                            <input type="hidden" name="hidden_name" value="<?php echo $row["productName"]; ?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $row["productPrice"]; ?>">
                            <button class="btn btn-circle btn-raised ripple-effect btn-default" type="submit" name="add" value="Ekle">Ekle</button>
                            </div>  
                        </div>
                    </form>
                </div>
                <hr>
                <?php
            }
        }
    }
}
?>
<?php require('footer.php'); ?>
