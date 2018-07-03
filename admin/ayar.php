<?php
   @define('DB_SERVER', 'localhost');
   @define('DB_USERNAME', 'root');
   @define('DB_PASSWORD', '');
   @define('DB_DATABASE', 'cafe1');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   mysqli_query($db,"set names 'utf8'");
   mysqli_query($db,"SET COLLATION_CONNECTION='utf8_unicode_ci'");
?>