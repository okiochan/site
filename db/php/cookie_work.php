<?php

class COO {
    public static function checkCookie() {
    if(count($_COOKIE) > 0) {
    return true;
    }
    return false;
}

    public static function loginUser($username) {
        $_SESSION['user_logged'] = $username;
    }

    public static function logoutUser() {
        unset($_SESSION['user_logged']);
    }
}
