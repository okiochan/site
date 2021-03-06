<?php
session_start();

define("DB_COMMENTS_PATH", __DIR__ . "/comments.db");
define("DB_USERS_PATH", __DIR__ . "/users.db");
define("DB_RESTORE_PATH", __DIR__ . "/restored_pass.db");

define("MIN_PASS_LEN", 4);

require_once __DIR__ . "/DB.php";
require_once __DIR__ . "/Users.php";
require_once __DIR__ . "/CommentsDB.php";
require_once __DIR__ . "/RestoreDB.php";

