<?php

require_once 'dbconnect.php';

$sql="SELECT * FROM `category`"

$sql1="INSERT INTO `category`(`categoryId`, `categoryName`, `image`) VALUES (NULL,'Soslar','img/sos.png')";

$sql2="UPDATE `category` SET `categoryId`=3,`categoryName`='',`image`='' WHERE `categoryId`=2"

?>
