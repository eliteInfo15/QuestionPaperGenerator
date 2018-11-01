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
.test[style] {
    padding-right:0 !important;
}
.test.modal-open {
    overflow: auto;
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
 <ul class="nav nav-tabs md-tabs nav-justified indigo" role="tablist">
     <li class="nav-item">
         <a class="nav-link active" data-toggle="tab" href="#panel5" role="tab"><i class="fa fa-eye"></i> View Units</a>
     </li> 
     <li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#panel6" role="tab"><i class="fa fa-pencil"></i> Add unit</a>
     </li>
    
 </ul>
 <!-- Tab panels -->
 <div class="tab-content">
     <!--Panel 1-->
     <div class="tab-pane fade in show active" id="panel5" role="tabpanel">
         <div class="row">
           <div class="col-lg-8" style="margin: 10px auto">
            <form action="../Controller/UnitController.php" method="post" id="viewunitform">
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
                <div class="row" id="unit_container" style="margin: 10px auto">
      <table class="table" id="unit_table">
         <!--Table head-->
    <thead style="background: #0D47A1" align="center">
        <tr class="text-white">
            <th>Id</th>
            <th>Unit name</th>
            <th>Options</th>
        </tr>
    </thead>
    <!--Table head-->
      </table>
      </div>
              
             </form>
           </div>
         </div>
      <div class="row" id="subject_container" style="margin: 10px auto">
        
      </div>
     </div>
     <!--/.Panel 1-->
     <!--Panel 2-->
     <div class="tab-pane fade" id="panel6" role="tabpanel">
         <br>
         <div class="row">
         	<div class="col-lg-8" style="margin: 10px auto">
         		<!-- Form -->
    <form class="" style="color: #3F51B5;" id="addunitform" method="post" action="../Controller/UnitController.php">
    	
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
 <label for="semester_select" style="top: -20px;color: #1E88E5;font-size: 0.8rem;">Select Semester</label>
  </div>
        </div>
         <div class="col-lg-4">
          <div class="md-form">
         
         <i class="fa fa-book prefix" style="position: relative;padding-right: 10px"></i>
        <select id="subject_select" data-selected="" style="display: inline !important;padding-right: 24px;padding-left: 20px;" name="subject_field">
 <option value="" selected disabled>Subject</option>
  
</select>
 <label for="subject_select" style="top: -20px;color: #1E88E5;font-size: 0.8rem;">Select Subject</label>
  </div>
        </div>
      </div>
      <!-- Email -->
      

      <div class="row">
        <div class="col-lg-6">
         <div class="md-form">
        <input type="text" class="form-control" name="no_of_unit" id="no_of_unit" onkeyup="addFields()">
        <label for="no_of_unit">No. of units</label>
      </div>
       </div>
      </div>
  <div class="row" id="container">
        
      </div>
     
<div class="md-form  col-lg-3 offset-md-4">
	 
      <input type="submit" name="addunit" value="Add unit" class="btn_login waves-effect">
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
         $( "#viewuitform" ).validate( {
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
     

      $( "#addunitform" ).validate( {
        rules: {
          
          course_field: {
            required: true
          },
          semester_field: {
            required: true
          } ,
          no_of_unit:{
            required: true
          },
           subject_field:{
            required: true
          },
          unit1:{
           required:true
      },
           unit2:{
           required:true
    },
           unit3:{
           required:true
     },
           unit4:{
           required:true
      },
           unit5:{
           required:true
      },
           unit6:{
           required:true
      },
           unit7:{
           required:true
      },
           unit8:{
           required:true
     },
           unit9:{
           required:true
     },
           unit10:{
           required:true
       },
           unit11:{
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
          subject_field: {
            required: "Subject is required"
          },
          no_of_unit:{
            required: "Please enter number"
          },
          unit1:{
           required:"Unit is required"
          },
          unit2:{
            required:"Unit is required"
          },
          unit3:{
            required:"Unit is required"
          },
          unit4:{
            required:"Unit is required"
          },
          unit5:{
            required:"Unit is required"
          },
          unit6:{
            required:"Unit is required"
          },
          unit7:{
            required:"Unit is required"
          },
          unit8:{
            required:"Unit is required"
          },
          unit9:{
            required:"Unit is required"
          },
          unit10:{
            required:"Unit is required"
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
         $('#selectbox1').change(function(){
      
             $("#subject_select").find('option').not(':first').remove();

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
           $("#subject_select_box").find('option').not(':first').remove();
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
                //alert(datastring);
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
         });
     });
   </script>
   <script type="text/javascript">
    function remove_unit_modal(param2)
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
       $('#centralModalDanger').on('hide.bs.modal', function (e) {
      
    $('body').addClass('test');
});
    });
  
  </script>
<script type="text/javascript">
     $(document).ready(function(){
      $(document).on('click', 'a', function () {
    remove_unit_modal(this.id)
});
         $('#subject_select_box').change(function(){
            var table=document.getElementById('unit_table'); 
           var tbody= table.getElementsByTagName("tbody")[0];
           if (tbody!=null) {
             table.removeChild(tbody);
           }
 
                  var course_id=$('#course_select_box').val();
   var semester=$('#semester_select_box').val();
   var subject=$(this).val();
   
  
    
   var datastring="course_id="+course_id+"&semester="+semester+"&subject_id="+subject+"&viewunit="+"yes";

     $.ajax({
      type:"POST",
      url:"../Controller/UnitController.php",
      data:datastring,
      success:function(result){

        var obj=JSON.parse(result);
            
           
           var tbody=document.createElement('tbody');
           table.appendChild(tbody);
            for (var i = 0; i < obj.length; i++) {
              var uid=obj[i].uid;
              var uname=obj[i].uname;
              var row = tbody.insertRow(i);
              row.classList.add("text-center");
               var cell_id = row.insertCell(0);
                   cell_id.innerHTML=uid;
               var cell_sname = row.insertCell(1);
                   cell_sname.innerHTML=uname;
               var cell_option = row.insertCell(2);
                   
                   var anchor_tag=document.createElement("a");
                   anchor_tag.setAttribute('href',"#");
                  
                   anchor_tag.setAttribute('class','btn btn-md btn-danger');
                    anchor_tag.setAttribute('data-toggle',"modal");
               anchor_tag.setAttribute('data-target',"#centralModalDanger");
             anchor_tag.setAttribute('id', uid);

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
            <form method="post" id="deleteForm" action="../Controller/UnitController.php">
              <div class="md-form">
                 <input type="text" name="remove_unit_id" id="modal-input-delete" style="display: none;" >
              </div>
             
             <div class="md-form">
               <button type="submit" name="delete-unit" class="btn btn-danger">Remove</i></button>
             </div>
                
              
              

            </form>
            
          
          </div>
      </div>
      <!--/.Content-->
  </div>
  </div>
  <!-- Central Modal Medium Danger-->