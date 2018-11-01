<?php 
require_once 'Database.php';
class CourseModel{
	private $course_name;
	private $course_duration;
	public function __construct()
    {
        Database::connectDb();	
    }
	public function setCourseName($course_name)
	{
		$this->course_name=$course_name;
	}
		public function setCourseDuration($course_duration)
	{
		$this->course_duration=$course_duration;
	}
	public function getCourseName()
	{
		return $this->course_name;
	}
		public function getCourseDuration()
	{
		$this->course_duration;
	}
  public function getCourseById($course_id)
  {
    $get_courses_query="select * from course where cid='$course_id';";
    $result=Database::read($get_courses_query);
    $course_data=$result->fetch(PDO::FETCH_ASSOC);
    return $course_data;
  }
	public function addCourseToDb()
	{
		$insert_into_course="insert into course(cname,cduration) values('$this->course_name','$this->course_duration');";
        Database::insert($insert_into_course);

        $get_cid_query="select max(cid) as cid from course;";
        $result=Database::read($get_cid_query);
        $data=$result->fetch(PDO::FETCH_ASSOC);    
        $cid=$data['cid'];

        for ($i=1; $i <=$this->course_duration ; $i++) { 
  	     $insert_into_course_sem="insert into course_semester(cid,semester) values($cid,$i)";
  	      Database::insert($insert_into_course_sem);
         }
		  
	}
	public function getAllCoursesFromDb()
	{
		$get_courses_query="select * from course;";
		$result=Database::read($get_courses_query);
		$course_data=$result->fetchAll(PDO::FETCH_ASSOC);
		return $course_data;
	}

   public function getSemestersByCourse($course_id)
   {
   	$get_semesters_query="select semester from course_semester where cid=$course_id";

    $result=Database::read($get_semesters_query);
		$semesters_data=$result->fetchAll(PDO::FETCH_ASSOC);
		return $semesters_data;
   }
   public function getSemestersByInstructor($course_id,$instructor_id)
   {
    $get_semesters_query="select distinct semester from instructor_skills,course_subject where instructor_id='$instructor_id' and instructor_skills.sid=course_subject.sid and course_subject.cid='$course_id'";

    $result=Database::read($get_semesters_query);
    $semesters_data=$result->fetchAll(PDO::FETCH_ASSOC);
    return $semesters_data;
   }
   public function getSubjectsByCourse($course_id)
   {
   	$get_subejcts="select sid from course_subject where cid='$course_id'";
   	$subjects_result=Database::read($get_subejcts);
   	$subjects_data=$subjects_result->fetchAll(PDO::FETCH_ASSOC);
   	return $subjects_data;
   }
   public function removeCourse($course_id)
   {

   	      $subjects_data=$this->getSubjectsByCourse($course_id);
   	      $subjects_id=array();
   	      $n=count($subjects_data);
   	      for ($i=0; $i <$n ; $i++) { 
   	      	array_push($subjects_id, $subjects_data[$i]['sid']);
   	      }

   	      foreach ($subjects_id as $id) {
   	      	$remove_subject="delete from subject where sid='$id'";
   	      	Database::delete($remove_subject);
   	      }
          $remove_course="delete from course where cid='$course_id'";
          Database::delete($remove_course);


   }
   public function getCoursesByInstructor($instructor_id)
    {
       $get_course="select course_subject.cid,cname,semester, course_subject.sid from course_subject,course,instructor_skills where instructor_id='$instructor_id' and instructor_skills.sid=course_subject.sid and course_subject.cid=course.cid";
       $result=Database::read($get_course);
    $course_data=$result->fetchAll(PDO::FETCH_ASSOC);
    return $course_data;
    }
}


 ?>