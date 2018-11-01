<?php 

require 'Database.php';
Database::connectDb(); 
$get_last_inserted_question="select max(qid) from question";
$last_inserted_question_result=Database::read($get_last_inserted_question);
$data=$last_inserted_question_result->fetchAll(PDO::FETCH_ASSOC);
var_dump($data[0]['max(qid)']);

 ?>