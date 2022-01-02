<?php
require_once('../app.php');
if ($session->has('username')) {
    $request->aredirect("admin-dashboard.php");
    die();
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Admin</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index.css">

</head>

<body class="bg-dark">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-lg-5">
                <div class="card border-danger shadow-lg">
                    <div class="card-header bg-danger">
                        <h3 class="m-0 text-white">
                            <i class="fas fa-user-cog"></i>&nbsp;Admin Panal Login
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="admin-login-form">
                            <div id="adminLoginAlert"></div>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control form-control-lg rounded-0" placeholder="Username" required autofocus id="">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-lg rounded-0" placeholder="Password" required id="">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Login" id="adminLoginBtn" class="btn btn-block btn-danger btn-lg rounded-0">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery CDN -->
    <script src="../assets/js/jQ.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <!-- font awsome -->
    <script src="../assets/js/all.min.js"></script>
    <!-- script ajax request  -->
    <script src="assets/js/login.js"></script>
</body>

</html>