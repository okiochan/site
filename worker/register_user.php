<?php
require_once __DIR__ . '/../php/include.php';

$recieved_login = $_POST['login'];
$recieved_pass = $_POST['pass'];
$recieved_email = $_POST['email'];

function addUserToDB($username, $pass, $email) {
    $res = DB::dbAddUser($username, $pass, $email);
    if ($res == 0) {
        echo ('userExist');
    }else if ($res == -1) {
        echo ('emailExist');
    } if ($res == 1) {
        echo('success');
    } else {
        echo('error');
    }
}

addUserToDB($recieved_login, $recieved_pass, $recieved_email);
