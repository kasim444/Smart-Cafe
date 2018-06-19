
<?php
   include("ayar2.php");
   session_start();
   
   if(@$_POST["giris"]=="Login") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['cafe']);
      $mypassword = mysqli_real_escape_string($db,$_POST['ip']); 
      
      $sql = "SELECT id FROM cafeler WHERE cafeadi = '$myusername' and ipno = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
       	 header("Location:php/anasayfa.html");
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
<link rel="stylesheet" href="css/index.css">
</head>

<body>
 	
    <div id="arkaplan">	
		<div id="form1">
			<form action="" method="post" class="yazi">
				Cafe Adı&nbsp;<input type="text" name="cafe" value=""><br/>
				İp No:&nbsp;<input type="text" name="ip" value=""><br/>
				<input type="submit" name="giris" value="Login" class="buton">
				<a href="http://www.google.com">Forget your password</a>
                
             
             </form>
	    </div>
        
	</div>
</body>
</html>
