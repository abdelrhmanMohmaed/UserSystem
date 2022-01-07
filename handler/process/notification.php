<?php

use UserSystem\Classes\Models\Message;
use UserSystem\Classes\Models\Notes;
use UserSystem\Classes\Models\Notification;

require_once('../../app.php');
include("../../inc/AllDataOfUser.php");

$note = new Notes;
$message = new Message;
$allNotification = new Notification;
$userId = $uid;
// set notes in db
if ($request->postHas('action') && $request->post('action') == 'fetchNotification') {
    $notification = $allNotification->fetchNotification($userId);
    $output = '';

    if ($notification) {

        foreach ($notification as $row) {
            $output .= '   <div class="alert alert-danger" role="alert">
            <button type="button" class="close" id="' . $row['id'] . '" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="alert-heading">New Notification</h4>
            <p class="mb-0 lead">' . $row['message'] . '</p>
            <hr class="mhy-2">
            <p class="mb-0 float-left">Reply of feedback from Admin</p>
            <p class="mb-0 float-right">' . $message->timeInAgo($row['created_at']) . '</p>
            <div class="clearfix"></div>
        </div>';
        }
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary mt-5">No any new notification</h3>';
    }
}

// chech notification 
if ($request->postHas('action') && $request->post('action') == 'checkNotification') {
    if ($allNotification->fetchNotification($userId)) {
        echo '<i class="fas fa-circle fa-sm text-danger"></i>';
    } else {
        echo "";
    }
}

// Remove Notification 
if ($request->postHas('notification_id')) {
    $id = $request->post('notification_id');
    $type = 'user';
    $allNotification->removeNotification($id, $type);
};
