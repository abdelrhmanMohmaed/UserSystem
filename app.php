<?php
// dynamic URL AND PATH 
define("PATH", __DIR__ . "/");
define("URL", "http://localhost/UserSystem/");

// admin URL AND PATH 
define("APATH", __DIR__ . "/admin/");
define("AURL", "http://localhost/UserSystem/admin/");

// db details 
define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "db-user-system");

require_once(PATH . "vendor/autoload.php");

use UserSystem\Classes\Models\Admin;
use UserSystem\Classes\Models\Users;
use UserSystem\Classes\Session;
use UserSystem\Classes\Request;

$session = new Session;
$request = new Request;
$user = new Users;
$admin = new Admin;


