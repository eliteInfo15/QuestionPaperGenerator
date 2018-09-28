<?php
require 'Database.php'; 
class LoginModel{
	var $username;
	var $password;
    var $role;
    public function __construct()
    {
    	$db=new Database();
    	$db->dbConnect();
    }
    public function validateUser($username,$password,$role)
	{
	$login_query="select * from login where username=:username and password=:password and role=:role";
		$stmt=Database::$conn->prepare($login_query);
		$stmt->bindParam(':username',$username);
		$stmt->bindParam(':username',$username);
		$stmt->bindParam(':role',$role);
		$queryResponse=$stmt->execute();

	}
}




 ?>