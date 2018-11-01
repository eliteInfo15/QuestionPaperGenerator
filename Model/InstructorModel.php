<?php 
require 'Database.php';
class InstructorModel{
	private $instructor_id;
	private $first_name;
	private $last_name;
	private $password;
	private $gender;
	private $email;
	private $mobile;
	private $city;
	private $Rank;
	private $date_of_birth;
	public function __construct()
    {
        Database::connectDb();	
    }
    public function setInstructorId($instructor_id)
    {
        $this->instructor_id=$instructor_id;
    }
public function setPassword($password)
	{
		$this->password=$password;
	}
	
	public function setFirstName($first_name)
	{
		$this->first_name=$first_name;
	}
	public function setLastName($last_name)
	{
		$this->last_name=$last_name;
	}
    public function setEmail($email)
    {
    	$this->email=$email;
    }
    public function setGender($gender)
    {
    	$this->gender=$gender;
    }
    public function setMobile($mobile)
    {
    	$this->mobile=$mobile;
    }
    public function setCity($city)
    {
    	$this->city=$city;
    }
    public function setRank($Rank)
    {
       $this->Rank=$Rank;
    }
    public function setDateOfBirth($date_of_birth)
    {
      $this->date_of_birth=$date_of_birth;
    }
    
    public function prepareInstructorId()
    {
    	$get_instructor_query="select count(*) from instructor;";
    	$result=Database::read($get_instructor_query);
    	$instructor_count=$result->fetchColumn();
    	if ($instructor_count==0) {
    		$this->instructor_id="Instructor_mcte@1";
    	} else {
    	$get_last_inserted_id="select instructor_id from instructor order by instructor_id desc limit 1;";
    	$query_result=Database::read($get_last_inserted_id);
    	$last_inserted_id=$query_result->fetch(PDO::FETCH_ASSOC);
        $last_inserted_id=$last_inserted_id['instructor_id'];
        $splitted_id=explode('@', $last_inserted_id);
        $id_last_num=end($splitted_id);
        $id_last_num=(int)$id_last_num;
         $id_last_num++;
        $this->instructor_id="Instructor_mcte@".$id_last_num;

    	}

    }
    public function requestUpdate()
    {
       $request_update="insert into change_request values('$this->instructor_id','$this->first_name','$this->last_name','$this->gender','$this->mobile','$this->city','$this->email','$this->date_of_birth')";
       $result=Database::insert($request_update);
       return $result;
    }
    public function addInstructorToDb($subject_array)
    {
    	$this->prepareInstructorId();

    	$insert_instructor_query="insert into instructor values('$this->instructor_id','$this->first_name','$this->last_name','$this->gender','$this->mobile','$this->city','$this->Rank','$this->email','$this->date_of_birth')";
    	$result=Database::insert($insert_instructor_query);

    	$insert_login_info="insert into login values('$this->instructor_id','$this->password','instructor')";
    	$result1=Database::insert($insert_login_info);
            
            $n=count($subject_array);
          for ($i=0; $i <$n ; $i++) { 
              $insert_into_skills="insert into instructor_skills values('$this->instructor_id','$subject_array[$i]')";
              Database::insert($insert_into_skills);
          }
        
    	if ($result>0 && $result1>0) {
    		return $this->instructor_id;
    	} else {
    		return "error";
    	}
            	
    }
    public function getAllInstructorsFromDb()
	{
		$get_instructors_query="select * from instructor;";
		$result=Database::read($get_instructors_query);
		$instructor_data=$result->fetchAll(PDO::FETCH_ASSOC);
		return $instructor_data;
	}
public function getInstructorByIdFromDb($instructor_id)
    {
        $get_instructors_query="select * from instructor where instructor_id='$instructor_id';";
        $result=Database::read($get_instructors_query);
        $instructor_data=$result->fetch(PDO::FETCH_ASSOC);
        return $instructor_data;
    }
    public function removeInstructor($instructor_id)
    {
       $remove_instructor_query="delete from instructor where instructor_id='$instructor_id'";
       $remove_instructor_skills="delete from instructor_skills where instructor_id='$instructor_id'";
       $remove_instructor_login_details="delete from login where username='$instructor_id'";
       Database::delete($remove_instructor_skills);
       Database::delete($remove_instructor_login_details);
       Database::delete($remove_instructor_query);
    }
}


 ?>