<?php 

session_start();
   if (isset($_SESSION["usernameSession"]) && isset($_SESSION["roleSession"])) {
  
       if ($_SESSION["roleSession"]!="instructor") {
          header('location:Login.php');
       }

}
else{
  header('location:Login.php');
}

require '../Controller/AdminController.php';
$instructor_id=$_SESSION['usernameSession'];

$admin=new AdminController();
         $instructor_data=$admin->getInstructorById($instructor_id);

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

<?php require_once 'InstructorNavigationBar.php'; ?>

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
    <form class="" style="color: #3F51B5;" id="loginform" method="post">
       <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
        <input type="text" class="form-control" name="instructor_id" id="instructor_id" readonly value="<?php echo $instructor_id ?>">
        <label for="id">Instructor Id</label>
       
  </div>
      
      <!-- Email -->
      

      <!-- Password -->
      <div class="row">
        <div class="col-lg-6">
          <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
        <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $instructor_data['fname'] ?>">
        <label for="fname">First Name</label>
       
  </div>

        </div>
        <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
        <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $instructor_data['lname'] ?>">
        <label for="lname">Last Name</label>
       
  </div>
        </div>
      </div>
  
  <div class="row">
    <div class="col-lg-6">
      <div class="md-form">
         
         <i class="fa fa-envelope prefix"></i>
        <input type="text" class="form-control" name="email" id="email" value="<?php echo $instructor_data['email'] ?>">
        <label for="email">Email</label>
       
  </div>
    </div>
    <div class="col-lg-6">
      <div class="md-form">
         
         <i class="fa fa-phone prefix"></i>
        <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $instructor_data['mobile'] ?>">
        <label for="mobile">Mobile</label>
       
  </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-6">
      <div class="md-form">
         
         <i class="fa fa-globe prefix"></i>
        <input type="text" class="form-control" name="city" id="city" value="<?php echo $instructor_data['city'] ?>">
        <label for="city">City</label>
       
  </div>
    </div>
    <div class="col-lg-6">
      <div class="md-form">
         
         <i class="fa fa-calendar prefix"></i>
        <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $instructor_data['date_of_birth'] ?>">
        <label for="dob" style="margin-top: -24px">Date of birth</label>
       
  </div>
    </div>
  </div>
  
 <div class="row gender-container">
  <div class="col-lg-6">
      <div class="md-form">
     <div class="custom-control custom-radio custom-control-inline" style="margin-right: 3rem;">
  <input type="radio" class="custom-control-input" id="maleRb" name="gender" value="male" <?php echo ($instructor_data['gender']=='male')?"checked":"" ;?>>
  <label class="custom-control-label hand_cursor" for="maleRb">Male</label>
</div>

<!-- Default inline 2-->
<div class="custom-control custom-radio custom-control-inline" style="margin-right: 3rem;">
  <input type="radio" class="custom-control-input" id="femaleRb" name="gender" value="female" <?php echo ($instructor_data['gender']=='female')?"checked":"" ;?>>
  <label class="custom-control-label hand_cursor" for="femaleRb">Female</label>
</div>
   </div>
  </div>
 
   <div>
     
   </div>
 </div>
  
     
<div class="md-form  col-lg-3 offset-md-4">
   
<input type="submit" name="add-instructor" value="Request Update" class="btn_login waves-effect">
</div>
   </form>
          </div>
         </div>
     </div>
     <!--/.Panel 2-->
     
 </div> 

</div> 


<!-- Central Modal Medium Success -->
<div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-notify modal-success" role="document">
    <!--Content-->
    <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
            <p class="heading lead">Updated</p>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
            </button>
        </div>

        <!--Body-->
        <div class="modal-body">
            <div class="text-center">
                <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                <h3>Instructor updated successfully</h3>
                <h3 id="instructor_id_from_db"></h3>
            </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
            
            <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">OK</a>
        </div>
    </div>
    <!--/.Content-->
</div>
</div>
<!-- Central Modal Medium Success-->



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
      $( "#loginform" ).validate({
        rules: {
          
          instructor_id: {
            required: true
          },
          password: {
            required: true
          },

          fname:{
            required:true
          },
          lname:{
            required:true
          },
          city:{
            required:true
          },
          Rank:{
            required:true
          },
          email:{
            required:true
          },
          mobile:{
            required:true
          },
          dob:{
            required:true
          },
          skill:{
            required:true
          }
        },
        messages: {
          
          instructor_id: {
            required: "Id is required"
          },
          skill:{
             required: "Skill is required"
          },
          fname: {
            required: "First name is required"
          },
          lname: {
            required: "Last name is required"
          },
          email: {
            required: "Email is required"
          },
          mobile: {
            required: "Mobile is required"
          },
          dob: {
            required: "Date of birth is required"
          },
          city: {
            required: "City is required"
          },
          Rank: {
            required: "Rank is required"
          },
          password: {
            required: "Password is required"}
        } ,

     submitHandler: function(form) {
   var instructor_id= $('#instructor_id').val();
   var fname=$('#fname').val();
   var lname=$('#lname').val();
   var city=$('#city').val();
   var email=$('#email').val();
   var mobile=$('#mobile').val();
  
   var dob=$('#dob').val();
  
   var gender=$('input[name=gender]:checked', '#loginform').val(); 
    
   var datastring="instructor_id="+instructor_id+"&fname="+fname+"&lname="+lname+"&city="+city+"&email="+email+"&mobile="+mobile+"&dob="+dob+"&requestUpdate=yes"+"&gender="+gender;

     $.ajax({
      type:"POST",
      url:"../Controller/InstructorController.php",
      data:datastring,
      success:function(result){
        if (result==23000) {
          toastr.error('Please wait! Your previous requests are pending');
      
        }
        else{
          toastr.info('Request sent to admin you will be notified shortly!');
        }
        
       // $("#instructor_id_from_db").html("Instructor id is "+result);
            //$('#centralModalSuccess').modal('show');
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
      }
           
       );
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
     
   </script>
</body>
</html>