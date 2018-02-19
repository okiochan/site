<?php
require_once __DIR__ . '/include.php';

class DB {
    private static $db = null;
    
    public static function OpenDB() {
        if (self::$db == null) {
            self::$db = new SQLite3(__DIR__ . '/data.db');
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
        
        error_log("hello");
        
        $stmt = $db->prepare('SELECT username FROM users WHERE username=:1');
        $stmt -> bindParam(':1',$username);
        $res = $stmt -> execute();
        
        $row = $res->fetchArray();
        if($row == false){
            return false;
        }
        return true;
    }

    public static function dbAddUser($username, $pass) {
        $db = self::OpenDB();
        
        if( self::dbCheckUserExist($username) == true) {
            return 0;
        }
        
        if(self::dbValidPass($pass) == false) {
            return -1;
        }
        
        $salt = self::dbGenerateSalt();
        $pass = self::dbPassToHash($pass, $salt);
        
        $stmt = $db->prepare('INSERT INTO users (username,password,salt) VALUES (:1,:2,:3)');
        $stmt -> bindParam(':1',$username);
        $stmt -> bindParam(':2',$pass);
        $stmt -> bindParam(':3',$salt);
        $stmt -> execute();
        return 1;
    }

    private static function dbValidPass($pass) {
        if( strlen($pass) <= MIN_PASS_LEN ) {
            return false;
        }
        return true;
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

