<?php

use UserSystem\Classes\Models\Admin;
use UserSystem\Classes\Models\Message;

require_once('../../app.php');
$admin = new Admin;
$message = new Message;

if ($request->postHas('action') && $request->postHas('action') == 'adminLogin') {
    $username = $request->post('username');
    $password = $request->post('password');

    $hpassword = sha1($password);
    // check admin can login or no 
    $loggedInAdmin =   $admin->admin_login($username, $hpassword);

    if ($loggedInAdmin != null) {
        echo 'admin_login';
        $session->set('username', $username);
    } else {

        echo $message->showMessage('danger', 'Username or Password is incorrect!');
    }
}
