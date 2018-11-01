<?php session_start();
   if (isset($_SESSION["usernameSession"]) && isset($_SESSION["roleSession"])) {
  
       if ($_SESSION["roleSession"]!="admin") {
          header('location:Login.php');
       }

}
else{
	header('location:Login.php');
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
  	div a:hover{
     color: white !important;
  	}
  </style>
</head>
<body class="fixed-sn white-skin" data-gr-c-s-loaded="true" style="background:#eee;">
<!--<h1>welcome <?php echo $_SESSION["usernameSession"] ?></h1>
<form method="post" action="../Controller/LoginController.php">

<input type="submit" name="logoutBtn" value="logout">
</form>-->

<?php require_once 'NavigationBar.php'; ?>

<main id="dash1" class="smooth" style="padding-top: 0px">
	<div class="container-fluid">
		
            <!-- First row -->
            <div class="row mt-lg-5">
                <!-- First column -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card">

                        <!--Card Data-->
                        <div class="admin-up">
                            <i class="fa fa-graduation-cap indigo"></i>
                            <div class="data">
                                <p>
                                	INSTRUCTORS
                                </p>
                                
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <a href="ManageInstructor.php" class="btn indigo btn-rounded">Manage Instructors</a>
                            <!--Text-->
                            <p class="card-text" style="text-align: justify;margin-top: 10px">Here you can add, view or update instructors</p>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>

                <!-- Second column -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card">

                        <!--Card Data-->
                        <div class="admin-up">
                            <i class="fa fa-question-circle warning-color"></i>
                            <div class="data">
                                <p>QUESTIONS</p>
                                <!--<h3 class="font-weight-bold dark-grey-text">375</h3>-->
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <a href="ManageQuestion.php" class="btn warning-color btn-rounded">Manage Questions</a>
                            <!--Text-->
                            <p class="card-text" style="text-align: justify;margin-top: 10px;">Here you can add, remove or edit a question</p>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>



  <div class="col-xl-3 col-md-6 mb-4">
                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card">

                        <!--Card Data-->
                        <div class="admin-up">
                            <i class="fa fa-university light-blue"></i>
                            <div class="data">
                                <p>COURSES</p>
                                <!--<h3 class="font-weight-bold dark-grey-text">375</h3>-->
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <a href="ManageCourse" class="btn light-blue btn-rounded">Manage Courses</a>
                            <!--Text-->
                            <p class="card-text" style="text-align: justify;margin-top: 10px;">Here you can add, remove or edit courses</p>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>

                  <div class="col-xl-3 col-md-6 mb-4">
                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card">

                        <!--Card Data-->
                        <div class="admin-up">
                            <i class="fa fa-book red"></i>
                            <div class="data">
                                <p>SUBJECTS</p>
                                <!--<h3 class="font-weight-bold dark-grey-text">375</h3>-->
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <a href="ManageSubject.php" class="btn red btn-rounded">Manage Subject</a>
                            <!--Text-->
                            <p class="card-text" style="text-align: justify;margin-top: 10px;">Here you can add, remove or edit subjects and units</p>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>
                                  <div class="col-xl-3 col-md-6 mb-4">
                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card">

                        <!--Card Data-->
                        <div class="admin-up">
                            <i class="fa fa-book red"></i>
                            <div class="data">
                                <p>UNITS</p>
                                <!--<h3 class="font-weight-bold dark-grey-text">375</h3>-->
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <a href="ManageUnit.php" class="btn red btn-rounded">Manage Units</a>
                            <!--Text-->
                            <p class="card-text" style="text-align: justify;margin-top: 10px;">Here you can add, remove or edit Units</p>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>
                                 <div class="col-xl-3 col-md-6 mb-4">
                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card">

                        <!--Card Data-->
                        <div class="admin-up">
                            <i class="fa fa-book indigo"></i>
                            <div class="data">
                                <p>QUESTION PAPER</p>
                                <!--<h3 class="font-weight-bold dark-grey-text">375</h3>-->
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <a href="ManageQuestionPaper.php" class="btn indigo btn-rounded">Question Paper</a>
                            <!--Text-->
                            <p class="card-text" style="text-align: justify;margin-top: 10px;">Here you can generate question paper</p>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>
            </div>
            <!-- /.First row -->

	</div>
</main>




<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript" src="js/compiled.min.js"></script>
</body>
</html>