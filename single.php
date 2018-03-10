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
	
	<link rel="stylesheet" href="style/css/slider.css">

	<!-- Modernizr JS -->
	<script src="style/js/modernizr-2.6.2.min.js"></script>
    
    <script src='https://www.google.com/recaptcha/api.js'></script>
    
    <script
      src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <script src='js/add_comment.js'></script>
	
	<script type="text/javascript" src="js/jssor.slider.min.js"></script>
	<script type="text/javascript" src="js/jquery.textfit.js"></script>

	</head>
	<body>
		<script type="text/javascript">
			jQuery(document).ready(function ($) {

				var jssor_1_SlideshowTransitions = [
				  {$Duration:1400,x:0.25,$Zoom:1.5,$Easing:{$Left:$Jease$.$InWave,$Zoom:$Jease$.$InSine},$Opacity:2,$ZIndex:-10,$Brother:{$Duration:1400,x:-0.25,$Zoom:1.5,$Easing:{$Left:$Jease$.$InWave,$Zoom:$Jease$.$InSine},$Opacity:2,$ZIndex:-10}},
				  {$Duration:1500,x:0.5,$Cols:2,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InOutCubic},$Opacity:2,$Brother:{$Duration:1500,$Opacity:2}},
				  {$Duration:1500,x:0.3,$During:{$Left:[0.6,0.4]},$Easing:{$Left:$Jease$.$InQuad,$Opacity:$Jease$.$Linear},$Opacity:2,$Outside:true,$Brother:{$Duration:1000,x:-0.3,$Easing:{$Left:$Jease$.$InQuad,$Opacity:$Jease$.$Linear},$Opacity:2}},
				  {$Duration:1200,x:0.25,y:0.5,$Rotate:-0.1,$Easing:{$Left:$Jease$.$InQuad,$Top:$Jease$.$InQuad,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InQuad},$Opacity:2,$Brother:{$Duration:1200,x:-0.1,y:-0.7,$Rotate:0.1,$Easing:{$Left:$Jease$.$InQuad,$Top:$Jease$.$InQuad,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InQuad},$Opacity:2}},
				  {$Duration:1600,x:1,$Rows:2,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2,$Brother:{$Duration:1600,x:-1,$Rows:2,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2}},
				  {$Duration:1600,y:-1,$Cols:2,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2,$Brother:{$Duration:1600,y:1,$Cols:2,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2}},
				  {$Duration:1200,y:1,$Easing:{$Top:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2,$Brother:{$Duration:1200,y:-1,$Easing:{$Top:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2}},
				  {$Duration:1500,x:-0.1,y:-0.7,$Rotate:0.1,$During:{$Left:[0.6,0.4],$Top:[0.6,0.4],$Rotate:[0.6,0.4]},$Easing:{$Left:$Jease$.$InQuad,$Top:$Jease$.$InQuad,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InQuad},$Opacity:2,$Brother:{$Duration:1000,x:0.2,y:0.5,$Rotate:-0.1,$Easing:{$Left:$Jease$.$InQuad,$Top:$Jease$.$InQuad,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InQuad},$Opacity:2}},
				  {$Duration:1600,x:-0.2,$Delay:40,$Cols:12,$During:{$Left:[0.4,0.6]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:260,$Easing:{$Left:$Jease$.$InOutExpo,$Opacity:$Jease$.$InOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5},$Brother:{$Duration:1000,x:0.2,$Delay:40,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:1028,$Easing:{$Left:$Jease$.$InOutExpo,$Opacity:$Jease$.$InOutQuad},$Opacity:2,$Round:{$Top:0.5}}},
				  {$Duration:700,$Opacity:2,$Brother:{$Duration:1000,$Opacity:2}},
				  {$Duration:1200,x:1,$Easing:{$Left:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2,$Brother:{$Duration:1200,x:-1,$Easing:{$Left:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2}}
				];

				var jssor_1_options = {
				  $AutoPlay: 1,
				  $FillMode: 5,
				  $SlideshowOptions: {
					$Class: $JssorSlideshowRunner$,
					$Transitions: jssor_1_SlideshowTransitions,
					$TransitionsOrder: 1
				  },
				  $ArrowNavigatorOptions: {
					$Class: $JssorArrowNavigator$
				  },
				  $BulletNavigatorOptions: {
					$Class: $JssorBulletNavigator$
				  }
				};

				var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

				/*#region responsive code begin*/

				var MAX_WIDTH = 600;

				function ScaleSlider() {
					var containerElement = jssor_1_slider.$Elmt.parentNode;
					var containerWidth = containerElement.clientWidth;

					if (containerWidth) {

						var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

						jssor_1_slider.$ScaleWidth(expectedWidth);
					}
					else {
						window.setTimeout(ScaleSlider, 30);
					}
				}

				ScaleSlider();

				$(window).bind("load", ScaleSlider);
				$(window).bind("resize", ScaleSlider);
				$(window).bind("orientationchange", ScaleSlider);
				/*#endregion responsive code end*/
			});
		</script>
	
		<style>
			/* jssor slider loading skin spin css */
			.jssorl-009-spin img {
				animation-name: jssorl-009-spin;
				animation-duration: 1.6s;
				animation-iteration-count: infinite;
				animation-timing-function: linear;
			}

			@keyframes jssorl-009-spin {
				from {
					transform: rotate(0deg);
				}

				to {
					transform: rotate(360deg);
				}
			}

			.jssorb072 .i {position:absolute;color:#000;font-family:"Helvetica neue",Helvetica,Arial,sans-serif;text-align:center;cursor:pointer;z-index:0;}
			.jssorb072 .i .b {fill:#fff;opacity:.3;}
			.jssorb072 .i:hover {opacity:.7;}
			.jssorb072 .iav {color:#fff;}
			.jssorb072 .iav .b {fill:#000;opacity:.5;}
			.jssorb072 .i.idn {opacity:.3;}

			.jssora073 {display:block;position:absolute;cursor:pointer;}
			.jssora073 .a {fill:#ddd;fill-opacity:.7;stroke:#000;stroke-width:160;stroke-miterlimit:10;stroke-opacity:.7;}
			.jssora073:hover {opacity:.8;}
			.jssora073.jssora073dn {opacity:.4;}
			.jssora073.jssora073ds {opacity:.3;pointer-events:none;}
		</style>
	
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
				<h2 class="fh5co-heading1">More photos</span></h2>
                
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
						 
						/* 
                        foreach ($links as $key => $value) {
                            if (!empty($texts[$key])) {
                                printf($formatWithText, htmlspecialchars($value), htmlspecialchars($texts[$key]));
                            } else {
                                printf($formatNoText, htmlspecialchars($value));
                            }
                            $cnt++;
                            if($cnt == $max_img) break;
                        }
						*/
						
						$max_height = 500;
						$max_width = 600;
						
						echo '
							<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:'.$max_width.'px;height:'.$max_height.'px;overflow:hidden;visibility:hidden;">
								<!-- Loading Screen -->
								<div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
									<img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />
								</div>
								<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:600px;height:500px;overflow:hidden;">';

									$index = 0;
									foreach ($links as $key => $value) {
										echo '<div align = "center">';
										
										echo '<img data-u="image" src="'.$value .'" />';
										
										$img_width = getimagesize($value)[0];
										$img_height = getimagesize($value)[1];

										$caption_width = getimagesize($value)[0];
										
										if ($img_height > $max_height && $img_width > $max_width)
										{
											$ratio_h = $img_height / $max_height;
											$ratio_w = $img_width / $max_width;
											
											$max_ratio = max($ratio_h, $ratio_w);
											
											$caption_width = $img_width / $max_ratio;
										}
										else
										{
											if ($img_height > $max_height)
											{
												$ratio = $img_height / $max_height;
												$caption_width = $img_width / $ratio;
											}											
										}
										
										$top_of_caption = 350;
										
										if (!empty($texts[$key])) {
											echo '
											<div class="caption" u="caption" id = "caption'.$index.'"
												style = "
													color: white;
													width: '.$caption_width.'px;
													position: relative; 
													left: center;
													margin: 0px;
													padding-top: 0px;
													padding-bottom: 0px;
													padding-left: 10px;
													padding-right: 10px;
													height: 100px;
													overflow: hidden;
													top: '.$top_of_caption.'px; 
													z-index: 1;
													background-color: rgba(0, 0, 0, 0.5);
												">';
													echo  htmlspecialchars($texts[$key]);
												
											echo '</div>';
										}
										echo '</div>';
										
										$index += 1;
									}

									echo '<script type="text/javascript">';	
										echo 'function caption_fitting() {';
										$index = 0;
										foreach ($links as $key => $value) {
											if (!empty($texts[$key])) {
												echo '$("#caption'.$index.'").textfit("bestfit");';
											}
											$index += 1;
										}		
										echo '}';	

										echo '
											caption_fitting();
										';								
									echo '</script>';
									
								echo '
								</div>
								
								<!-- Bullet Navigator -->
								<div data-u="navigator" class="jssorb072" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
									<div data-u="prototype" class="i" style="width:24px;height:24px;font-size:12px;line-height:24px;">
										<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:-1;">
											<circle class="b" cx="8000" cy="8000" r="6666.7"></circle>
										</svg>
										<div data-u="numbertemplate" class="n"></div>
									</div>
								</div>
								<!-- Arrow Navigator -->
								<div data-u="arrowleft" class="jssora073" style="width:40px;height:50px;top:0px;left:-10px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
									<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
										<path class="a" d="M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z"></path>
									</svg>
								</div>
								<div data-u="arrowright" class="jssora073" style="width:40px;height:50px;top:0px;right:-10px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
									<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
										<path class="a" d="M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z"></path>
									</svg>
								</div>
							</div>
							';				
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
                
				<!--
				
                <?php
                    if(!$load_all) {  
                ?>
					<div class="col-md-12">
					<p class="text-center"><a href="<?php echo($link); ?>" class="btn btn-primary btn-outline">More Photos</a></p>
					</div>
                <?php
                    }   
                ?>
				
				-->

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
	
	<script>
		var slideIndex = 1;
		showDivs(slideIndex);

		function plusDivs(n) {
			showDivs(slideIndex += n);
		}

		function showDivs(n) {
			var i;
			var x = document.getElementsByClassName("mySlides");
			
			if (n > x.length) {slideIndex = 1} 
			if (n < 1) {slideIndex = x.length} ;
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none"; 
			}
		//	x[slideIndex-1].style.display = "block"; 
		}
		
		/*
			JavaScript Explained
			First, set the slideIndex to 1. (First picture)

			Then call showDivs() to display the first image.

			When the user clicks one of the buttons call plusDivs().

			The plusDivs() function subtracts one or  adds one to the slideIndex.

			The showDiv() function hides (display="none") all elements with the class name "mySlides", and displays (display="block") the element with the given slideIndex.

			If the slideIndex is higher than the number of elements (x.length), the slideIndex is set to zero.

			If the slideIndex is less than 1 it is set to number of elements (x.length).		
		*/
	</script>
	
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

