<?php 

session_start();
   if (isset($_SESSION["usernameSession"]) && isset($_SESSION["roleSession"])) {
  
       if ($_SESSION["roleSession"]!="admin") {
          header('location:Login.php');
       }

}
else{
  header('location:Login.php');
}

require '../Controller/CourseController.php';



 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Question Paper Generator</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) 
  
  <link rel="stylesheet" type="text/css" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled-4.5.11.min.css?ver=4.5.11">-->
  <style type="text/css">
    #btn{
      border-radius: 30px;
    }
    .separation{
  margin-left: 70px !important;
}
.btn_login{
    padding: 6px 40px;
    background: #;
    background: #3f51b5;
    border: 0;
    color: white;
    box-shadow: 1px 3px 13px #3f51b5;
    cursor: pointer;
}
.side-align{
      position: relative;
    top: -34px;
    float: right;
}
.hand_cursor{
  cursor: pointer !important;
}
em{
  padding-left: 38px;
    color: red;
    font-family: Arial ;
    font-style: normal;
}
.login_error{
  color: red;
}
.gender-container{
 // display: block;
  margin: 2px;
}
select {
  margin-bottom: 1em;
    padding-left: 1em;
    border: 0;
    border-bottom: 1px solid #ced4da;
   // font-family: segoe ui light;
    border-radius: 0;
    outline-color: white;
    color: #757575;
}
  </style>
</head>
<body>

<?php require_once 'NavigationBar.php'; ?>

<div class="container" style="margin-top: 40px; margin-bottom: 40px;background-color: white">

<!-- Nav tabs -->

 <!-- Tab panels -->
 <div class="container">
     
     <!--Panel 2-->
     <div >
         <br>
         <div class="row">
          <div class="col-lg-8" style="margin: 10px auto">
            <!-- Form -->
            <form class="" style="color: #3F51B5;" id="addquestionform" method="post" >
      
      <div class="row">
        <div class="col-lg-4">
                            <div class="md-form">
         
         <i class="fa fa-book prefix" style="position: relative;padding-right: 10px"></i>
        <select id="course_select_box" data-selected="" style="display: inline !important;padding-right: 24px;padding-left: 20px;" name="course_select_box">
  
  <option value="" selected disabled>Course</option>
  <?php 

  
  
    $course=new CourseController();
         $row=$course->getAllCourses();
         foreach ($row as $course_data) {
                ?>
                
                  <option value="<?php echo $course_data['cid']; ?>"><?php echo $course_data['cname']; ?></option>>
                 
                  
             
                <?php
              }
  

   ?>
  
</select>
   <label for="course_select_box" style="top: -20px;color: #1E88E5;font-size: 0.8rem;">Select Course</label>
      </div>
        </div>
        <div class="col-lg-4">
          <div class="md-form">
         
         <i class="fa fa-book prefix" style="position: relative;padding-right: 10px"></i>
        <select id="semester_select_box" data-selected="" style="display: inline !important;padding-right: 24px;padding-left: 20px;" name="semester_select_box" >
 <option value="" selected disabled>Semester</option>
  
</select>
 <label for="semester_select_box" style="top: -20px;color: #1E88E5;font-size: 0.8rem;">Select Semester</label>
  </div>
        </div>
         <div class="col-lg-4">
          <div class="md-form">
         
         <i class="fa fa-book prefix" style="position: relative;padding-right: 10px"></i>
        <select id="subject_select_box" data-selected="" style="display: inline !important;padding-right: 24px;padding-left: 20px;" name="subject_select_box">
 <option value="" selected disabled>Subject</option>
  
</select>
 <label for="subject_select_box" style="top: -20px;color: #1E88E5;font-size: 0.8rem;">Select Subject</label>
  </div>
        </div>
       
      </div>
      <!-- Email -->
    

     <div class="row">
       <div class="col-lg-4">
           <div class="md-form">
         
         <i class="fa fa-book prefix" style="position: relative;padding-right: 10px"></i>
        <select id="test_select_box" data-selected="" style="display: inline !important;padding-right: 24px;padding-left: 20px;" name="test_select_box">
 <option value="" selected disabled>Test type</option>
  <option value="1">Phase test</option>
  <option value="2" >Final test</option>
  
</select>
 <label for="test_select_box" style="top: -20px;color: #1E88E5;font-size: 0.8rem;">Select Test</label>
  </div>
       </div>
       <div class="col-lg-4">
          <div class="md-form">
         
         <i class="fa fa-calendar prefix"></i>
        <input type="date" class="form-control" name="exam_date" id="exam_date" value="">
        <label for="exam_date" style="margin-top: -24px">Exam Date</label>
       
  </div>
       </div>
     </div>
  
