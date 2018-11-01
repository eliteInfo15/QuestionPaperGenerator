<?php 
require_once '../Model/InstructorModel.php';
class InstructorController{
	public function requestUpdate($instructor_id,$fname,$lname,$email,$mobile,$gender,$city,$dob)
	{
		$model=new InstructorModel();
		$model->setInstructorId($instructor_id);
		$model->setFirstName($fname);
        $model->setLastName($lname);
        $model->setGender($gender);
        $model->setEmail($email);
        $model->setMobile($mobile);
        $model->setCity($city);
        $model->setDateOfBirth($dob);
        $result=$model->requestUpdate();
       return $result;
	}
}
if (isset($_POST['requestUpdate'])) {
    $instructor_id=$_POST["instructor_id"];
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    $mobile=$_POST["mobile"];
    $gender=$_POST["gender"];
    $city=$_POST["city"];
    $dob=$_POST["dob"];
    
    $controller=new InstructorController();
    $result=$controller->requestUpdate($instructor_id,$fname,$lname,$email,$mobile,$gender,$city,$dob);
    echo $result;
}
 ?>