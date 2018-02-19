<?php
require_once __DIR__ . '/../php/include.php';

if($folder_name == "Sergey") {
    $str = '
    <li class="fh5co-active"><a href="portfolio.php?folder_name=Sergey">Photos</a></li>
    <li><a href="about1.php">About</a></li>
    <li><a href="contact1.php">Contact</a></li>';
    echo $str;
} else if ($folder_name == "Other") {
    $str = '
    <li class="fh5co-active"><a href="portfolio.php?folder_name=Other">Photos</a></li>
    <li><a href="about2.php">About</a></li>
    <li><a href="contact2.php">Contact</a></li>';
    echo $str;
} else {
    die();
}

if (empty($_SESSION['user_logged'])) {
    echo '
    <br> <br> <br> <br>
     <li><a href="register.php">Register</a></li>
     <li><a href="login.php">Login</a></li>
     ';
    
} else {
    echo '
    <br> <br> <br> <br>
     <li><a href="logout.php">Logout</a></li>
     ';
}
