<?php
require_once __DIR__ . '/../php/include.php';

$recieved_login = $_POST['login'];
$recieved_pass = $_POST['pass'];

function TryLogin($username, $pass) {  

    $user = null;
    if( DB::dbCheckUserExist($username) ) {
        $user = $username;
    }
    if( DB::dbCheckEmailExist($username) ) {
        $user = DB::dbGetUsernameByEmail($username);
        if($user == -1) {
            echo ('error');
            return;
        }
    }
    
    if($user == null) {
        echo('userNotFound');
        return;
    }
    
    if( DB::dbCheckPass($user, $pass) == true) {
        if(Users::isLogged() == false) {
            echo('cookieDisabled');
        }
        Users::loginUser($user);
        echo ('success');
    } else {
        echo ('error');
    }
}

TryLogin($recieved_login, $recieved_pass);
 