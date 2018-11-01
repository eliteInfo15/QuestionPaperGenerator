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

  </style>
</head>
<body>

<?php require_once 'NavigationBar.php'; ?>

<div class="container" style="margin-top: 40px; margin-bottom: 40px;background-color: white">

<!-- Nav tabs -->
 <ul class="nav nav-tabs md-tabs nav-justified indigo" role="tablist">
     <li class="nav-item">
         <a class="nav-link active" data-toggle="tab" href="#panel5" role="tab"><i class="fa fa-eye"></i> View Courses</a>
     </li> 
     <li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#panel6" role="tab"><i class="fa fa-pencil"></i> Add Course</a>
     </li>
    
 </ul>
 <!-- Tab panels -->
 <div class="tab-content">
     <!--Panel 1-->
     <div class="tab-pane fade in show active" id="panel5" role="tabpanel">
         <br>
           <table class="table">

    <!--Table head-->
    <thead style="background: #0D47A1" align="center">
        <tr class="text-white">
            <th>Id</th>
            <th>Course name</th>
            <th>Course Duration (Semesters)</th>
            <th>Options</th>
        </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
      <?php $course=new CourseController();
         $row=$course->getAllCourses();
              foreach ($row as $course_data) {
                ?>
                <tr class="text-center">
                  <td><?php echo $course_data['cid']; ?></td>
                  <td><?php echo $course_data['cname']; ?></td>
                  <td><?php echo $course_data['cduration']; ?></td>
                  <td><a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#centralModalDanger" onclick="remove_course_modal('Remove','<?php echo $course_data['cid'];?>')" >Remove</a></td>
                </tr>
                <?php
              }

       ?>
    </tbody>
    <!--Table body-->

</table>
     </div>
     <!--/.Panel 1-->
     <!--Panel 2-->
     <div class="tab-pane fade" id="panel6" role="tabpanel">
         <br>
         <div class="row">
         	<div class="col-lg-8" style="margin: 10px auto">
         		<!-- Form -->
    <form class="" style="color: #3F51B5;" id="loginform" method="post" action="../Controller/CourseController.php">
    	
      <div class="row">
        <div class="col-lg-6">
          <div class="md-form">
         
         <i class="fa fa-book prefix"></i>
        <input type="text" id="materialLoginFormEmail" class="form-control" name="course_name" >
        <label for="materialLoginFormEmail">Course Name</label>
   
      </div>
        </div>
        <div class="col-lg-6">
          <div class="md-form">
         
         <i class="fa fa-calendar prefix"></i>
        <input type="text" id="course_duration" class="form-control" name="course_duration" >
        <label for="course_duration">Duration (semesters)</label>
       
  </div>
        </div>
       
      </div>
      <!-- Email -->
      

      
  
     
<div class="md-form  col-lg-3 offset-md-4">
	 
      <input type="submit" name="add-course" value="Add Course" class="btn_login waves-effect">
</div>
   </form>
         	</div>
         </div>
     </div>
     <!--/.Panel 2-->
     
 </div>	

</div> 
<!-- Central Modal Medium Danger -->
  <div class="modal fade" id="centralModalDanger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-danger" role="document">
      <!--Content-->
      <div class="modal-content">
          <!--Header-->
          <div class="modal-header">
              <p class="heading lead">Confirmation</p>
  
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="white-text">&times;</span>
              </button>
          </div>
  
          <!--Body-->
          <div class="modal-body">
              <div class="text-center">
                <h4 id="heading"></h4>
                 
              </div>
          </div>
  
          <!--Footer-->
          <div class="modal-footer justify-content-center">
            <form method="post" id="deleteForm" action="../Controller/CourseController.php">
              <div class="md-form">
                 <input type="text" name="remove_course_id" id="modal-input-delete" style="display: none;" >
              </div>
             
             <div class="md-form">
               <button type="submit" name="delete-course" class="btn btn-danger">Remove <i class="fa fa-times ml-1"></i></button>
             </div>
                
              
              

            </form>
            
          
          </div>
      </div>
      <!--/.Content-->
  </div>
  </div>
  <!-- Central Modal Medium Danger-->
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
    function remove_course_modal(param1 ,param2)
{
  document.getElementById('modal-input-delete').value = param2;
  ;
  document.getElementById('heading').innerHTML = "Really want to remove?";
  ;
  document.getElementById('modal-tablesLabel_question').innerHTML = param1.replace("_"," ");
}
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $( "#loginform" ).validate( {
        rules: {
          
          course_name: {
            required: true
          },
          course_duration: {
            required: true
          }        
        },
        messages: {
          
          course_name: {
            required: "Course name is required"
          },
          course_duration: {
            required: "Course duration is required"
          }
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
</body>
</html>