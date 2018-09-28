<?php
require 'Database.php'; 
class LoginModel{
	private $username;
	private $password;
    private $role;
    public function __construct()
    {
        Database::connectDb();	
    }
    public function setUsername($username)
    {
    	$this->username=$username;
    }
    public function setPassword($password)
    {
    	$this->password=$password;
    }
    public function setRole($role)
    {
    	$this->role=$role;
    }
    public function getUsername()
    {
    	return $this->username;
    }
    public function getPassword()
    {
    	return $this->password;
    }
    public function getRole()
    {
    	return $this->role;
    }
    
    public function validate()
	{
	    $loginQuery="select * from login where username='$this->username' and password='$this->password' and role='$this->role'";
		$result=Database::read($loginQuery);
        if ($result->fetchAll(PDO::FETCH_ASSOC)) {
        	return true;
        }
        return false;
	}
	public function addLoginInfo()
	{
		  $insertQuery="insert into login values('$this->username','$this->password','$this->role')";
		  $rowsInserted=Database::insert($insertQuery);
		  return $rowsInserted;
	}
}
/*$obj=new LoginModel();
$obj->setPassword('hello');
$obj->setUsername('llll');
$obj->setRole('mama');
$n=$obj->addLoginInfo();
echo $n*/;
 ?>