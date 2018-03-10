<?php
require_once __DIR__ . '/php/include.php';

$login = $_GET['username'];
$salt = $_GET['salt'];

if(DB::dbCheckUserExist($login) == false) {
    echo("user not found, please try again");
    die();
}

if( DBrestore::dbCheckSalt($login, $salt) == false) {
    echo("error, please try again");
    die();
}

?>

<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="hello" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="style/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="style/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="style/css/bootstrap.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="style/css/owl.carousel.min.css">
	<link rel="stylesheet" href="style/css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="style/css/style.css">
    
    <!-- Captcha -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

	<!-- Modernizr JS -->
	<script src="style/js/modernizr-2.6.2.min.js"></script>
    <script
      src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
      
      <!-- logic -->
      <script src="js/enter_new_pass.js"></script>

	</head>
	<body>

	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="js-fullheight">

			<h1 id="fh5co-logo"><a href="index.php"><img src="images/logo-colored.png" </a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<li><a href="index.php">Home</a></li>
				</ul>
			</nav>
		</aside>

		<div id="fh5co-main">
			<div class="fh5co-more-contact">	
			</div>
			<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
				
				<div class="row">
					<div class="col-md-4">
						<h1>Enter new password</h1>
					</div>
				</div>
    
				<form class="pass_form">
					<div class="row">
						<div class="col-md-12">
							<div class="row">	
								<div class="col-md-6">
                                    
                                    <div name="help_for_pass_input" id="help_for_pass_input" class="warning_message_in_feedback_form" style="visibility:visible; color: red;">
									</div>
									<div class="form-group">
										<input type="text" id="Pass_Input" class="form-control" placeholder="Password" name="pass" required>
									</div>
                                    
								</div>								
							</div>
						</div>
					</div>
                    
                    <div class="col-md-12">
                        <a class="btn btn-primary btn-outline reg_button">Next</a>
					</div>
				</form>
                
			</div>

		</div>
	</div>

	<!-- Counters -->
	<script src="style/js/jquery.countTo.js"></script>
	
	<!-- MAIN JS -->
	<script src="style/js/main.js"></script>
    
	<!-- jQuery -->
	<script src="style/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="style/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="style/js/bootstrap.min.js"></script>
	<!-- Carousel -->
	<script src="style/js/owl.carousel.min.js"></script>
	<!-- Stellar -->
	<script src="style/js/jquery.stellar.min.js"></script>
	<!-- Waypoints -->
	<script src="style/js/jquery.waypoints.min.js"></script>

	</body>
</html>

