<?php 
require '../Model/QuestionModel.php';
class QuestionController{
	public function addQuestion($value,$category,$marks,$level,$subject_id,$unit_id)
	{
		$question_model=new QuestionModel();
		$question_model->setValue($value);
		$question_model->setMarks($marks);
		$question_model->setCategory($category);
		$question_model->setLevel($level);
		$result=$question_model->addQuestion($subject_id,$unit_id);
		return $result;
	}

}
if (isset($_POST["addquestion"])) {
	$unit_id=$_POST["unit_id"];
	$subject_id=$_POST["subject_id"];
	$value=$_POST["value"];
	$category=$_POST["category"];
    $marks=0;
    if ($category==1) {
    	$marks=1;
    }
    else if($category==2){
        $marks=1;
    }
    else if($category==3){
         $marks=2;
    }
    else if($category==4){
        $marks=3;
    }
	$level=$_POST["level"];
	$question_controller=new QuestionController();
	$result=$question_controller->addQuestion($value,$category,$marks,$level,$subject_id,$unit_id);
    echo $result;
}
 ?>