<?php

require_once 'dbconnect.php';

$query2="SELECT * FROM `order` WHERE `orderStatus`=1 ORDER BY `orderDate`";
$result2=$DBcon->query($query2);

$query="SELECT * FROM `orderdetail`";
$result = $DBcon->query($query);

$query3="SELECT * FROM `table`";

$query4="SELECT * FROM `products`";

$DBcon->query($query3);

$DBcon->query($query4);

while ($row2 = $result2->fetch_array()){
    
    

    if($result2->num_rows > 0)
    {
        while($row = $result->fetch_array())
        {
            if ($row["orderID"] == $row2["orderID"]){ 
                ?>
                <div>
                        <div align="center">
                            <h2><?php echo "Sipariş No :". $row["orderID"]; ?></h2>
                            <h5><?php echo "Masa No : ".$row2["tableID"]; ?></h5>
                        </div>
                </div>
                <hr>
                <?php
            }
        }
    }
}
 
 

?>