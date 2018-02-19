<?php
session_start();

define("DB_COMMENTS_PATH", __DIR__ . "/comments.db");


define("MIN_PASS_LEN", 4);

require_once __DIR__ . "/cookie_work.php";
require_once __DIR__ . "/DB.php";
// require_once __DIR__ . "/login_user.php";
// require_once __DIR__ . "/register_user.php";