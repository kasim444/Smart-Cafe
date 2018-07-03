
<?php
   include("ayar.php");
   session_start();
   
   if(@$_POST["giris"]=="Login") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['cafe']);
      $mypassword = mysqli_real_escape_string($db,$_POST['ip']); 
      
      $sql = "SELECT uye_id FROM uyeler WHERE user_name = '$myusername' and sifre = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
       	 header("Location:home.php");
      }else {
        // $error = "Your Login Name or Password is invalid";
        echo "Hatalı Giriş yaptınız. Lütfen tekrar deneyin.";
      }
   }
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="../css/style.css">

    <!-- Animate Css-->
<link rel="stylesheet" href="../css/animate.min.css">

<!-- Bootstrap Cdn-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="wow fadeIn" data-wow-delay="0.5s">
    
        
     <?php require('header_login.php'); ?>

       

    <div id="container">
            
      <form action="" method="post" class="yazi">
        UserName:&nbsp;<input type="text" name="cafe" value=""><br/>
        Password:&nbsp;<input type="password" name="ip" value=""><br/>
        <input type="submit" name="giris" value="Login" class="buton">
        <a href="http://www.google.com">Forget your password</a> 
      </form>

    </div>
    

    


</body>
</html>
