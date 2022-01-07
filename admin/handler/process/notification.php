<?php

require_once('../../../app.php');

//fetch all feedback of Users 
if ($request->postHas('action') && $request->postHas('action') == 'fetchAllnotification') {

    $allNotification = $notification->fetchNotificationJoinUser();
    $output = '';

    if ($allNotification) {

        foreach ($allNotification as $row) {
            $output .= '<div class="alert alert-dark" role="alert">
            <button type="button" class="close" id="' . $row['id'] . '" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="alert-heading">New Notification</h4>
            <p class="mb-0 lead">' . $row['message'] . 'by' . $row['name'] . '</p>
            <hr class="mhy-2">
            <p class="mb-0 float-left"><b>User E-Mail :</b> ' . $row['email'] . '</p>
            <p class="mb-0 float-right">' . $message->timeInAgo($row['created_at']) . '</p>
            <div class="clearfix"></div>
        </div>';
        }
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary mt-5">No any new notification</h3>';
    }
}
// check Notification
if ($request->postHas('action') && $request->postHas('action') == ' checkNotification') {
    if ($notification->fetchNotificationJoinUser()) {
        return true;
    };
}

// Remove notifiction 
if ($request->postHas('notification_id')) {
    $id = $request->post('notification_id');
    $type = 'admin';
    $notification->removeNotification($id, $type);
}
