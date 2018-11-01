<?php 
//session_start();
require_once '../Model/CourseModel.php';

class CourseController
{
	
	function __construct()
	{
		
	}
public function addCourse($cname,$cduration)
{
	$course_model=new CourseModel();
	$course_model->setCourseName($cname);
	$course_model->setCourseDuration($cduration);
	$course_model->addCourseToDb();
	header('Location:../View/ManageCourse.php');
}
public function getAllCourses()
{
	$course_model=new CourseModel();
	$courses_array=$course_model->getAllCoursesFromDb();
	return $courses_array;
}
public function getCourseById($course_id)
{
	$course_model=new CourseModel();
	$course_data=$course_model->getCourseById($course_id);
	return $course_data;
}
public function getCoursesByInstructor($instructor_id)
{
	$course_model=new CourseModel();
	$courses_array=$course_model->getCoursesByInstructor($instructor_id);
	return $courses_array;
}
public function getSemByCourse($course_id)
{
	$course_model=new CourseModel();
	$sem_array=$course_model->getSemestersByCourse($course_id);
	echo json_encode($sem_array);
}
public function getSemByInstructor($course_id,$instructor_id)
{
	$course_model=new CourseModel();
	$sem_array=$course_model->getSemestersByInstructor($course_id,$instructor_id);
	echo json_encode($sem_array);
}
public function removeCourse($course_id)
{
	$course_model=new CourseModel();
	$course_model->removeCourse($course_id);
}

}
if (isset($_POST["delete-course"])) {
	$course_id=$_POST["remove_course_id"];
	$course=new CourseController();
   $course->removeCourse($course_id);
    header('location:../View/ManageCourse.php');
}
if (isset($_POST["add-course"])) {
	$cname=$_POST["course_name"];
	$cduration=$_POST["course_duration"];
	$course=new CourseController();
	$course->addCourse($cname,$cduration);
}
if (isset($_POST["get_sem"])) {
	$course_id=$_POST["course_id"];
	
	$course=new CourseController();
	$course->getSemByCourse($course_id);
}
if (isset($_POST["get_sem_by_instructor"])) {
	$course_id=$_POST["course_id"];
	$instructor_id=$_POST["instructor_id"];
	$course=new CourseController();
	$course->getSemByInstructor($course_id,$instructor_id);
}

 ?>