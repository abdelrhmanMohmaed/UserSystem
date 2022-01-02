<?php
include("inc/header.php");
include("inc/AllDataOfUser.php");
?>
<div class="container">
    <div class="row justify-content-center my-2">
        <div class="col-lg-6 mt-4" id="showAllNotification">
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="alert-heading">New Notification</h4>
                <p class="mb-0 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium quos earum animi obcaecati, alias illo itaque officiis optio aperiam quod.</p>
                <hr class="mhy-2">
                <p class="mb-0 float-left">Reply of feedback from Admin</p>
                <p class="mb-0 float-right">1 minute ago</p>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<?php
include("inc/footer.php");
?>