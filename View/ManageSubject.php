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
    .modal-open {
    padding-right: 0px !important;
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
.test[style] {
    padding-right:0 !important;
}
.test.modal-open {
    overflow: auto;
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
<body style="padding-right: 0px">

<?php require_once 'NavigationBar.php'; ?>


<div class="container" style="margin-top: 40px; margin-bottom: 40px;background-color: white">

<!-- Nav tabs -->
 <ul class="nav nav-tabs md-tabs nav-justified indigo" role="tablist">
     <li class="nav-item">
         <a class="nav-link active" data-toggle="tab" href="#panel5" role="tab"><i class="fa fa-eye"></i> View Subjects</a>
     </li> 
     <li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#panel6" role="tab"><i class="fa fa-pencil"></i> Add Subject</a>
     </li>
    
 </ul>
 <!-- Tab panels -->
 <div class="tab-content">
     <!--Panel 1-->
     <div class="tab-pane fade in show active" id="panel5" role="tabpanel">
         <div class="row">
           <div class="col-lg-8" style="margin: 10px auto">
            <form action="../Controller/SubjectController.php" method="post" id="viewsubjectform">
              <div class="row">
                <div class="col-lg-6">
                          <div class="md-form">
         
         <i class="fa fa-book prefix" style="position: relative;padding-right: 10px"></i>
        <select id="selectbox2" data-selected="" style="display: inline !important;padding-right: 24px;padding-left: 20px;" name="course_field1">
  
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
   <label for="selectbox2" style="top: -20px;color: #1E88E5;font-size: 0.8rem;">Select Course</label>
      </div>
                 </div>
                 <div class="col-lg-6">
                    <div class="md-form">
         
         <i class="fa fa-book prefix" style="position: relative;padding-right: 10px"></i>
        <select id="semester_select1" data-selected="" style="display: inline !important;padding-right: 24px;padding-left: 20px;" name="semester_field1" >
 <option value="" selected disabled>Semester</option>
  
</select>
 <label for="semester_select1" style="top: -20px;color: #1E88E5;font-size: 0.8rem;">Select Semester</label>
  </div>
                 </div>
               </div>
              
             </form>
           </div>
         </div>
      <div class="row" id="subject_container" style="margin: 10px auto">
      <table class="table" id="subject_table">
         <!--Table head-->
    <thead style="background: #0D47A1" align="center">
        <tr class="text-white">
            <th>Id</th>
            <th>Subject name</th>
            <th>Options</th>
        </tr>
    </thead>
    <!--Table head-->
      </table>
      </div>
     </div>
     <!--/.Panel 1-->
     <!--Panel 2-->
     <div class="tab-pane fade" id="panel6" role="tabpanel">
         <br>
         <div class="row">
         	<div class="col-lg-8" style="margin: 10px auto">
         		<!-- Form -->
    <form class="" style="color: #3F51B5;" id="addsubjectform" method="post" action="../Controller/SubjectController.php">
    	
      <div class="row">
        <div class="col-lg-4">
          <div class="md-form">
         
         <i class="fa fa-book prefix" style="position: relative;padding-right: 10px"></i>
        <select id="selectbox1" data-selected="" style="display: inline !important;padding-right: 24px;padding-left: 20px;" name="course_field">
  
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
   <label for="selectbox1" style="top: -20px;color: #1E88E5;font-size: 0.8rem;">Select Course</label>
      </div>
        </div>
        <div class="col-lg-4">
          <div class="md-form">
         
         <i class="fa fa-book prefix" style="position: relative;padding-right: 10px"></i>
        <select id="semester_select" data-selected="" style="display: inline !important;padding-right: 24px;padding-left: 20px;" name="semester_field">
 <option value="" selected disabled>Semester</option>
  
</select>
 <label for="selectbox1" style="top: -20px;color: #1E88E5;font-size: 0.8rem;">Select Semester</label>
  </div>
        </div>
       <div class="col-lg-4">
         <div class="md-form">
        <input type="text" class="form-control" name="no_of_subject" id="no_of_subject" onkeyup="addFields()">
        <label for="no_of_subject">No. of subjects</label>
      </div>
       </div>
      </div>
      <!-- Email -->
      <div class="row" id="container">
        
      </div>

      
  
     
<div class="md-form  col-lg-3 offset-md-4">
	 
      <input type="submit" name="add-subject" value="Add Subject" class="btn_login waves-effect">
</div>
   </form>
         	</div>
         </div>
     </div>
     <!--/.Panel 2-->
     
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
       $('#centralModalDanger').on('hide.bs.modal', function (e) {
      
    $('body').addClass('test');
});
    });
  
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
         $( "#viewsubjectform" ).validate( {
        rules: {
          
          course_field1: {
            required: true
          },
          semester_field1: {
            required: true
          }

        },
        messages: {
          
          course_field1: {
            required: "Course is required"
          },
          semester_field1: {
            required: "Semester is required"
          }
        },
         

     submitHandler: function(form) {
   var course_id= $('#selectbox2').val();
   var semester=$('#semester_select1').val();
   
  
 
    
   var datastring="course_id="+course_id+"&semester="+semester+"&viewsubject="+"yes";

     $.ajax({
      type:"POST",
      url:"../Controller/SubjectController.php",
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
                input.value=obj[i].sname;
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
      jQuery.validator.addMethod('SubjectRequired', function (value) {
        var n=$('#no_of_subject').val();
        var flag=1;
        for (var i = 1; i <= n; i++) {
         if($('#subject'+i).val().length==0){
          flag=0;
         }
        }
        if (flag==1) {
          return true;
        }
        return false;
        
    }, "Subject is required");

      $( "#addsubjectform" ).validate( {
        rules: {
          
          course_field: {
            required: true
          },
          semester_field: {
            required: true
          } ,
          no_of_subject:{
            required: true
          },
          subject1:{
           required:true
          },
           subject2:{
           required:true
          },
           subject3:{
           required:true
          },
           subject4:{
           required:true
          },
           subject5:{
           required:true
          },
           subject6:{
           required:true
          },
           subject7:{
           required:true
          },
           subject8:{
           required:true
          },
           subject9:{
           required:true
          },
           subject10:{
           required:true
          },
           subject11:{
           required:true
          }

        },
        messages: {
          
          course_field: {
            required: "Course is required"
          },
          semester_field: {
            required: "Semester is required"
          },
          no_of_subject:{
            required: "Please enter number"
          },
          subject1:{
           required:"Subject is required"
          },
          subject2:{
            required:"Subject is required"
          },
          subject3:{
            required:"Subject is required"
          },
          subject4:{
            required:"Subject is required"
          },
          subject5:{
            required:"Subject is required"
          },
          subject6:{
            required:"Subject is required"
          },
          subject7:{
            required:"Subject is required"
          },
          subject8:{
            required:"Subject is required"
          },
          subject9:{
            required:"Subject is required"
          },
          subject10:{
            required:"Subject is required"
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
   <script type="text/javascript">
     function addFields(){
            var number = document.getElementById("no_of_subject").value;
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
                input.name="subject"+(i+1);
                input.id="subject"+(i+1);
                input.class="form-control"; 
                div_container.appendChild(input);
                var label = document.createElement("label");
                 label.htmlFor="subject"+(i+1);
                 label.innerHTML="Subject ";
                 label.style.top="0px";
                 div_container.appendChild(label);
                //container.appendChild(document.createElement("br"));
                
            }
        }
   </script>
   <script type="text/javascript">
     $(document).ready(function(){
         $('#selectbox1').change(function(){
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
         $('#selectbox2').change(function(){
                var course_id = $(this).val();
                var datastring="course_id="+course_id+"&get_sem=sem";
                  $.ajax({
      type:"POST",
      url:"../Controller/CourseController.php",
      data:datastring,
      success:function(result){
        
        var obj=JSON.parse(result);
       var end= $('#semester_select1')
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
    function remove_subject_modal(param2)
{
  document.getElementById('modal-input-delete').value = param2;
  ;
  document.getElementById('heading').innerHTML = "Really want to remove?";
  ;
  //document.getElementById('modal-tablesLabel_question').innerHTML = param1.replace("_"," ");
}
  </script>
   <script type="text/javascript">
     $(document).ready(function(){
      $(document).on('click', 'a', function () {
    remove_subject_modal(this.id)
});
         $('#semester_select1').change(function(){
            var table=document.getElementById('subject_table'); 
           var tbody= table.getElementsByTagName("tbody")[0];
           if (tbody!=null) {
             table.removeChild(tbody);
           }
 
                  var course_id=$('#selectbox2').val();
                  var semester=$(this).val();
                 var datastring="course_id="+course_id+"&semester="+semester+"&viewsubject="+"yes";

     $.ajax({
      type:"POST",
      url:"../Controller/SubjectController.php",
      data:datastring,
      success:function(result){

        var obj=JSON.parse(result);
            
           
           var tbody=document.createElement('tbody');
           table.appendChild(tbody);
            for (var i = 0; i < obj.length; i++) {
              var sid=obj[i].sid;
              var sname=obj[i].sname;
              var row = tbody.insertRow(i);
              row.classList.add("text-center");
               var cell_id = row.insertCell(0);
                   cell_id.innerHTML=sid;
               var cell_sname = row.insertCell(1);
                   cell_sname.innerHTML=sname;
               var cell_option = row.insertCell(2);
                   
                   var anchor_tag=document.createElement("a");
                   anchor_tag.setAttribute('href',"#");
                  
                   anchor_tag.setAttribute('class','btn btn-md btn-danger');
                    anchor_tag.setAttribute('data-toggle',"modal");
               anchor_tag.setAttribute('data-target',"#centralModalDanger");
             anchor_tag.setAttribute('id', sid);

            anchor_tag.innerHTML = "Remove ";

            cell_option.appendChild(anchor_tag);
      
      }
     } 
         });
     });
         });
   </script>

</body>
</html>
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
            <form method="post" id="deleteForm" action="../Controller/SubjectController.php">
              <div class="md-form">
                 <input type="text" name="remove_subject_id" id="modal-input-delete" style="display: none;" >
              </div>
             
             <div class="md-form">
               <button type="submit" name="delete-subject" class="btn btn-danger">Remove</i></button>
             </div>
                
              
              

            </form>
            
          
          </div>
      </div>
      <!--/.Content-->
  </div>
  </div>
  <!-- Central Modal Medium Danger-->