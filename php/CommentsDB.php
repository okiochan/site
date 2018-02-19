<?php

// DATE TIME FORMAT: "Y-m-d\TH:i:sP" (DateTime::ATOM)
// TIME ZONE: UTC
require_once __DIR__ . "/include.php";

class CommentsDB {
    private static $instance;

    public static function GetInstance() {
        if (self::$instance == null) {
            self::$instance = new CommentsDB();
        }
        return self::$instance;
    }

    private $db;

    private function CommentsDB() {
        try {
            $this->db = new SQLite3(DB_COMMENTS_PATH);
        } catch (Exception $ex) {
            error_log("Database error " . $ex->getMessage());
        }
    }

    public function AddComment($folder_name, $photo, $username, $text) {
        $time = (new DateTime())->format(DateTime::ATOM);
        $stmt = $this->db->prepare('INSERT INTO comments(folder_name,photo,time,text,username) VALUES (:folder_name,:photo,:time,:text,:username)');
        if($stmt === false) throw new Exception($this->db->lastErrorMsg());

        if ($stmt->bindParam(":folder_name",$folder_name) === false ||
            $stmt->bindParam(":photo",$photo) === false ||
            $stmt->bindParam(":time",$time) === false ||
            $stmt->bindParam(":text",$text) === false ||
            $stmt->bindParam(":username",$username) === false) throw new Exception($this->db->lastErrorMsg());
        
        if ($stmt->execute() === false) throw new Exception($this->db->lastErrorMsg());
    }
    
    public function GetComments($folder_name, $photo) {
        $stmt = $this->db->prepare('SELECT id,time,text,username FROM comments WHERE folder_name=:folder_name AND photo=:photo');
        if($stmt === false) throw new Exception($this->db->lastErrorMsg());

        if ($stmt->bindParam(":folder_name",$folder_name) === false ||
            $stmt->bindParam(":photo",$photo) === false) throw new Exception($this->db->lastErrorMsg());
        
        $res = $stmt->execute();
        if ($res === false) throw new Exception($this->db->lastErrorMsg());
        
        while (($row = $res->fetchArray(SQLITE3_ASSOC))) {
            $ret[] = $row;
        }
        return $ret;
    }
}

// tests
// $dt = new DateTime();
// print($dt->format(DateTime::ATOM));
// CommentsDB::GetInstance();
// var_dump(CommentsDB::GetInstance());
// CommentsDB::GetInstance()->AddComment("Sergey","photo","user", "hello!!!");
// print_r(CommentsDB::GetInstance()->GetComments("Sergey","photo"));