<?php 

session_start();
   if (isset($_SESSION["usernameSession"]) && isset($_SESSION["roleSession"])) 
   {

}
else{
	header('location:Login.php');
}
require '../Controller/CourseController.php';
$user=$_SESSION["roleSession"];
$instructor_id='';
if ($user=='instructor') {
  $instructor_id=$_SESSION["usernameSession"];
}


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
i{
  color: #3f51b5 !important;
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
  display: block;
  padding-left: 35px;
    color: red;
    font-family: Arial ;
    font-style: normal;
}
.login_error{
  color: red;
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

<?php require 'NavigationBar.php'; ?>
<div class="container" style="margin-top: 40px; margin-bottom: 40px;background-color: white">

<!-- Nav tabs -->

 <!-- Tab panels -->
 <div class="">
     <!--Panel 1-->
     
     <!--/.Panel 1-->
     <!--Panel 2-->
     <div class="" >
         <br>
         <div class="row">
         	<div class="col-lg-10" style="margin: 10px auto">
         		<!-- Form -->
    <form class="" style="color: #3F51B5;" id="addquestionform" method="post" >
    	
      <div class="row">
        <div class="col-lg-4">
                            <div class="md-form">
         
         <i class="fa fa-book prefix" style="position: relative;padding-right: 10px"></i>
        <select id="course_select_box" data-selected="" style="display: inline !important;padding-right: 24px;padding-left: 20px;" name="course_select_box">
  
  <option value="" selected disabled>Course</option>
  <?php 

  if ($user=="instructor") {
     $course=new CourseController();
         $courses_data=$course->getCoursesByInstructor($instructor_id);
    
         $unique_cnames = array_unique(array_map(function($elem){return $elem['cname'];}, $courses_data));
         $unique_cids = array_unique(array_map(function($elem){return $elem['cid'];}, $courses_data));

         for($i=0;$i<count($unique_cnames);$i++) {
          ?>
     <option value="<?php echo $unique_cids[$i] ?>"><?php echo $unique_cnames[$i]; ?></option>
          <?php
         }
  }
  else{
    $course=new CourseController();
         $row=$course->getAllCourses();
         foreach ($row as $course_data) {
                ?>
                
                  <option value="<?php echo $course_data['cid']; ?>"><?php echo $course_data['cname']; ?></option>>
                 
                  
             
                <?php
              }
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
     <div class="row" style="margin: 2px auto;">
        <div class="col-lg-4">
          <div class="md-form">
         
         <i class="fa fa-book prefix" style="position: relative;padding-right: 10px"></i>
        <select id="unit_select" data-selected="" style="display: inline !important;padding-right: 24px;padding-left: 20px;" name="unit_field">
 <option value="" selected disabled>Unit</option>
  
</select>
 <label for="unit_select" style="top: -20px;color: #1E88E5;font-size: 0.8rem;">Select Unit</label>
  </div>
        </div>
        
        <div class="col-lg-4">
          <div class="md-form">
         
         <i class="fa fa-signal prefix" style="position: relative;padding-right: 10px"></i>
        <select id="level_select" data-selected="" style="display: inline !important;padding-right: 24px;padding-left: 20px;" name="level_field">
 <option value="" selected disabled>Level</option>
  <option value="low" >Low</option>
  <option value="medium" >Medium</option>
  <option value="high" >High</option>
</select>
 <label for="level_select" style="top: -20px;color: #1E88E5;font-size: 0.8rem;">Select Level</label>
  </div>
        </div>
        <div class="col-lg-4">
         <div class="md-form">
         
         <i class="fa fa-book prefix" style="position: relative;padding-right: 10px"></i>
        <select id="category_select" data-selected="" style="display: inline !important;padding-right: 24px;padding-left: 20px;" name="category_field">
 <option value="" selected disabled>Category</option>
  <option value="1" >Objective</option>
  <option value="2" >Fill in blanks</option>
  <option value="3" >Subjective 2 marks</option>
  <option value="4" >Subjective 3 marks</option>
</select>
 <label for="level_select" style="top: -20px;color: #1E88E5;font-size: 0.8rem;">Select Category</label>
  </div>
       </div>
      </div> 

     
  <div class="row" >
  <div class="col-lg-8">
    
  
        <div class="md-form">
          
    <textarea type="text"  class="md-textarea form-control" rows="3" cols="20" name="question_value" id="question_value"></textarea>
    <label for="question_value">Type Question Here</label>
</div>
      </div>
    </div> 
<div class="md-form  col-lg-3 offset-md-4">
	 
      <input type="submit" name="addquestion" value="Add Question" class="btn_login waves-effect">
</div>
   </form>
         	</div>
         </div>
     </div>
     <!--/.Panel 2-->
     
 </div>	

</div> 

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  
  </script>
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
         $( "#viewunitform" ).validate( {
        rules: {
          
          course_select_box: {
            required: true
          },
          semester_select_box: {
            required: true
          },
          subject_select_box:{
            required: true
          }

        },
        messages: {
          
          course_select_box: {
            required: "Course is required"
          },
          semester_select_box: {
            required: "Semester is required"
          },
          subject_select_box: {
            required: "Subject is required"
          }
        },
         

     submitHandler: function(form) {
   var course_id=$('#course_select_box').val();
   var semester=$('#semester_select_box').val();
   var subject=$('#subject_select_box').val();
   
  
    
   var datastring="course_id="+course_id+"&semester="+semester+"&subject_id="+subject+"&viewunit="+"yes";

     $.ajax({
      type:"POST",
      url:"../Controller/UnitController.php",
      data:datastring,
      success:function(result){
        
        var obj=JSON.parse(result);
            var container = document.getElementById("subject_container");
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }

            for (var i = 0; i <obj.length; i++) {
                var div_container = document.createElement("div");
                div_container.classList.add("md-form");
                div_container.style.margin="10px auto";
                while (div_container.hasChildNodes()) {
                div_container.removeChild(div_container.lastChild);
            }
               // div_container.class="md-form";
                 container.appendChild(div_container);
                 var icon = document.createElement("i"); 
                 icon.classList.add("fa");
                 icon.className+=" fa-book prefix";
                 div_container.appendChild(icon);
                var input = document.createElement("input");
                 
                input.type = "text";
                input.readOnly=true;
                input.name="subject"+(i+1);
                input.id="subject"+(i+1);
                input.class="form-control"; 
                input.value=obj[i].uname;
                div_container.appendChild(input);
                

            }

      }
     });

  },

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
     

      $( "#addquestionform" ).validate( {
        rules: {
          
          course_select_box: {
            required: true
          },
          semester_select_box: {
            required: true
          } ,
         unit_field:{
           required: true
         },
           subject_select_box:{
            required: true
          },
          level_field:{
            required: true
          },
          category_field:{
            required: true
          },
          question_marks:{
            required:true
          },
          question_value:{
            required:true
          }

        },
        messages: {
          
          course_select_box: {
            required: "Course is required"
          },
          semester_select_box: {
            required: "Semester is required"
          },
          subject_select_box: {
            required: "Subject is required"
          },
          unit_field:{
            required: "Unit is required"
          },
          level_field:{
            required: "Level is required"
          },
          category_field:{
            required: "Category is required"
          },
          question_marks:{
            required: "Marks are required"
          },
          question_value:{
            required:"Question is required"
          }
        },
          submitHandler: function(form) {
          
          var unit_id=$("#unit_select").val();
          var level=$("#level_select").val();
          var category=$("#category_select").val();
          
          var question_value=$("#question_value").val();
          var subject_id=$("#subject_select_box").val();
          var datastring="unit_id="+unit_id+"&level="+level+"&category="+category+"&value="+question_value+"&subject_id="+subject_id+"&addquestion="+"yes";
 
    
      
     $.ajax({
      type:"POST",
      url:"../Controller/QuestionController.php",
      data:datastring,
      success:function(result){
        
        //alert(result);
toastr.info('Question added!');
        document.getElementById("addquestionform").reset(); 

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
       $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
   </script>
   <script type="text/javascript">
     function addFields(){
            var number = document.getElementById("no_of_unit").value;
            var container = document.getElementById("container");
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                //container.appendChild(document.createTextNode("Member " + (i+1)));
                var div_container = document.createElement("div");
                div_container.classList.add("md-form");
                div_container.style.marginRight="10px";
                while (div_container.hasChildNodes()) {
                div_container.removeChild(div_container.lastChild);
            }
               // div_container.class="md-form";
                 container.appendChild(div_container);
                 var icon = document.createElement("i"); 
                 icon.classList.add("fa");
                 icon.className+=" fa-book prefix";
                 div_container.appendChild(icon);
                var input = document.createElement("input");
                 
                input.type = "text";
                input.required="";
                input.name="unit"+(i+1);
                input.id="unit"+(i+1);
                input.class="form-control"; 
                div_container.appendChild(input);
                var label = document.createElement("label");
                 label.htmlFor="unit"+(i+1);
                 label.innerHTML="Unit ";
                 label.style.top="0px";
                 div_container.appendChild(label);
                //container.appendChild(document.createElement("br"));
                
            }
        }
   </script>
   <script type="text/javascript">
     $(document).ready(function(){
         $('#semester_select').change(function(){
          $("#subject_select").find('option').not(':first').remove();
               
                $("#unit_select").find('option').not(':first').remove();
                var semester = $(this).val();
                var course_id = $('#selectbox1').val();
                var datastring="course_id="+course_id+"&semester="+semester+"&viewsubject="+"yes";
                  $.ajax({
      type:"POST",
      url:"../Controller/SubjectController.php",
      data:datastring,
      success:function(result){
      
        var obj=JSON.parse(result);
       var end= $('#subject_select')
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
   <script type="text/javascript">
     $(document).ready(function(){
         $('#subject_select_box').change(function(){

               
                $("#unit_select").find('option').not(':first').remove();
                var subject_id = $(this).val();
              
                var datastring="subject_id="+subject_id+"&viewunit="+"yes";
                  $.ajax({
      type:"POST",
      url:"../Controller/UnitController.php",
      data:datastring,
      success:function(result){
     
        var obj=JSON.parse(result);
       var end= $('#unit_select')
    .find('option')
    .remove()
    .end();
    end.append('<option value="" selected disabled>Unit</option>');
        for (var i = 0; i < obj.length; i++) {
            
    end.append('<option value="'+obj[i].uid+'">'+obj[i].uname+'</option>');
    

        }
          
      }
     });
         });
     });
   </script>
      <script type="text/javascript">
     $(document).ready(function(){
         $('#selectbox1').change(function(){
      
             $("#subject_select").find('option').not(':first').remove();
               $("#semester_select").find('option').not(':first').remove();
                $("#unit_select").find('option').not(':first').remove();
                var course_id = $(this).val();
                var datastring="course_id="+course_id+"&get_sem=sem";
                  $.ajax({
      type:"POST",
      url:"../Controller/CourseController.php",
      data:datastring,
      success:function(result){
        
        var obj=JSON.parse(result);
       var end= $('#semester_select')
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
         $('#course_select_box').change(function(){
          //alert('hi');
         var user='<?php echo $user ?>';
         var instructor_id='<?php echo $instructor_id ?>'
          $("#subject_select_box").find('option').not(':first').remove();
          $("#semester_select_box").find('option').not(':first').remove();
          $("#unit_select").find('option').not(':first').remove();
                var course_id = $(this).val();
         if (user=='instructor') {
            var datastring="course_id="+course_id+"&get_sem_by_instructor=sem"+"&instructor_id="+instructor_id;
                  $.ajax({
      type:"POST",
      url:"../Controller/CourseController.php",
      data:datastring,
      success:function(result){
        //alert(result);
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
         }
         else{
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
         }



          
      
         });
     });
   </script>

   <script type="text/javascript">
     $(document).ready(function(){
         $('#semester_select_box').change(function(){
                var semester = $(this).val();
                var course_id = $('#course_select_box').val();
                 var user='<?php echo $user ?>';
         var instructor_id='<?php echo $instructor_id ?>';

         if (user=='instructor') {
            var datastring="course_id="+course_id+"&semester="+semester+"&viewsubjectbyinstructor="+"yes"+"&instructor_id="+instructor_id;
                  $.ajax({
      type:"POST",
      url:"../Controller/SubjectController.php",
      data:datastring,
      success:function(result){
      //alert(result);
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
         }
          else {
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
          }



        
         });
     });
   </script>

</body>
</html>