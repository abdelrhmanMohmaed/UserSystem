<?php
require_once('../app.php');
if ($session->notHas('username')) {
    $request->aredirect("");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $title = basename($_SERVER['PHP_SELF'], '.php');
    $title = explode('-', $title);
    $title = ucfirst($title[1]);
    ?>
    <title><?= $title; ?> | Admin Panal</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="admin-nav p-0 ">
                <h4 class="text-light text-center p-2">Admin Panel</h4>
                <div class="list-group list-group-flush">
                    <a href="<?= AURL . "admin-dashboard.php" ?>" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) ==   "admin-dashboard.php") ? "nav-active" : ""; ?> "><i class="fas fa-chart-pie"></i>&nbsp;&nbsp;Dashboard</a>
                    <a href="<?= AURL . "admin-users.php" ?>" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) ==   "admin-users.php") ? "nav-active" : ""; ?> "><i class="fas fa-user-friends"></i>&nbsp;&nbsp;Users</a>
                    <a href="<?= AURL . "admin-notes.php" ?>" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) ==   "admin-notes.php") ? "nav-active" : ""; ?> "><i class="fas fa-sticky-note"></i>&nbsp;&nbsp;Notes</a>
                    <a href="<?= AURL . "admin-feedback.php" ?>" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) ==   "admin-feedback.php") ? "nav-active" : ""; ?> "><i class="fas fa-comment"></i>&nbsp;&nbsp;Feedback</a>
                    <a href="<?= AURL . "admin-notification.php" ?>" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) ==   "admin-notification.php") ? "nav-active" : ""; ?> "><i class="fas fa-bell"></i>&nbsp;&nbsp;Notification</a>
                    <a href="<?= AURL . "admin-deleteduser.php" ?>" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) ==   "admin-deleteduser.php") ? "nav-active" : ""; ?> "><i class="fas fa-user-slash"></i>&nbsp;&nbsp;Deleted Users</a>
                    <a href="#" class="list-group-item text-light admin-link"> <i class="fas fa-table"></i>&nbsp;&nbsp;Export Users</a>
                    <a href="#" class="list-group-item text-light admin-link"> <i class="fas fa-id-card"></i>&nbsp;&nbsp;Profile</a>
                    <a href="#" class="list-group-item text-light admin-link"> <i class="fas fa-cog"></i>&nbsp;&nbsp;Setting</a>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-lg-12 bg-primary pt-2 justify-content-between d-flex">
                        <a href="#" class="text-white" id="open-nav">
                            <h3>
                                <i class="fas fa-bars"></i>
                            </h3>
                        </a>
                        <h4 class="text-light"><?= $title; ?></h4>
                        <a href="<?= AURL ?>handler/logout.php" class="text-light mt-1">
                            <i class="fas fa-sign-out-alt"></i>
                            &nbsp;Logout
                        </a>
                    </div>
                </div>