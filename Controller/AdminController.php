<?php 
require '../Model/InstructorModel.php';
class AdminController 
{
	
	
	public function addInstructor($password,$fname,$lname,$email,$mobile,$gender,$city,$Rank,$dob,$subject_array)
	{
		$instructor_model=new InstructorModel();
		$instructor_model->setPassword($password);
		$instructor_model->setFirstName($fname);
		$instructor_model->setLastName($lname);
		$instructor_model->setEmail($email);
		$instructor_model->setMobile($mobile);
		$instructor_model->setGender($gender);
		$instructor_model->setCity($city);
		$instructor_model->setRank($Rank);
		$instructor_model->setDateOfBirth($dob);
		$result=$instructor_model->addInstructorToDb($subject_array);
		return $result;
	}

public function getAllInstructors()
{
	$instructor_model=new InstructorModel();
	$instructors_array=$instructor_model->getAllInstructorsFromDb();
	return $instructors_array;
}

public function getInstructorById($instructor_id)
{
	$instructor_model=new InstructorModel();
	$instructor_data=$instructor_model->getInstructorByIdFromDb($instructor_id);
	return $instructor_data;
}

public function removeInstructor($instructor_id)
{
	$instructor_model=new InstructorModel();
	$instructor_model->removeInstructor($instructor_id);
	
}
}
if (isset($_POST["delete_btn"])) {
	$instructor_id=$_POST["remove_instructor_id"];
	$admin=new AdminController();
    $result=$admin->removeInstructor($instructor_id);
    header('location:../View/ManageInstructor.php');
}
if (isset($_POST['requestFor'])) {
    $password=$_POST["password"];
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    $mobile=$_POST["mobile"];
    $gender=$_POST["gender"];
    $city=$_POST["city"];
    $Rank=$_POST["Rank"];
    $dob=$_POST["dob"];
    $subject_string=$_POST["subject"];
    $subject_array=explode(',', $subject_string);
    $admin=new AdminController();
    $result=$admin->addInstructor($password,$fname,$lname,$email,$mobile,$gender,$city,$Rank,$dob,$subject_array);
    echo $result;
}



 ?>