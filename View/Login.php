<?php session_start();

if (isset($_SESSION["usernameSession"]) && isset($_SESSION["roleSession"])) {
  if ($_SESSION["roleSession"]=="admin") {
     header('location:AdminHome.php');
  }
  else{
    header('location:InstructorHome.php'); 
  }
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
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  
  <link rel="stylesheet" type="text/css" href="css/compiled-4.5.11.min.css">
  <style type="text/css">
  body{
  	overflow-x: hidden;
    background-color: white !important;
  }
#logindiv{
	float: none;
	display: block;
	margin: 40px auto !important;
}
.heading{
	font-family: segoe ui light;
}
#heading_div{
  float: none;
  display: block;
//display: block !important;
padding: 20px;
margin: 3px auto !important;
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

.separation{
  margin-left: 70px !important;
}
.hand_cursor{
  cursor: pointer !important;
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


  </style>

</head>
<body class="">
	<div class="row text-center z-depth-1"  id="heading_div">
	

  <img src="images/logo.png" style="width: 50px;height: 50px">


  <h1 class="heading">Question Paper Generator</h1>

  	
	</div>
	<div class="row vertical-center" id="logindiv">
<div class="col-lg-6 offset-md-3">
<!-- Material form login -->
<div class="z-depth-2">

  <h5 class="card-header indigo white-text text-center py-4">
    <strong>Login</strong>
  </h5>

  <!--Card content-->
  <div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form class="" style="color: #3F51B5;" id="loginform" method="post" action="../Controller/LoginController.php">
    	
      
      <!-- Email -->
      <div class="md-form">
      	 
      	 <i class="fa fa-user prefix"></i>
        <input type="text" id="materialLoginFormEmail" class="form-control" name="username" >
        <label for="materialLoginFormEmail">Username</label>
   
      </div>

      <!-- Password -->
      <div class="md-form">
      	 
      	 <i class="fa fa-key prefix"></i>
        <input type="password" id="password-field" class="form-control" name="password" data-toggle="password">
        <label for="password-field">Password</label>
        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password side-align"></span>
  </div>
    <div class="md-form col-lg-12 text-center">
      
     
    <div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input " id="defaultUnchecked" name="role" value="instructor" checked>
  <label class="custom-control-label hand_cursor" for="defaultUnchecked">Instructor</label>
   </div>
      
      <div class="custom-control custom-radio custom-control-inline separation">
  <input type="radio" class="custom-control-input" id="defaultUnchecked1" name="role" value="admin">
  <label class="custom-control-label hand_cursor" for="defaultUnchecked1">Admin</label>
   </div>

    </div>  
     
<div class="md-form  col-lg-3 offset-md-4">
	 
      <input type="submit" name="login_btn" value="Login" class="btn_login waves-effect">
</div>
   </form>
    
    <!-- Form -->

<div class="col-lg-6 offset-md-3">
 <p class="login_error">
   <strong>
     <?php 

  if (isset($_SESSION["loginError"])) {
      echo $_SESSION["loginError"];
  }

   ?>
   </strong>
 </p>
  
</div>

 
  </div>
</div>
</div>
</div>
<!-- Material form login -->


<!-- SCRIPTS -->
  <!-- JQuery -->
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
  		$( "#loginform" ).validate( {
				rules: {
					
					username: {
						required: true
					},
					password: {
						required: true
					}
				},
				messages: {
					
					username: {
						required: "Username is required"
					},
          
					password: {
						required: "Password is required"}
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
<?php 

unset($_SESSION["loginError"]);

 ?>