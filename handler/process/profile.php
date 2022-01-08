<?php

use UserSystem\Classes\Models\Message;
use UserSystem\Classes\Models\Notification;

require_once('../../app.php');
include("../../inc/AllDataOfUser.php");


$message = new Message;
//used uid by include all data in session
$notification = new Notification;
$userId = $uid;

// heandle profile Update 
if (isset($_FILES['image'])) {

    $name = $request->post('name');
    $gender = $request->post('gender');
    $dob = $request->post('dob');
    $phone = $request->post('phone');

    $oldImage = $request->post('oldimage');

    $folder = 'uploads/';

    if (isset($_FILES['image']['name']) && ($_FILES['image']['name'] != "")) {
        $newImage = $folder . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $newImage);

        if ($oldImage != null) {
            unlink($oldImage);
        }
    } else {
        $newImage = $oldImage;
    }
    $user->update_profile($name, $gender, $dob, $phone, $newImage, $userId);
    // notification to admin user Profile update in db
    $notification->insert('uid,type,message', "'$userId','admin','Profile Updatee'");
    // echo "update";
}

// heandle update password 
if ($request->postHas('action') && $request->postHas('action') == 'change_pass') {
    $oldPassword = $request->post('curpass');
    //check password in Db
    if (password_verify($oldPassword, $upassword)) {
        $newPassword = $request->post('newpass');
        $cNewPassword = $request->post('cnewpass');
        // check the password === confirm password 
        if ($newPassword === $cNewPassword) {
            // echo $newPassword;
            $password = password_hash($newPassword, PASSWORD_DEFAULT);
            //update a new password  
            $user->update_password($password, $uid);
            echo $message->showMessage('success', 'Password Change Successfuly..!');
            // notification to admin user Profile update in db
            $notification->insert('uid,type,message', "'$userId','admin','Password change'");
            //destory all session dute to login agen 
            $session->destroy();
        } else {
            echo $message->showMessage('danger', 'password did not matched..!');
        }
    } else {
        echo $message->showMessage('danger', 'Current Password Is Wrong..!');
    }
}
// check user is logged in or not
if ($request->postHas('action') && $request->postHas('action') == 'checkUser') {
    if (!$user->user_exist($uemail)) {
        echo 'bye';
        $session->remove('user');
    }
} 