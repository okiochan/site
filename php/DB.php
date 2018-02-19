<?php
require_once __DIR__ . '/include.php';

class DB {
    private static $db = null;

    public static function OpenDB() {
        if (self::$db == null) {
            self::$db = new SQLite3(DB_USERS_PATH);
        }
        return self::$db;
    }

    public static function dbCheckPass($username, $pass) {
        $db = self::OpenDB();

        $stmt = $db->prepare('SELECT username,password,salt FROM users WHERE username=:1');
        $stmt -> bindParam(':1',$username);
        $res = $stmt -> execute();
        $row = $res->fetchArray();
        if($row == false){
            return false; //!!
        }
        $goodpass = $row['password'];
        $pass = self::dbPassToHash($pass, $row['salt']);
        if($goodpass == $pass) {
            return true;
        }
        return false;
    }

    public static function dbCheckUserExist($username) {
        $db = self::OpenDB();

        $stmt = $db->prepare('SELECT username FROM users WHERE username=:1');
        $stmt -> bindParam(':1',$username);
        $res = $stmt -> execute();

        $row = $res->fetchArray();
        if($row == false){
            return false;
        }
        return true;
    }
    
    public static function dbCheckEmailExist($email) {
        $db = self::OpenDB();

        // error_log("hello");
        $stmt = $db->prepare('SELECT email FROM users WHERE email=:1');
        $stmt -> bindParam(':1',$email);
        $res = $stmt -> execute();

        $row = $res->fetchArray();
        if($row == false){
            return false;
        }
        return true;
    }

    public static function dbAddUser($username, $pass, $email) {
        $db = self::OpenDB();

        if( self::dbCheckUserExist($username) == true) {
            return 0;
        }
        if( self::dbCheckEmailExist($email) == true) {
            return -1;
        }
        
        $salt = self::dbGenerateSalt();
        $pass = self::dbPassToHash($pass, $salt);

        $stmt = $db->prepare('INSERT INTO users (username,password,salt,email) VALUES (:1,:2,:3,:4)');
        $stmt -> bindParam(':1',$username);
        $stmt -> bindParam(':2',$pass);
        $stmt -> bindParam(':3',$salt);
        $stmt -> bindParam(':4',$email);
        $stmt -> execute();
        return 1;
    }

    private static function dbPassToHash($pass, $salt) {
        $res = hash('sha256',$pass.$salt);
        return $res;
    }

    private static function dbGenerateSalt() {
        $res ='';
        for($i=0; $i < 64; $i++) {
            $c = rand( ord('a'), ord('z') );
            $c = chr ($c);
            $res = $res.$c;
        }
        return $res;
    }
}