<div class="md-form  col-lg-3 offset-md-4">
   
      <input type="submit" name="generatequestion" value="Generate Questions" class="btn_login waves-effect">
</div>
   </form>
          </div>
         </div>
     </div>
     <!--/.Panel 2-->
     
 </div> 

</div> 
<div class="container">
  <div id="questions">
  
</div>
</div>






<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript" src="js/compiled.min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
     

      $( "#addquestionform" ).validate( {
        rules: {
          
          course_select_box: {
            required: true
          },
          semester_select_box: {
            required: true
          } ,
         unit_select:{
           required: true
         },
           subject_select_box:{
            required: true
          },
          test_select_box:{
            required:true
          },
          exam_date:{
            required:true
          }

        },
        messages: {
          
          course_select_box: {
            required: "Course is required"
          },
          exam_date:{
           required:"Exam date is required"
          },
          semester_select_box: {
            required: "Semester is required"
          },
          subject_select_box: {
            required: "Subject is required"
          },
          unit_select:{
            required: "Unit is required"
          },
          test_select_box:{
            required:"Test is required"
          }
        },
          submitHandler: function(form) {
          
          var course_id=$("#course_select_box").val();
          var semester=$("#semester_select_box").val();
          var test=$("#test_select_box").val();
          var subject_id=$("#subject_select_box").val();
          var exam_date=$("#exam_date").val();
          var datastring="course_id="+course_id+"&exam_date="+exam_date+"&semester="+semester+"&test="+test+"&subject_id="+subject_id+"&generatequestion="+"yes";
 
    
      
     $.ajax({
      type:"POST",
      url:"../Controller/QuestionPaperController.php",
      data:datastring,
      success:function(result){
        
        //var questions=JSON.parse(result);
        localStorage.setItem('questions_object',result);
        window.open(
  'QuestionPaper.php?cid='+course_id+'&sid='+subject_id+'&exam_date='+exam_date,
  '_blank' // <- This is what makes it open in a new window.
);
        //location.href=;
//toastr.info('Question added!');
        //document.getElementById("questions").innerHTML=questions[0][0]; 

      }
     });

  },
        /*submitHandler:function(form){
          var unit_id=$("#unit_select").val();
          var level=$("#level_select").val();
          var question_marks=$("#question_marks").val();
          var question_value=$("#question_value").val();
          var datastring="unit_id="+unit_id+"&level="+level+"&marks="+marks+"&value="+question_value+"&addquestion="+"yes";
          alert(datastring);
             $.ajax({
      type:"POST",
      url:"../Controller/QuestionController.php",
      data:datastring,
      success:function(result){
               alert(result);
                

            }

      });
     }*/
        
        errorElement: "em",
        errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );
          
          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
      } );
    });
  </script>
   <script type="text/javascript">
     $(document).ready(function(){
         $('#course_select_box').change(function(){
          //alert('hi');
         
          $("#subject_select_box").find('option').not(':first').remove();
          $("#semester_select_box").find('option').not(':first').remove();
          $("#unit_select").find('option').not(':first').remove();
                var course_id = $(this).val();
         
        
                      var datastring="course_id="+course_id+"&get_sem=sem";
                  $.ajax({
      type:"POST",
      url:"../Controller/CourseController.php",
      data:datastring,
      success:function(result){
        
        var obj=JSON.parse(result);
       var end= $('#semester_select_box')
    .find('option')
    .remove()
    .end();
   end.append('<option value="" selected disabled>Semester</option>');
        for (var i = 0; i < obj.length; i++) {
            
    end.append('<option value="'+obj[i].semester+'">'+obj[i].semester+'</option>');
    

        }
          
      }
     });
         



          
      
         });
     });
   </script>

   <script type="text/javascript">
     $(document).ready(function(){
         $('#semester_select_box').change(function(){
                var semester = $(this).val();
                var course_id = $('#course_select_box').val();
                
         
          
                    var datastring="course_id="+course_id+"&semester="+semester+"&viewsubject="+"yes";
                  $.ajax({
      type:"POST",
      url:"../Controller/SubjectController.php",
      data:datastring,
      success:function(result){
      
        var obj=JSON.parse(result);
       var end= $('#subject_select_box')
    .find('option')
    .remove()
    .end();
    end.append('<option value="" selected disabled>Subject</option>');
        for (var i = 0; i < obj.length; i++) {
            
    end.append('<option value="'+obj[i].sid+'">'+obj[i].sname+'</option>');
    

        }
          
      }
     });
          



        
         });
     });
   </script>
</body>
</html>