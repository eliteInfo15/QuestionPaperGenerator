<?php 
require 'Database.php';
class UnitModel{
private $unit_name;
public function __construct()
    {
        Database::connectDb();	
    }
    public function setUnitName($unit_name)
    {
    	$this->unit_name=$unit_name;
    }
    public function getUnitFromDb($subject_id)
    {
    	$unit_query="select uname, unumber, unit.uid from unit,subject_unit where sid=$subject_id and unit.uid=subject_unit.uid ";
			$result=Database::read($unit_query);
			$unit_data=$result->fetchAll(PDO::FETCH_ASSOC);
		    return $unit_data;
    }
    public function addUnitToDb($course_id,$semester,$subject_id)
    {
    	$no_of_units=count($this->unit_name);

		for ($i=0; $i <$no_of_units ; $i++) {
		$uname=$this->unit_name[$i]; 
		$unumber=$i+1;
	     $insert_into_unit="insert into unit(uname,unumber) values('$uname','$unumber');";
         Database::insert($insert_into_unit);
         }
         $get_last_inserted_units="select uid from unit order by uid desc limit $no_of_units;";

		$result=Database::read($get_last_inserted_units);
        $data=$result->fetchAll(PDO::FETCH_ASSOC);
          
          for ($i=0; $i <$no_of_units ; $i++) { 
          	$uid_array=$data[$i];
          	$uid=$uid_array['uid'];
	     $insert_into_subject_unit="insert into subject_unit values('$subject_id','$uid');";
         Database::insert($insert_into_subject_unit);
		}
    
}
public function getQuestionsByUnit($unit_id)
{
  $get_question_query="select qid from subject_unit_questions where uid=$unit_id";

    $result=Database::read($get_question_query);
    $questions_data=$result->fetchAll(PDO::FETCH_ASSOC);
    return $questions_data;
}
public function removeUnit($unit_id)
{
   $questions_data=$this->getQuestionsByUnit($unit_id);
   $questions_id=array();
          $n=count($questions_data);
          for ($i=0; $i <$n ; $i++) { 
            array_push($questions_id, $questions_data[$i]['qid']);
          }
          foreach ($questions_id as $id) {
          $remove_questions="delete from question where qid='$id'";
          Database::delete($remove_questions);  
          }
          $remove_unit="delete from unit where uid='$unit_id'";
          Database::delete($remove_unit);
}

}
 ?>