<?php

use UserSystem\Classes\Models\Users;

$uemail = $session->get('user');
$user = new Users;

// udata where email
$data = $user->select_email($uemail);
$uid = $data['id'];
$uname = $data['name'];
$uemail = $data['email'];
$upassword = $data['password'];
$uphone = $data['phone'];
$ugender = $data['gender'];
$udob = $data['dob'];
$uphoto = $data['photo'];
$utoken = $data['token'];
$utoken_expire = $data['token_expire'];
$ucreated_at = $data['created_at'];
$uverified = $data['verified'];
$udeleted = $data['deleted'];


if ($uverified == 0) {
    $verified  = 'Not Verified';
} else {
    $verified = 'Verified';
}
