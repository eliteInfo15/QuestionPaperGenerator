<?php 
require_once('Database.php');
class SubjectModel{
	private $subject_name;
	
	public function __construct()
    {
        Database::connectDb();	
    }
	public function setSubjectName($subject_name)
	{
		$this->subject_name=$subject_name;
	}
		
	public function getSubjectName()
	{
		return $this->subject_name;
	}
         
         public function getAllSubjects()
         {
         	$subject_query="select * from subject";
			$result=Database::read($subject_query);
			$subject_data=$result->fetchAll(PDO::FETCH_ASSOC);
		    return $subject_data;
         }
         public function getSubjectById($subject_id)
         {
         	$subject_query="select * from subject where sid='$subject_id'";
			$result=Database::read($subject_query);
			$subject_data=$result->fetch(PDO::FETCH_ASSOC);
		    return $subject_data;
         }
            
		public function getSubjects($course_id,$semester)
		{
			$subject_query="select course_subject.sid,sname from course_subject,subject where cid=$course_id and semester=$semester and course_subject.sid=subject.sid ";
			$result=Database::read($subject_query);
			$subject_data=$result->fetchAll(PDO::FETCH_ASSOC);
		    return $subject_data;
		}

	public function addSubjectToDb($course_id,$semester)
	{
		$no_of_subjects=count($this->subject_name);

		for ($i=0; $i <$no_of_subjects ; $i++) {
		$sname=$this->subject_name[$i]; 
	     $insert_into_subject="insert into subject(sname) values('$sname');";
         Database::insert($insert_into_subject);
		}
        
        $get_last_inserted_subjects="select sid from subject order by sid desc limit $no_of_subjects;";

		$result=Database::read($get_last_inserted_subjects);
        $data=$result->fetchAll(PDO::FETCH_ASSOC);
          
          for ($i=0; $i <$no_of_subjects ; $i++) { 
          	$sid_array=$data[$i];
          	$sid=$sid_array['sid'];
	     $insert_into_course_subject="insert into course_subject values('$course_id','$semester','$sid');";
         Database::insert($insert_into_course_subject);
		}
      }
      public function getUnitsBySubject($subject_id)
   {
   	$get_unit_query="select uid from subject_unit where sid=$subject_id";

    $result=Database::read($get_unit_query);
		$units_data=$result->fetchAll(PDO::FETCH_ASSOC);
		return $units_data;
   }
	public function removeSubject($subject_id)
        {
        	$units_data=$this->getUnitsBySubject($subject_id);
        	$units_id=array();
   	      $n=count($units_data);
   	      for ($i=0; $i <$n ; $i++) { 
   	      	array_push($units_id, $units_data[$i]['uid']);
   	      }
   	      foreach ($units_id as $id) {
   	      $remove_units="delete from unit where uid='$id'";
   	      Database::delete($remove_units);	
   	      }
        	$remove_subject="delete from subject where sid='$subject_id'";
        	Database::delete($remove_subject);
        }
  public function getSubjectsByInstructor($course_id,$semester,$instructor_id)
        {
        	$subject_query="select instructor_skills.sid,sname from instructor_skills,course_subject,subject where instructor_id='$instructor_id' and instructor_skills.sid=course_subject.sid and course_subject.cid='$course_id' and semester='$semester' and course_subject.sid=subject.sid";
			$result=Database::read($subject_query);
			$subject_data=$result->fetchAll(PDO::FETCH_ASSOC);
		    return $subject_data;
        }
	
}


 ?>