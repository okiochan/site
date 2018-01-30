<!DOCTYPE html>
<html>
<head>
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
    <link rel="stylesheet" href="style/css/style_main.css">

	<!-- Modernizr JS -->
	<script src="style/js/modernizr-2.6.2.min.js"></script>
</head>
<body>

<div class="header">
  <h1>Here may be text</h1>
</div>

<div class="clearfix">
  <div class="menu column">
    <h1>First</h1>
    <?php
        function GetImages($dir) {
            $files = scandir($dir);
            foreach ($files as $file) {
                if($file == '.' || $file == "..")continue;
                $result[] = $dir . "/" . $file;
            }
            return $result;
        }
        
        function DisplayImages($dir) {
            $links = GetImages($dir);
            $format= ' <a href="portfolio1.php">
                        <img src="%s">
                        </a> ';
            foreach ($links as $link) {
              printf($format, htmlspecialchars($link));
            }
        }
        
        $galleryname = "Sergey/main";
        if (!empty($galleryname)) DisplayImages($galleryname);
    ?>
  </div>

  <div class="column content">
    <h1>Second</h1>
    
    <?php
        function DisplayImagesOther($dir) {
            $links = GetImages($dir);
            $format= ' <a href="portfolio2.php">
                        <img src="%s">
                        </a> ';
            foreach ($links as $link) {
              printf($format, htmlspecialchars($link));
            }
        }
        
        $var = 1;
        if($var != 1) {
            echo "Wow";
        }
        
        $galleryname = "Other/main";
        DisplayImagesOther($galleryname);
    ?>
  </div>
</div>

<div class="footer">
  <p>write here something</p>
</div>

</body>
</html>