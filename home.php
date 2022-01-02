<?php
include("inc/header.php"); 
?>



<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- alert for verified email or no -->
            <?php if ($data['verified'] == 0) : ?>
                <div class="alert alert-danger alert-dismissible text-center mt-2 m-0">
                    <button class="close" type="button" data-dismiss="alert">&times;</button>
                    <strong>Your E-mail is not verified! We've send you an E-mail
                        Verification link on your E-mail, check & verify now!
                    </strong>
                </div>
            <?php endif ?>
            <h4 class="text-center text-primary mt-2">Write Your Notes Here &
                Access Anytime Anywhere!
            </h4>
        </div>
    </div>
    <!-- start cart -->
    <div class="card border-primary">

        <h5 class="card-header bg-primary d-flex justify-content-between">
            <span class="text-light lead align-self-center">All Notes</span>
            <a href="#" class="btn btn-light" data-toggle="modal" data-target="#addNoteModal"><i class="fas fa-plus-circle fa-lg"></i>&nbsp;Add New Note</a>
        </h5>
        <div class="card-body">
            <div class="table-responsive" id="showNote">

            </div>
        </div>
        <!-- End cart -->
    </div>
</div>
<!-- start add a new modal to add new note -->
<div class="modal fade" id="addNoteModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title text-light">Add New Note</h4>
                <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="add-note-form" class="px-3">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control form-control-lg" placeholder="Enter Title" required>
                    </div>
                    <div class="form-group">
                        <textarea name="note" rows="6" class="form-control form-control-lg" placeholder="Write Your Note Here...." required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="addNote" id="addNoteBtn" value="Add Note" class="btn btn-success btn-block btn-lg">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end add a new modal to add new note -->

<!-- start edit Note Modal -->
<div class="modal fade" id="editNoteModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-light">Edit Note</h4>
                <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="edit-note-form" class="px-3">
                    <input type="hidden" name="id" value="" id="id">
                    <div class="form-group">
                        <input type="text" name="title" id="title" class="form-control form-control-lg" placeholder="Enter Title" required>
                    </div>
                    <div class="form-group">
                        <textarea name="note" rows="6" id="note" class="form-control form-control-lg" placeholder="Write Your Note Here...." required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="editNote" id="editNoteBtn" value="Update Note" class="btn btn-info btn-block btn-lg">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end edit Note Modal -->

<?php include("inc/footer.php"); ?>