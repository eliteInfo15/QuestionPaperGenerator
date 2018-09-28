<?php 
class Database{
	public static $conn;
	 const server_name="localhost";
	 const server_username="root";
	 const server_password="";
	 const database_name="mcte_project";
	 const dsn="mysql:host=".Database::server_name.";dbname=".Database::database_name;

	public static function connectDb()
	{

	try {
Database::$conn = new PDO(Database::dsn, Database::server_username,Database::server_password);
   
   Database::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
		} catch (Exception $e) {
			echo "Server error: ".$e->getMessage();
		}
	}

	public static function insert($query)
	{
		try {
		$result=-1;
		if ($query!='') {
			$result=Database::$conn->exec($query);
		}
		return $result;	
		} catch (Exception $e) {
			echo "Server error: ".$e->getMessage();
		}
		
	}

	public static function read($query)
	{  $data='';
	try {
		if ($query!='') {
		     $result=Database::$conn->query($query);
		     $data=$result->fetchAll(PDO::FETCH_ASSOC);
		}
		return $data;
	} catch (Exception $e) {
		echo "Server error: ".$e->getMessage();
	}
		
	}

	public function delete($query)
	{
		try {
			$result=-1;
		if ($query!='') {
			$result=Database::$conn->exec($query);
		}
		return $result;
		} catch (Exception $e) {
			echo "Server error: ".$e->getMessage();
		}
		
	}

	public static function update($query)
	{
		try {
			$result=-1;
		if ($query!='') {
			$stmt = Database::$conn->prepare($query);
            $stmt->execute();
            $result=$stmt->rowCount();
		}
		return $result;
		} catch (Exception $e) {
			echo "Server error: ".$e->getMessage();
		}
		
		  
	}
	
}
Database::connectDb();
$n=Database::update("update subjec set sname='php' where sname='java' ");
var_dump($n);

 ?>