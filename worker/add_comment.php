<?php

require_once __DIR__ . "/../php/include.php";

function Result($code, $message) {
    echo json_encode([$code, $message]);
    die();
}

if (!Users::isLogged()) Result(1, "user not logged in");

if (empty($_POST['folder_name'])) Result(2, "no folder");
if (strlen($_POST['folder_name']) == 0) Result(3, "empty folder");
if (strlen($_POST['folder_name']) > 0) Result(4, "folder name too big");

if (empty($_POST['photo'])) Result(5, "no folder");
if (strlen($_POST['photo']) == 0) Result(6, "empty folder name");
if (strlen($_POST['photo']) > 0) Result(7, "folder name too big");

if (empty($_POST['text'])) Result(8, "no text");
if (strlen($_POST['text']) == 0) Result(9, "empty text");
if (strlen($_POST['text']) > 1000) Result(10, "text too big");

$folder_name = $_POST['folder_name'];
$photo = $_POST['photo'];
$text = $_POST['text'];
$username = Users::whichUser();

try {
    CommentsDB::GetInstance()->AddComment($folder_name, $photo, $username, $text); 
} catch (Exception $ex) {
    Result(11, "internal error");
}

Result(0, "Success");