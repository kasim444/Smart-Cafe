<?php
session_start();

include "admin/ayar.php";

$msid = rand(1,5);
$_SESSION["masa"]=$msid;

header("Location: urunlistele.php");
?>
