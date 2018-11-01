<?php 
require_once('../Model/SubjectModel.php');
class SubjectController{
	public function addSubject($course_id,$semester,$subjects_array)
	{
		$subject_model=new SubjectModel();
		$subject_model->setSubjectName($subjects_array);
		$subject_model->addSubjectToDb($course_id,$semester);
	}
	public function getSubjects($course_id,$semester)
	{
		$subject_model=new SubjectModel();
		$subject_data=$subject_model->getSubjects($course_id,$semester);
		return $subject_data;
	}
public function getSubjectByInstructor($course_id,$semester,$instructor_id)
    {
        $subject_model=new SubjectModel();
        $subject_data=$subject_model->getSubjectsByInstructor($course_id,$semester,$instructor_id);
        return $subject_data;
    }
    public function getAllSubjects()
    {
        $subject_model=new SubjectModel();
        $subject_data=$subject_model->getAllSubjects();
        return $subject_data;
    }
    public function getSubjectById($subject_id)
    {
        $subject_model=new SubjectModel();
        $subject_data=$subject_model->getSubjectById($subject_id);
        return $subject_data;
    }
    public function removeSubject($subject_id)
{
    $subject_model=new SubjectModel();
    $subject_model->removeSubject($subject_id);
}
}
if (isset($_POST["delete-subject"])) {
    $subject_id=$_POST["remove_subject_id"];
    $subject=new SubjectController();
   $subject->removeSubject($subject_id);
    header('location:../View/ManageSubject.php');
}
if (isset($_POST["add-subject"])) {
	 $course_id=$_POST["course_field"];
     $semester=$_POST["semester_field"];
     $no_of_subject=$_POST["no_of_subject"];
     $subjects_array = array( );
     for ($i=1; $i <=$no_of_subject ; $i++) { 
        array_push($subjects_array, $_POST["subject".$i]);
     }
    $subject_controller= new SubjectController();
    $subject_controller->addSubject($course_id,$semester,$subjects_array);
    header('location:../View/ManageSubject.php');
} 

if (isset($_POST['viewsubject'])) {
        $course_id=$_POST["course_id"];
        $semester=$_POST["semester"];
        $subject_controller= new SubjectController();
        $subject_data=$subject_controller->getSubjects($course_id,$semester);
        echo json_encode($subject_data);
} 
if (isset($_POST['viewsubjectbyinstructor'])) {
        $course_id=$_POST["course_id"];
        $semester=$_POST["semester"];
        $instructor_id=$_POST["instructor_id"];
        $subject_controller= new SubjectController();
        $subject_data=$subject_controller->getSubjectByInstructor($course_id,$semester,$instructor_id);
        echo json_encode($subject_data);
} 

 ?>