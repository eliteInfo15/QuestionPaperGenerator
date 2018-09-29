<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Hii <?php echo $_SESSION["usernameSession"] ?></h1>
<form method="post" action="../Controller/LoginController.php">

<input type="submit" name="logoutBtn" value="logout">
</form>

</body>
</html>