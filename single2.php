<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="hello" />

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
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="style/css/owl.carousel.min.css">
	<link rel="stylesheet" href="style/css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="style/css/style.css">

	<!-- Modernizr JS -->
	<script src="style/js/modernizr-2.6.2.min.js"></script>

	</head>
	<body>

	<div id="fh5co-page">

		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border">

			<h1 id="fh5co-logo"><a href="index.php"><img src="images/logo-colored.png"</a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="portfolio2.php">Photos</a></li>
					<li><a href="about2.php">About</a></li>
					<li><a href="contact2.php">Contact</a></li>
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

		<div id="fh5co-main1">
			<div class="fh5co-narrow-content1 animate-box fh5co-border-bottom" data-animate-effect="fadeInLeft">
				<h2 class="fh5co-heading1" >More photos</span></h2>
                
                <div class="row">
                <?php
                    if (!empty($_GET['photo'])) {
                        if (preg_match("/^[A-Za-z0-9_-]+$/", $_GET['photo'])) {
                            $galleryname = $_GET['photo'];
                        }
                    }
                
                    function RemoveExtension($filename) {
                        return preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
                    }
                
                    function GetImages($dir) {
                        $files = scandir($dir);
                        foreach ($files as $file) {
                            if($file == '.' || $file == "..")continue;
                            $result[RemoveExtension($file)] = $dir . "/" . $file;
                        }
                        return $result;
                    }
                    
                    function GetTexts($dir) {
                        $files = scandir($dir);
                        foreach ($files as $file) {
                            if($file == '.' || $file == "..")continue;
                            $file_text = file_get_contents($dir . "/" . $file);
                            $result[RemoveExtension($file)] = $file_text;
                        }
                        return $result;
                    }
                    
                    function DisplayImages($galleryname) {
                        if (!file_exists("Other/photos/" . $galleryname)) return;
                        $links = GetImages("Other/photos/" . $galleryname ."/img");
                        $texts = GetTexts("Other/photos/" . $galleryname . "/text");
                        $formatNoText = '
                                    <div class="col-md-12">
                                        <figure><img src="%s" class="img-responsive"></figure>
                                    </div>';
                        $formatWithText = '
                                    <div class="col-md-12">
                                        <figure><img src="%s" class="img-responsive">
                                        <figcaption>%s</figcaption>
                                    </figure>
                                    </div>';
                         
                        foreach ($links as $name => $link) {
                            if (!empty($texts[$name])) {
                                printf($formatWithText, htmlspecialchars($link), htmlspecialchars($texts[$name]));
                            } else {
                                printf($formatNoText, htmlspecialchars($link));
                            }
                        }
                    }
                    if (!empty($galleryname)) DisplayImages($galleryname);
                ?>
                    
					<div class="col-md-12">
					<p class="text-center"><a href="portfolio2.php" class="btn btn-primary btn-outline">More Photos</a></p>
					</div>
					
				</div>

			</div>

		</div>
	</div>

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
	<!-- Counters -->
	<script src="style/js/jquery.countTo.js"></script>
	<!-- MAIN JS -->
	<script src="style/js/main.js"></script>

	</body>
</html>
