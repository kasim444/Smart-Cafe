<?php
require_once 'dbconnect.php';

$sql = "INSERT INTO order (order_time, product_id, quantity, table_id,) VALUES ('aa', 10,20,30)";

if ($DBcon->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $DBcon->error;
}


?>