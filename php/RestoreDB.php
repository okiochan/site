<?php
require_once __DIR__ . '/include.php';

class DBrestore{
    private static $db = null;

    public static function OpenDB() {
        if (self::$db == null) {
            self::$db = new SQLite3(DB_RESTORE_PATH);
        }
        return self::$db;
    }   
   
    public static function dbAddRequest($username, $salt) {
        $db = self::OpenDB();
        $stmt = $db->prepare('INSERT INTO users (username,salt) VALUES (:1,:2)');
        $stmt -> bindParam(':1',$username);
        $stmt -> bindParam(':2',$salt);
        $stmt -> execute();
    }
    
    public static function dbCheckSalt($username, $recieved_salt) {
    $db = self::OpenDB();

    $stmt = $db->prepare('SELECT username,salt FROM users WHERE salt=:1');
    $stmt -> bindParam(':1',$recieved_salt);
    $res = $stmt -> execute();
    $row = $res->fetchArray();
    
    if($row == false){
        return false;
    }
    
    $good_username = $row['username'];
    if($username== $good_username) {
        return true;
    }
    
    return false;
    }

}

