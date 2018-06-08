<?php

//Connect to database.
$DBcon = new mysqli("localhost", "root", "", "smartcafe");

if ($DBcon->connect_errno) {
    die ("Error: ". $DBcon->connect_error);
}
?>
