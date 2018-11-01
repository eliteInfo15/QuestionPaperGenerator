<?php 
require_once '../Model/QuestionPaperModel.php';

class QuestionPaperController{
	public function generateQuestions($subject_id,$test)
	{
		$model=new QuestionPaperModel();
         $questions = array();
		if ($test==1) {
			$model->setMaxMarks(25);
			$model->setDuration(90);
			$objective_questions=$model->generateRandomQuestions($subject_id,$test,1,6);
			array_push($questions, $objective_questions);

			$fill_in_blank_questions=$model->generateRandomQuestions($subject_id,$test,2,4);
			array_push($questions, $fill_in_blank_questions);
            
			$subjective_2marks_questions=$model->generateRandomQuestions($subject_id,$test,3,6);
			array_push($questions, $subjective_2marks_questions);

			$subjective_3marks_questions=$model->generateRandomQuestions($subject_id,$test,4,1);
			array_push($questions, $subjective_3marks_questions);

		}
		else{

		}
		return $questions;
	}
}


if (isset($_POST["generatequestion"])) {
	$course_id=$_POST["course_id"];
	$exam_date=$_POST["exam_date"];
	$subject_id=$_POST["subject_id"];
	$test=$_POST["test"];
	$controller=new QuestionPaperController();
	$questions=$controller->generateQuestions($subject_id,$test);
//9890116335
	
	echo json_encode($questions);
	//echo json_encode($arr);
}

 ?>