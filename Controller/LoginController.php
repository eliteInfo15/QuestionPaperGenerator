<?php 
session_start();
require '../Model/LoginModel.php';

class LoginController{
	public function __construct()
	{
		
	}
	public function login($username,$password,$role)
	{
		
		$loginModel=new LoginModel();
		$loginModel->setUsername($username);
		$loginModel->setPassword($password);
		$loginModel->setRole($role);
		$isValid=$loginModel->validate();
	
		if ($isValid) {
		   $_SESSION["usernameSession"]=$username;
		   $_SESSION["roleSession"]=$role;
		   if ($role=="admin") {
		   	header('Location:../View/AdminHome.php');
		   }
		   else{
		   	header('Location:../View/InstructorHome.php');
		   }
		   
		}
		else{
			$_SESSION["loginError"]="Invalid username or Password";
           header('Location:../View/Login.php');
		}
	}
	public function logout()
	{
		unset($_SESSION['usernameSession']);
		session_destroy();
		header('Location:../View/Login.php');
	}
}



 ?>




 <?php 
//handling post requests
if (isset($_POST["login_btn"])) {
	$username=$_POST["username"];
	$password=$_POST["password"];
	$role=$_POST["role"];
	$loginController=new LoginController();
	$loginController->login($username,$password,$role);
}

if (isset($_POST["logoutBtn"])) {
	
	$loginController=new LoginController();
	$loginController->logout();
}


 ?>