<?php

require_once 'dbconnect.php';

$sql="SELECT * FROM `products`"

$sql1="INSERT INTO `products`(`productID`, `productName`, `productPrice`, `categoryId`) VALUES (NULL, 'Tatlı',30,7)";

$sql2="UPDATE `products` SET `productID`=,`productName`='',`productPrice`=,`categoryId`= WHERE `productID`=2"

?>
