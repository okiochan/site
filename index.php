<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="style/css/style_main.css">
</head>
<body>

<div class="header">
  <h1>Here may be text</h1>
</div>

<div class="left column">
    <h1>First</h1>
    <div class="gallery">
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
    
    <div class="left_footer">
        <p>write here mail1</p>
        <p>write here hello world</p>
    </div>
</div>

<div class="column right">
    <h1>Second</h1>
    <div class="gallery">
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
            
            $galleryname = "Other/main";
            DisplayImagesOther($galleryname);
        ?>
    </div>
    
    <div class="right_footer">
        <p>write here mail2</p>
        <p>write here hello world</p>
    </div>
</div>
  
<div class="clearfix"></div>

</body>
</html>
