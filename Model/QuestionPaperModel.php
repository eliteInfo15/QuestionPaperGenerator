<?php 
require_once 'Database.php';
class QuestionPaperModel{
	private $max_marks;
	private $duration;
	private $instructions;

	public function __construct()
	{
		Database::connectDb();
	}
	public function setMaxMarks($max_marks)
	{
		$this->max_marks=$max_marks;
	}
	public function setDuration($duration)
	{
		$this->duration=$duration;
	}
	public function generateRandomQuestions($subject_id,$test,$category,$no_of_question)
	{
		$questions = array();
		$no_of_high_level=round($no_of_question*0.6);
		$no_of_low_level=round($no_of_question*0.2);
		$no_of_medium_level=round($no_of_question*0.2);
         $sum=$no_of_high_level+$no_of_medium_level+$no_of_low_level;

		if ($no_of_question!=$sum) {
         $value=$no_of_question-$sum;
         $no_of_medium_level+=$value;
	      }
		
		$get_high_level_questions="SELECT sid,uid,value,marks,level FROM subject_unit_questions,question WHERE sid='$subject_id' AND subject_unit_questions.qid=question.qid AND category='$category' AND level='high' ORDER BY RAND() LIMIT $no_of_high_level";
	$data=Database::read($get_high_level_questions);
	$random_high_questions=$data->fetchAll(PDO::FETCH_ASSOC);
    array_push($questions, $random_high_questions);

	$get_low_level_questions="SELECT sid,uid,value,marks,level FROM subject_unit_questions,question WHERE sid='$subject_id' AND subject_unit_questions.qid=question.qid AND category='$category' AND level='low' ORDER BY RAND() LIMIT $no_of_low_level";
	$data=Database::read($get_low_level_questions);
	$random_low_questions=$data->fetchAll(PDO::FETCH_ASSOC);
	array_push($questions, $random_low_questions);

	$get_medium_level_questions="SELECT sid,uid,value,marks,level FROM subject_unit_questions,question WHERE sid='$subject_id' AND subject_unit_questions.qid=question.qid AND category='$category' AND level='medium' ORDER BY RAND() LIMIT $no_of_medium_level";
	$data=Database::read($get_medium_level_questions);
	$random_medium_questions=$data->fetchAll(PDO::FETCH_ASSOC);
	array_push($questions, $random_medium_questions);
		return $questions;
	}
}

 ?>