<?php include('inc/header.php'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card my-2 border-warning">
            <div class="card-header bg-warning text-white">
                <h4 class="m-0">Totel Feedback From Users</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="showAllFeedback">
                    <p class="text-center align-self-center lead">
                        Please Wait.....
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Reply Feedback Model  -->
<div class="modal fade" id="showReplyModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reply Thin Feedback</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="feedback-reply-form">
                    <div class="form-group">
                        <textarea name="message" id="message" class="form-control" rows="6" placeholder="Write your message here..." required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Reply" class="btn btn-primary btn-block" id="feedbackReplyBtn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('inc/footer.php'); ?>
<script src="assets/js/admin-feedback.js"></script>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/sweet-alert.js"></script>
