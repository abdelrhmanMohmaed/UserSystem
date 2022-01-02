<?php

use UserSystem\Classes\Models\Message;
use UserSystem\Classes\Models\Users;


require_once("../../app.php");
$user = new Users;
$message = new Message;     

if ($request->postHas('action') && $request->post('action') == 'login') {
    $email = $request->post('email');
    $pass = $request->post('password');
    $loggedInUser = $user->login($email);
    if ($loggedInUser != null) {
        if (password_verify($pass, $loggedInUser['password'])) {
            if (!empty($request->PostAll('rem'))) {
                setcookie("email", $email, time() + (30 * 24 * 60 * 60), '/');
                setcookie("password", $pass, time() + (30 * 24 * 60 * 60), '/');
            } else {
                setcookie("email", "", 1, '/');
                setcookie("password", "", 1, '/');
            }
            echo "login";
            $session->set('user', $email);
        } else {
            echo $message->showMessage('danger', 'Password is incorrect!');
        }
    } else {
        echo $message->showMessage('danger', 'User not found 404!');
    }
}
