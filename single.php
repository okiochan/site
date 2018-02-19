<?php
require_once __DIR__ . "/php/include.php";

$gallery_name = "";
$folder_name = "";

// sanitization
if (!empty($_GET['folder_name'])) {
    if ($_GET['folder_name'] === "Sergey") {
        $folder_name = "Sergey";
    } else if ($_GET['folder_name'] === "Other") {
        $folder_name = "Other";
    }
}
if (!empty($_GET['photo'])) {
    if (preg_match("/^[A-Za-z0-9_-]+$/", $_GET['photo']) &&
        strlen($_GET['photo']) <= 100) {
        $gallery_name = $_GET['photo'];
    }
}
if (empty($gallery_name)) {
    die();
}
if (empty($folder_name)) {
    die();
}               
?>

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
    
    <script src='https://www.google.com/recaptcha/api.js'></script>
    
    <script
      src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <script src='js/add_comment.js'></script>

	</head>
	<body>

	<div id="fh5co-page">

		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border">

			<h1 id="fh5co-logo"><a href="index.php"><img src="images/logo-colored.png"</a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<li><a href="index.php">Home</a></li>
                    <?php require_once __DIR__ . "/worker/left_column.php"; ?>
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
                    
                    function DisplayImages($folder_name, $gallery_name, $max_img) {
                        if (!file_exists($folder_name."/photos/" . $gallery_name)) return;
                        $links = GetImages($folder_name."/photos/" . $gallery_name ."/img");
                        $texts = GetTexts($folder_name."/photos/" . $gallery_name . "/text");
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
                         
                         $cnt = 0;
                         // htmlspecialchars - when we want only TEXT
                        foreach ($links as $key => $value) {
                            if (!empty($texts[$key])) {
                                printf($formatWithText, htmlspecialchars($value), htmlspecialchars($texts[$key]));
                            } else {
                                printf($formatNoText, htmlspecialchars($value));
                            }
                            $cnt++;
                            if($cnt == $max_img) break;
                        }
                    }
                    
                    $load_all = true;
                    if( empty($_GET['load_all']) ) {
                        $load_all = false;
                    }
                    $max_img = 4;
                    
                    if($load_all) {
                        $max_img = -1;
                    }
                    
                    if (!empty($gallery_name)) DisplayImages($folder_name, $gallery_name, $max_img);
                    
                    $link = basename(__FILE__, '.php');
                    $link .= ".php?folder_name=" . $folder_name . "&photo=".$gallery_name."&load_all=1";
                ?>
                
                <?php
                    if(!$load_all) {  
                ?>
					<div class="col-md-12">
					<p class="text-center"><a href="<?php echo($link); ?>" class="btn btn-primary btn-outline">More Photos</a></p>
					</div>
                <?php
                    }   
                ?>
                
                
                
                
                </div>

			</div>
            
            <!--- Comment section -->
            
            <?php
            
            $comments = CommentsDB::GetInstance()->GetComments($folder_name, $gallery_name);
            foreach($comments as $comment) {
                echo htmlspecialchars($comment['username']) . "<br>";
                echo htmlspecialchars($comment['text']) . "<br>";
                echo htmlspecialchars($comment['time']) . "<br>";
            }
            
            ?>
            
            <?php
            $is_logged = Users::isLogged();
            ?>
            <?php
            if($is_logged) {
            ?>
			<div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
				<div class="row">
					<div class="col-md-4">
						<h1>Leave a Comment</h1>
					</div>
				</div>
                
				<form class="comment_form" action="" method="post">
					<div class="row">
						<div class="col-md-12">
							<div class="row">	
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<textarea name="text" id="message" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
									</div>
                                    <div class="g-recaptcha" data-sitekey="6LfT2EMUAAAAAI3OD46lijfQoPW7hO8_jGyD_YP-"></div>
									<div class="form-group">
										<input type="submit" class="btn btn-primary btn-md comment_submit" value="Add comment">
										<input type="hidden" name="photo" value="<?php echo htmlspecialchars($gallery_name); ?>">
										<input type="hidden" name="folder_name" value="<?php echo htmlspecialchars($folder_name); ?>">
										<input type="hidden" name="username" value="<?php echo htmlspecialchars(Users::whichUser()); ?>">
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</form>
			</div>
            <?php 
            } 
            ?>
            
            

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

