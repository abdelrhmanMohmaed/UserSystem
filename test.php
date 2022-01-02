<?php

use UserSystem\Classes\Models\Message;
use UserSystem\Classes\Models\Notes;
use UserSystem\Classes\Models\Notification;
use UserSystem\Classes\Models\Users;

require_once('./app.php');


include("./inc/AllDataOfUser.php");

$note = new Notes;
$message = new Message;
$allNotification = new Notification;
$userId = $uid;

