<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  
  <link rel="stylesheet" type="text/css" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled-4.5.11.min.css?ver=4.5.11">
  <style type="text/css">
  body{
  	overflow: hidden;
  }
#logindiv{
	float: none;
	display: block;
	margin: 80px auto !important;
}
.heading{
	font-family: segoe ui light;
}
#heading_div{
display: block !important;
padding: 20px;
}
em{
	padding-left: 38px;
    color: red;
    font-family: Arial ;
    font-style: normal;
}
.login_err_msg{
	color: red;
}




  </style>
</head>
<body class="">
	<div class="row text-center z-depth-1"  id="heading_div">
		<h1 class="heading">Question Paper Generator</h1>
	</div>
	<div class="row vertical-center" id="logindiv">
<div class="col-lg-6 offset-md-3">
<!-- Material form login -->
<div class="z-depth-2">

  <h5 class="card-header indigo white-text text-center py-4">
    <strong>Admin Login</strong>
  </h5>

  <!--Card content-->
  <div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form class="" style="color: #3F51B5;" id="loginform" action="" method="post">
    	
      
      <!-- Email -->
      <div class="md-form">
      	 
      	 <i class="fa fa-user prefix"></i>
        <input type="text" id="materialLoginFormEmail" class="form-control" name="username" >
        <label for="materialLoginFormEmail">Username</label>
   
      </div>

      <!-- Password -->
      <div class="md-form">
      	 
      	 <i class="fa fa-key prefix"></i>
        <input type="password" id="materialLoginFormPassword" class="form-control" name="password">
        <label for="materialLoginFormPassword">Password</label>
    
  </div>
      
     
<div class="md-form  col-lg-3 offset-md-4">
	 <!-- Sign in button -->
      <button class="btn btn-indigo my-6 waves-effect z-depth-4" type="submit">Login</button>
</div>
     

     

     

    </form>
    <!-- Form -->

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
  
</body>
</html>