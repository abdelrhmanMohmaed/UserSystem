<?php

use UserSystem\Classes\Models\Feedback;
use UserSystem\Classes\Models\Notification;

require_once('../../app.php');
include('../../inc/AllDataOfUser.php');

$feedback = new Feedback;
$notification = new Notification;
$userId = $uid;


if ($request->postHas('action') && $request->postHas('action') == 'feedback') {
    $subject = $request->post('subject');
    $f_Back = $request->post('feedback');
    $userId = $uid;
    $feedback->insert('uid,subject,feedback', "'$userId','$subject','$f_Back'");
    // notification to admin user add feedback in db
    $notification->insert('uid,type,message', "'$userId','admin','Feedback written'");
}
