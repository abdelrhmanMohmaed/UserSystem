<?php
include("inc/header.php");
include("inc/AllDataOfUser.php");
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 mt-3">
            <?php if ($verified == 'Verified') : ?>
                <div class="card border-primary">
                    <div class="card-header lead text-center bg-center bg-primary text-white">
                        Send Feedback to Admin!
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="feedback-form">
                            <div class="form-group">
                                <input type="text" name="subject" placeholder="Write Your Subject" class="form-control-lg form-control rounded-0" required id="">
                            </div>
                            <div class="form-group">
                                <textarea name="feedback" id="" placeholder="Write Your Feedback Here...." class="form-control form-control-lg" rows="8" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="feedbackBtn" value="Send Feedback" class="btn btn-block btn-primary btn-lg rounded-0" required id="feedbackBtn">
                            </div>
                        </form>
                    </div>
                </div>
            <?php else : ?>
                <h1 class="text-center text-secondary mt-5">Verify Your E-Mail First To Send Feedback to Admin!!</h1>
            <?php endif ?>
        </div>
    </div>
</div>

<?php include("inc/footer.php"); ?>