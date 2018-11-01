<?php 
require 'Database.php';;
class QuestionModel{
private $value;
private $marks;
private $level;
private $category;
public function __construct()
    {
        Database::connectDb();	
    }
public function setValue($value)
{
   $this->value=$value;
}
public function setMarks($marks)
{
	$this->marks=$marks;
}
public function setLevel($level)
{
   $this->level=$level;
}
public function setCategory($category)
{
   $this->category=$category;
}
public function addQuestion($subject_id,$unit_id)
{
	
	$add_question_query="insert into question(value,marks,level,category) values('$this->value','$this->marks','$this->level','$this->category')";
	$result=Database::insert($add_question_query);
	$get_last_inserted_question="select max(qid) from question";
$last_inserted_question_result=Database::read($get_last_inserted_question);
$data=$last_inserted_question_result->fetchAll(PDO::FETCH_ASSOC);
$qid=$data[0]['max(qid)'];
	$add_subject_question_query="insert into subject_unit_questions values('$subject_id','$unit_id','$qid')";
	$result1=Database::insert($add_subject_question_query);

	return $add_question_query;
}

}



 ?>