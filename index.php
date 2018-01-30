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
    <div class="bordered">
        <div class="liink">
            <a href="portfolio1.php">
                <h1 >Sergey</h1>
            </a>
        </div>
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
                    $format= ' <a class="gallery_item" href="portfolio1.php">
                                <img src="%s">
                                 <span class="overlay">
                                    <h2>Watch more</h2>
                                </span>
                                </a> ';
                    foreach ($links as $link) {
                      printf($format, htmlspecialchars($link));
                    }
                }
                
                $galleryname = "Sergey/main";
                if (!empty($galleryname)) DisplayImages($galleryname);
            ?>
        </div>
    </div>
        <div class="left_footer">
            <p>write here mail1</p>
            <p>write here hello world</p>
        </div>
</div>

<div class="column right">
    <div class="bordered">
        <div class="liink">
            <a href="portfolio1.php">
                <h1 >Other</h1>
            </a>
        </div>
        <div class="gallery">
            <?php
                function DisplayImagesOther($dir) {
                    $links = GetImages($dir);
                    $format= ' <a class="gallery_item" href="portfolio2.php">
                                <img src="%s">
                                 <span class="overlay">
                                    <h2>Watch more</h2>
                                </span>
                                </a> ';
                    foreach ($links as $link) {
                      printf($format, htmlspecialchars($link));
                    }
                }
                
                $galleryname = "Other/main";
                DisplayImagesOther($galleryname);
            ?>
        </div>
    </div>
    <div class="right_footer">
        <p>write here mail2</p>
        <p>write here hello world</p>
    </div>
</div>
  
<div class="clearfix"></div>

</body>
</html>
