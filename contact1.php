
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
                    <li><a href="register.php">Register</a></li>';
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
                
<script >
$( document ).ready(function() {
    $('input[type="submit"]').on('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        
        var onSuccess = function(data, textStatus, jqXHR) {
            if (data.indexOf("Ok") != -1) {
                alert("Message sent!");
            } else {
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
        var url = "send_form_performing1.php";
        var settings = {
            data: data,
            method: "POST",
            url: url,
            success: onSuccess,
            error: onError, 
        };
        $.ajax(settings);
    });
    
});
</script>
                
				<form class="message_form" action="send_form_performing1.php" method="post">
					<div class="row">
						<div class="col-md-12">
							<div class="row">	
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Name" name="Name" required>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Email" name="Email" required>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Phone" name="Phone" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<textarea name="Message" id="message" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
									</div>
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

