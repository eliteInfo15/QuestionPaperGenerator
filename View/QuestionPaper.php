<?php 
require '../Controller/CourseController.php';
require '../Controller/SubjectController.php';
$cid=$_GET["cid"];
$sid=$_GET["sid"];
$exam_date=$_GET["exam_date"];
$date=date_create($exam_date);
$date_of_exam=date_format($date,"d M,Y");

$course=new CourseController();
$course_data=$course->getCourseById($cid);
$course_name=$course_data['cname'];
$subject=new SubjectController();
$subject_data=$subject->getSubjectById($sid);
$subject_name=$subject_data['sname'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		@page { size: auto;  margin: 40px 30px 40px 60px; }
		#underline{text-decoration: underline;}
		#head_section{text-align: center;}
		span{float: right; 	}
		pre{font-size: 20px}
		*{font-family: arial}
	</style>
</head>
<body>
		<div id="head_section">
	<p>(NO MOBILE)</p>
	<p id="underline">YOUR ATTENTION DRAWN TO SECTION 5, PARA 19 OF TRG STANDING ORDER JAN 2011</p>

	<p id="underline">NO UNFAIR MEANS WILL BE USED DURING THE EXAM</p>

	<h3 id="underline">MILITARY COLLEGE OF TELECOMMUNICATION ENGINEERING FACULTY OF COMMUNICATION ENGINEERING</h3>

	<h3 id="underline">PHASE TEST</h3>

	<h3 id="underline">SUBJECT: <?php echo ucfirst($subject_name); ?></h3>

	<h3 id="underline">COURSE: <?php echo $course_name; ?></h3>

<h3>Date: <?php echo $date_of_exam; ?>_____________Time: 90min_____________Max Marks 25</h3>
</div>
	<div id="paper">
		
	</div>
<pre id="para"></pre>
<script type="text/javascript">
	function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
</script>
<script type="text/javascript">
	var questions = JSON.parse(localStorage.getItem('questions_object'));
	console.log(questions);
	var paper= document.getElementById('paper');
	question_num=1;
	n=0;

	for (var i = 0; i < questions.length; i++) {
		var ch=97;
		  if (i==0) {
		  	p=document.createElement('h2');
		  	p.innerHTML="Q"+question_num+" Choose the correct answer";
		  	paper.appendChild(p);
		  }
		 else if (i==1) {
		  	p=document.createElement('h2');
		  	p.innerHTML="Q"+question_num+" Fill in the blanks ";
		  	paper.appendChild(p);
		  }
		  else if (i==2) {
		  	p=document.createElement('h2');
		  	p.innerHTML="Q"+question_num+" Short Questions ";
		  	paper.appendChild(p);
		  }
          
		for (var j = 0; j< questions[i].length; j++) {
			
			for (var k = 0; k< questions[i][j].length; k++) {
				

				pre=document.createElement("pre");
                   
			    var qvalue=questions[i][j][k].value;
			    var question_value=capitalizeFirstLetter(qvalue);
                  if (i>=3) {
                  	 seq1=String.fromCharCode(num);
                    pre.innerHTML="("+seq1+") "+question_value;
                  }
                  else{
                  	 seq2=String.fromCharCode(ch);
                  	pre.innerHTML="("+seq2+") "+question_value;
                  }
			 
             
			 paper.appendChild(pre);
			 ch++;
			 var num=ch;
       
		}
		}
		question_num++;
	}
	
	
</script>

</body>
</html>