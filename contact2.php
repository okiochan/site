<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="hello" />
		<meta name="author" content="FreeHTML5.co" />

		<!-- Facebook and Twitter integration -->
		<meta property="og:title" content=""/>
		<meta property="og:image" content=""/>
		<meta property="og:url" content=""/>
		<meta property="og:site_name" content=""/>
		<meta property="og:description" content=""/>
		<meta name="twitter:title" content="" />
		<meta name="twitter:image" content="" />
		<meta name="twitter:url" content="" />
		<meta name="twitter:card" content="" />

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
		
		<script src='https://www.google.com/recaptcha/api.js'></script>

		<!-- Modernizr JS -->
		<script src="style/js/modernizr-2.6.2.min.js"></script>
		<script
		  src="http://code.jquery.com/jquery-3.3.1.min.js"
		  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		  crossorigin="anonymous"></script>

		<style>
			.warning_message_in_feedback_form {
				color: red; 
				font-size: 10pt;
			}
		</style>
	</head>
	<body>

	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="js-fullheight">

			<h1 id="fh5co-logo"><a href="index.php"><img src="images/logo-colored.png" </a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="portfolio.php?folder_name=Sergey">Photos</a></li>
					<li><a href="about1.php">About</a></li>
					<li class="fh5co-active"><a href="contact1.php">Contact</a></li>
				</ul>
			</nav>

			<div class="fh5co-footer">
				<ul>
					<li><a href="#"><i class="icon-facebook"></i></a></li>
					<li><a href="#"><i class="icon-twitter"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
					<li><a href="#"><i class="icon-linkedin"></i></a></li>
				</ul>
			</div>

		</aside>

		<div id="fh5co-main">

			<div id="map"></div>	

			<div class="fh5co-more-contact">
				<div class="fh5co-narrow-content">
					<div class="row">
						<div class="col-md-4">
							<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="fh5co-icon">
									<i class="icon-envelope-o"></i>
								</div>
								<div class="fh5co-text">
									<p><a href="#">info@domain.com</a></p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="fh5co-icon">
									<i class="icon-map-o"></i>
								</div>
								<div class="fh5co-text">
									<p>198 West 21th Street, Suite 721 New York NY 10016</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="fh5co-icon">
									<i class="icon-phone"></i>
								</div>
								<div class="fh5co-text">
									<p><a href="tel://">+123 456 7890</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
				
				<div class="row">
					<div class="col-md-4">
						<h1>Get In Touch</h1>
					</div>
				</div>
                
				<script>
					$(document).ready(function() {
						$('#Name_Input').on('input', function() {
							document.getElementById('Name_Input').style.borderColor = 'rgba(0, 0, 0, 0.1)';
						});
						$('#Email_Input').on('input', function() {
							document.getElementById('Email_Input').style.borderColor = 'rgba(0, 0, 0, 0.1)';
						});
						$('#Phone_Input').on('input', function() {
							document.getElementById('Phone_Input').style.borderColor = 'rgba(0, 0, 0, 0.1)';
						});
						$('#message').on('input', function() {
							document.getElementById('message').style.borderColor = 'rgba(0, 0, 0, 0.1)';
						});
						
						// onfocus
						// --------------------------------------------
						document.getElementById('Name_Input').onfocus = function() {
							document.getElementById('Name_Input').style.borderColor = 'green';
						};
						document.getElementById('Email_Input').onfocus = function() {
							document.getElementById('Email_Input').style.borderColor = 'green';
						};
						document.getElementById('Phone_Input').onfocus = function() {
							document.getElementById('Phone_Input').style.borderColor = 'green';
						};
						document.getElementById('message').onfocus = function() {
							document.getElementById('message').style.borderColor = 'green';
						};
						// --------------------------------------------
						
						// onblur
						// --------------------------------------------
						document.getElementById('Name_Input').onblur = function() {
							document.getElementById('Name_Input').style.borderColor = 'rgba(0, 0, 0, 0.1)';
						}
						document.getElementById('Email_Input').onblur = function() {
							document.getElementById('Email_Input').style.borderColor = 'rgba(0, 0, 0, 0.1)';
						};
						document.getElementById('Phone_Input').onblur = function() {
							document.getElementById('Phone_Input').style.borderColor = 'rgba(0, 0, 0, 0.1)';
						};
						document.getElementById('message').onblur = function() {
							document.getElementById('message').style.borderColor = 'rgba(0, 0, 0, 0.1)';
						};
						// --------------------------------------------
						
						function validate_form() {
							document.getElementById('help_for_name_input').style.visibility = "hidden";
							document.getElementById('help_for_email_input').style.visibility = "hidden";
							document.getElementById('help_for_phone_input').style.visibility = "hidden";
							document.getElementById('help_for_message_input').style.visibility = "hidden";
							
							valid = true;
							if (document.getElementById('Name_Input').value.trim() == "") {
								document.getElementById('Name_Input').style.borderColor = 'red';
								document.getElementById('help_for_name_input').innerHTML = "Пожалуйста, заполните поле 'Name'.";
								document.getElementById('help_for_name_input').style.visibility = "visible";
								valid = false;
							}
							if (document.getElementById('Email_Input').value.trim() == "") {
								document.getElementById('Email_Input').style.borderColor = 'red';
								document.getElementById('help_for_email_input').innerHTML = "Пожалуйста, заполните поле 'E-mail'.";
								document.getElementById('help_for_email_input').style.visibility = "visible";
								valid = false;
							}
							if (document.getElementById('Phone_Input').value.trim() == "") {
								document.getElementById('Phone_Input').style.borderColor = 'red';
								document.getElementById('help_for_phone_input').innerHTML = "Необходимо заполнить поле 'Phone'.";
								document.getElementById('help_for_phone_input').style.visibility = "visible";
								valid = false;
							}
							if (document.getElementById('message').value.trim() == "") {
								document.getElementById('message').style.borderColor = 'red';
								document.getElementById('help_for_message_input').innerHTML = "Необходимо заполнить поле 'Message'.";
								document.getElementById('help_for_message_input').style.visibility = "visible";
								valid = false;
							}
							
							var r = document.getElementById('Email_Input').value.match(/^[0-9a-z-\.]+\@[0-9a-z-]{2,}\.[a-z]{2,}$/i);
							if (!r) {
								document.getElementById('Email_Input').style.borderColor = 'red';
								document.getElementById('help_for_email_input').innerHTML = "E-mail введен некорректно.";
								document.getElementById('help_for_email_input').style.visibility = "visible";
								valid = false;
							}
							
							var r = document.getElementById('Name_Input').value.match(/^[a-zA-ZА-Яа-я][ a-zA-ZА-Яа-я\-]*$/i);
							if (!r) {
								document.getElementById('Name_Input').style.borderColor = 'red';
								document.getElementById('help_for_name_input').innerHTML = "Поле 'Name' может содержать только буквы, пробельные символы и знак '-'. Поле 'Name' должно начинаться с буквы.";
								document.getElementById('help_for_name_input').style.visibility = "visible";
								valid = false;
							}
							
							var r = document.getElementById('Phone_Input').value.match(/^[\+]?[0-9]+$/i);
							if (!r) {
								document.getElementById('Phone_Input').style.borderColor = 'red';
								document.getElementById('help_for_phone_input').innerHTML = "Поле 'Phone' может содержать только знак '+' и цифры.";
								document.getElementById('help_for_phone_input').style.visibility = "visible";
								valid = false;
							}
							
							return valid;
						}
	
						$('input[type="submit"]').on('click', (e) => {
							if (validate_form() == true)
							{
								e.preventDefault();
								e.stopPropagation();
								
								var onSuccess = function(data, textStatus, jqXHR) {
									if (data.ans && data.ans.indexOf("Ok") != -1) {
                                        alert("Message sent!");
                                    } else if (data.ans) {
                                        alert("Error");
                                    }
                                    console.log(data);
                                    console.log(textStatus);
								};
								
								var onError = function(jqXHR, textStatus, errorThrown) {
									console.log(textStatus);
									console.log(errorThrown);
								}
                                
								var data = $(".message_form").serialize();
                                var url = "send_form_performing.php";
                                var settings = {
                                    data: data,
                                    method: "POST",
                                    url: url,
                                    success: onSuccess,
                                    error: onError, 
                                };
                                $.ajax(settings);
							}
							else {
								e.preventDefault();
								e.stopPropagation();
							}
							
						});
						
					});
				</script>
                
				<form class="message_form" action="send_form_performing.php" method="post">
					<div class="row">
						<div class="col-md-12">
							<div class="row">	
								<div class="col-md-6">
									<div name="help_for_name_input" id="help_for_name_input" class="warning_message_in_feedback_form" style="visibility:hidden;">
									</div>
									
									<div class="form-group">
										<input type="text" id="Name_Input" class="form-control" placeholder="Name" name="Name" maxlength="50">
									</div>
									
									<div name="help_for_email_input" id="help_for_email_input" class="warning_message_in_feedback_form" style="visibility:visible; color: red;">
									</div>
									
									<div class="form-group">
										<input type="text" id="Email_Input" class="form-control" placeholder="Email" name="Email" maxlength="50">
									</div>
									
									<div name="help_for_phone_input" id="help_for_phone_input" class="warning_message_in_feedback_form" style="visibility:hidden;">
									</div>
									
									<div class="form-group">
										<input type="text" id="Phone_Input" class="form-control" placeholder="Phone" name="Phone" maxlength="30">
									</div>
								</div>
								<div class="col-md-6">
									<div name="help_for_message_input" id="help_for_message_input" class="warning_message_in_feedback_form" style="visibility:hidden;">
									</div>
									
									<div class="form-group">
										<textarea name="Message" id="message" cols="30" rows="7" class="form-control" placeholder="Message" maxlength="800"></textarea>
									</div>
									
									
									<input type="hidden" name="from" id="from" value="contact2"/>
									
									<div class="g-recaptcha" data-sitekey="6LfT2EMUAAAAAI3OD46lijfQoPW7hO8_jGyD_YP-"></div>
									
									<div class="form-group">
										<input type="submit" class="btn btn-primary btn-md" value="Send Message">
									</div>
								</div>
								
							</div>
						</div>
						
					</div>
				</form>
			</div>

		</div>
	</div>

	<!-- Counters -->
	<script src="style/js/jquery.countTo.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="style/js/google_map.js"></script>
	
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