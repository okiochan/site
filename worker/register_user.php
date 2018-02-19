<?php
require_once __DIR__ . '/../php/include.php';

$recieved_login = $_POST['login'];
$recieved_pass = $_POST['pass'];

function addUserToDB($username, $pass) {
    $res = DB::dbAddUser($username, $pass);
    if( $res == 0) {
        echo ('userExist');
    } else if( $res == -1) {
        echo ('passIncorrect');
    } else {
        echo('success');
    }
}

addUserToDB($recieved_login, $recieved_pass);
