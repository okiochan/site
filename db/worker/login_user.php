<?php
require_once __DIR__ . '/../db/php/include.php';

$recieved_login = $_POST['login'];
$recieved_pass = $_POST['pass'];


function TryLogin($username, $pass) {  
    if( DB::dbCheckUserExist($username) == false) {
        echo('userNotFound');
        return;
    }
    if( DB::dbCheckPass($username, $pass) == true) {
        if(COO::checkCookie() == false) {
            echo('cookieDisabled');
        }
        COO::loginUser($username);
        echo ('success');
    } else {
        echo ('error');
    }
}

TryLogin($recieved_login, $recieved_pass);
