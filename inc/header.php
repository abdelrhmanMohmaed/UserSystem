<?php

require_once("app.php");

include("./inc/AllDataOfUser.php");

if ($session->notHas('user')) {
    $request->redirect("");
    die();
} else {
    $cemail = $session->get('user');
    $data = $user->select_email($cemail);
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst(basename($_SERVER['PHP_SELF'], '.php')); ?> | UserSystem </title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/css.css">

    <style>
        @import url("https://fonts.googleapis.com/css?family=Maven+Pro:400,500,600,700,800,900&display=swap");

        * {
            font-family: "Maven Pro", sans-serif;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= URL ?>"><i class="fas fa-code fa-lg"></i> UserSystem</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item ">
                    <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) ==   "home.php") ? "active" : ""; ?> " href="<?= URL . "home.php" ?>"><i class="fas fa-home"></i>&nbsp;Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) ==  "profile.php") ? "active" : ""; ?>" href="<?= URL . "profile.php" ?>"><i class="fas fa-user-circle"></i>&nbsp;Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) ==   "feedback.php") ? "active" : ""; ?>" href="<?= URL . "feedback.php" ?>"><i class="fas fa-comment-dots"></i>&nbsp;FeedBack</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) ==  "natification.php") ? "active" : ""; ?>" href="<?= URL . "natification.php" ?>"><i class="fas fa-bell"></i>&nbsp;Natification&nbsp;<span id="checkNotification"></span></a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                        <i class="fas fa-user-cog"></i>&nbsp;Hi! <?= strtok($uname, " ");  ?>
                    </a>
                    <div class="dropdown-menu">
                        <a href="<?= "setting.php" ?>" class="dropdown-item"><i class="fas fa-cog"></i>&nbsp;
                            Setting</a>
                        <a href="<?= URL . "handler/auth/logOut.php" ?>" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>&nbsp;
                            Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>