<?php
require_once('../../app.php');

use UserSystem\Classes\Models\Message;
use UserSystem\Classes\Models\Users;

$user = new Users;
$message = new Message;

if ($request->postHas('action') && $request->post('action') == 'register') {
    $name = $request->post('name');
    $email = $request->post('email');
    $password = $request->post('password');
    $hpass = password_hash($password, PASSWORD_DEFAULT);

    if ($user->user_exist($email) > 0) {
        //error
        echo $message->showMessage('warning', 'This E-Mail is already registered!!');
        // echo json_encode(array('success' => 1));
    } else {
        $user->insert('name,email,password', "'$name', '$email', '$hpass'");
        echo 'register';
        $session->set('user', $email);
        // echo json_encode(array('success' => 0));
    }
} else {
    //error
    echo $message->showMessage('danger', 'Something went wrong! try again later!');
    // echo json_encode(array('success' => 1));
}
