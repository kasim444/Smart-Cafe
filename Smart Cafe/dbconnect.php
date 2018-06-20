<?php

//Connect to database.
$DBcon = new mysqli("localhost", "root", "", "cafe1");
mysqli_query($DBcon,"SET NAMES 'utf8'"); 
mysqli_query($DBcon,"SET CHARACTER SET 'utf8'"); 
mysqli_query($DBcon,"SET COLLATION_CONNECTION='utf8_unicode_ci'");
if ($DBcon->connect_errno) {
    die ("Error: ". $DBcon->connect_error);
}
?>
