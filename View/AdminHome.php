<?php session_start();
   if (isset($_SESSION["usernameSession"]) && isset($_SESSION["roleSession"])) {
  
       if ($_SESSION["roleSession"]!="admin") {
          header('location:Login.php');
       }

}
else{
	header('location:Login.php');
}



 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>welcome <?php echo $_SESSION["usernameSession"] ?></h1>
<form method="post" action="../Controller/LoginController.php">

<input type="submit" name="logoutBtn" value="logout">
</form>

</body>
</html>