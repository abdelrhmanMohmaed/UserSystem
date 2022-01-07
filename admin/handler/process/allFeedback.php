<?php

require_once('../../../app.php');

//fetch all feedback of Users 
if ($request->postHas('action') && $request->postHas('action') == 'fethAllFeedback') {
    $output = '';


    $feedback = $feedback->fetchFeedback();
    if ($feedback) {
        $output .= '
                <table class="table table-striped table-bordered texe-center" id="noteTable" >
                    <thead>
                        <tr>
                        <th>FID</th> 
                        <th>UID</th>
                        <th>User Name</th>
                        <th>User E-Mail</th>
                        <th>Subject</th>
                        <th>Feedback</th>
                        <th>Sent On</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
        foreach ($feedback as $index => $row) {
            $output .= ' 
                        <tr>
                            <td>' . $row['id']  . '</td>
                            <td>' . $row['uid']  . '</td>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['subject'] . '</td>
                            <td>' . $row['feedback'] . '</td>
                            <td>' . $row['created_at'] . '</td>
                            <td> 
                                <a href="#" fid="' . $row['id'] . '" id="' . $row['uid'] . '" title="Reply" 
                                    class="text-info text-white replyFeedbackIcon" 
                                        data-toggle="modal" data-target="#showReplyModal"> 
                                            <i class="fas fa-reply fa-lg"></i>
                                </a> 
                            </td>
                        </tr>';
        }
        $output .= '</tbody>
                </table>';
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( No any feedback written yet !</h3>';
    }
}

// Reply Feedback to User 
if ($request->postHas('message')) {
    $uid = $request->post('uid');
    $message = $request->post('message');
    $fid = $request->post('fid');

    $notification->replyFeedback($uid, $message);
    $feedback->feedbackReplied($fid);
}
