<?php
include("inc/header.php");
include("inc/AllDataOfUser.php");
?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card rounded-0 mt-3 border-primary">
                <div class="card-header border-primary">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active font-weight-bold" data-toggle="tab">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="#editProfile" class="nav-link   font-weight-bold" data-toggle="tab">Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="#changePass" class="nav-link   font-weight-bold" data-toggle="tab">Change Password</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <!-- profile Tab Content Start -->
                        <div class="tab-pane container active" id="profile">
                            <div class="card-deck">
                                <div class="card border-primary">
                                    <div class="card-header bg-primary text-light text-center lead">
                                        User ID : <?= $uid; ?>
                                    </div>
                                    <div class="card-body">
                                        <p class="custom-border card-text p-2 m-1 rounded"><b>Name : </b><?= $uname; ?></p>
                                        <p class="custom-border card-text p-2 m-1 rounded"><b>E-Mail : </b><?= $uemail; ?></p>
                                        <p class="custom-border card-text p-2 m-1 rounded"><b>Gender : </b><?= $ugender; ?></p>
                                        <p class="custom-border card-text p-2 m-1 rounded"><b>Date of Birth : </b><?= $udob; ?></p>
                                        <p class="custom-border card-text p-2 m-1 rounded"><b>Phone : </b><?= $uphone; ?></p>
                                        <p class="custom-border card-text p-2 m-1 rounded"><b>Regsitered On : </b><?= date('d M Y', strtotime($ucreated_at))  ?></p>
                                        <p class="custom-border card-text p-2 m-1 rounded"><b>E-Mail Verified: </b><?= $verified  ?>
                                            <?php if ($verified == "Not Verified") : ?>
                                                <a href="#" id="verify-email" class="float-right">Verify Now</a>
                                            <?php endif ?>
                                        </p>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                                <div class="card border-primary align-self-center">
                                    <?php if (!$uphoto) : ?>
                                        <img src="<?= URL . "assets/img/2.jpg" ?>" class="img-thumbnail img-fluid" width="408px">
                                    <?php else : ?>
                                        <img src="<?= URL . 'handler/process/' . $uphoto; ?>" class="img-thumbnail img-fluid" width="408px">
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <!-- profile Tab Content End -->
                        <!-- Edit profile Tab Content Start -->
                        <div class="tab-pane container fade" id="editProfile">
                            <div class="card-deck">
                                <div class="card border-danger align-self-center">
                                    <?php if (!$uphoto) : ?>
                                        <img src="<?= URL . "assets/img/2.jpg" ?>" class="img-thumbnail img-fluid" width="408px">
                                    <?php else : ?>
                                        <img src="<?= URL . 'handler/process/' . $uphoto; ?>" class="img-thumbnail img-fluid" width="408px">
                                    <?php endif ?>
                                </div>
                                <div class="card border-danger">
                                    <form action="" method="post" class="px-3 mt-2" enctype="multipart/form-data" id="profile-update-form">
                                        <input type="hidden" name="oldimage" value="<?= $uphoto; ?>">
                                        <div class="form-group m-0">
                                            <label for="profilephoto" class="m-1">Upload Profile Image</label>
                                            <input type="file" name="image" id="profilePhoto">
                                        </div>
                                        <div class="form-group m-0">
                                            <label for="name" class="m-1">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" value="<?= $uname; ?>">
                                        </div>
                                        <div class="form-group m-0">
                                            <label for="gender" class="m-1">Gender</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="" disabled <?php if ($ugender == null) {
                                                                                echo "selected";
                                                                            } ?>>Select</option>
                                                <option value="Male" <?php if ($ugender == "Male") {
                                                                            echo "selected";
                                                                        } ?>>Male</option>
                                                <option value="Female" <?php if ($ugender == 'Female') {
                                                                            echo "selected";
                                                                        } ?>>Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group m-0">
                                            <label for="dob" class="m-1">Date of Birth</label>
                                            <input type="date" name="dob" id="dob" class="form-control" value="<?= $udob; ?>">
                                        </div>
                                        <div class="form-group m-0">
                                            <label for="phone" class="m-1">Phone</label>
                                            <input type="tel" name="phone" id="phone" class="form-control" value="<?= $uphone; ?>" placeholder="Phone">
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="submit" name="profile_update" value="Update Profile" id="updateProfileBtn" class="form-control btn btn-danger btn-block">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Edit profile Tab Content End -->
                        <!-- change password Tab Content start -->

                        <div class="tab-pane container fade" id="changePass">
                            <div id="changepassAlert"></div>
                            <div class="card-deck">
                                <div class="card border-success">
                                    <div class="card-header bg-success text-white text-center lead">
                                        Change Password
                                    </div>
                                    <!-- id="curpass" -->
                                    <form action="" method="post" class="px-3 mt-2" id="change-pass-form">
                                        <div class="form-group">
                                            <label for="curpass">Enter Your Current Password</label>
                                            <input type="password" name="curpass" id="" placeholder="Current Password" class="form-control form-control-lg" id="curpass" required minlength="5">
                                        </div>

                                        <div class="form-group">
                                            <label for="newpass">Enter New Password</label>
                                            <input type="password" name="newpass" id="newpass" placeholder="New Password" class="form-control form-control-lg" id="newpass" required minlength="5">
                                        </div>

                                        <div class="form-group">
                                            <label for="cnewpass">Enter New Password</label>
                                            <input type="password" name="cnewpass" id="cnewpass" placeholder="Confirm New Password" class="form-control form-control-lg" id="cnewpass" required minlength="5">
                                        </div>
                                        <div class="form-group">
                                            <p id="changepassError" class="text-denger"></p>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="changepass" value="Change Password" id="changePassBtn" class="btn btn-success btn-block btn-lg">
                                        </div>
                                    </form>
                                </div>
                                <div class="card border-success align-self-center">
                                    <img src="<?= URL . "assets/img/3.jpg" ?>" class="img-thumbnail img-fluid" width="408px" alt="" srcset="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("inc/footer.php"); ?>