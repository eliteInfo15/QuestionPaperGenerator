<style type="text/css">
.notification-bar{
	background-color: #3f51b5!important;
	padding: 8px 20px;
	border-radius: 20px;
}
.notification-bar:hover{
	cursor: pointer;
}
	#notification-bell{
		color: white !important;
		font-size:15px;
	}
	#notification-number{
		font-size:15px;
		padding-left: 10px;
		//font-weight: bold;
		color: white;
		
	}
</style>
<!--Main Navigation-->
    <header style="background-color: white">

                <!-- Navbar -->
        <nav class="mb-1 navbar navbar-expand-lg z-depth-2 navbar-fixed-top">
                <a class="navbar-brand" href="AdminHome.php" style="color: black;"><img src="images/logo.png" style="width: 50px;height: 50px">  Question Paper Generator</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars" style="color: black;"></i>
                        </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                        	<div class="notification-bar">
                        		<i class="fa fa-bell" aria-hidden="true" id="notification-bell"></i>
                        		<span id="notification-number">Notifications <b>2</b></span>
                        	</div>
                            <div id="notifications" >
                            	<ul>
                            		<li><a href="">hello</a></li>
                            		<li><a href="">hello</a></li>
                            		<li><a href="">hello</a></li>
                            	</ul>
                            </div>
                        	

                        </li>
                        
                        <li class="nav-item active">
                        	<form class="form-inline my-2 my-lg-0 ml-auto" method="post" action="../Controller/LoginController.php">
                        		<div class="md-form my-0">
                        			<button class="btn indigo btn-rounded btn-md my-2 my-sm-0 ml-3" name="logoutBtn" type="submit"><i class="fa fa-sign-out" style="font-size: 15px"></i> Logout</button>
                        			
                        		</div>
                        	</form>
                        	</li>
                        
                        
                    </ul>
                </div>
            </nav>

    </header>
    <!--Main Navigation-->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$("#notifications").hide();
    		$(".notification-bar").click(function() {
    		$("#notifications").slideToggle(1000);
    	});
    	});
    	
    </script>