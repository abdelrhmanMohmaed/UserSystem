//start home page and ajax 
$(document).ready(function () {
    //Start Add new Ajex Request
    $('#addNoteBtn').click(function (e) {
        if ($('#add-note-form')[0].checkValidity()) {
            e.preventDefault();
            $("#addNoteBtn").val('Please Wait....');
            $.ajax({
                url: "handler/process/note.php",
                method: "POST",
                data: $("#add-note-form").serialize() + "&action=add-note",
            }).then(function (response) {
                // console.log(response);  
                $('#addNoteBtn').val('Add Note');
                $('#add-note-form')[0].reset();
                $('#addNoteModal').modal('hide');
                // alert in Sweet
                Swal.fire({
                    title: "Note added successfully!",
                    type: "success",
                });
                displayAllNotes();
            })
        };
    });
    //End Add new Ajex Request

    //Start edit Note of an user Ajax request
    $("body").on("click", ".editBtn", function (e) {
        e.preventDefault();
        edit_id = $(this).attr('id');
        $.ajax({
            url: "handler/process/note.php",
            method: "POST",
            data: {
                edit_id: edit_id
            }
        }).then(function (response) {
            data = JSON.parse(response);
            $("#id").val(data.id);
            $("#title").val(data.title);
            $("#note").val(data.note);
        })
    });
    //End edit Note of an user Ajax request

    //Start Update Note of an user Ajax request
    $('#editNoteBtn').click(function (e) {
        if ($('#edit-note-form')[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                url: "handler/process/note.php",
                method: "POST",
                data: $("#edit-note-form").serialize() + "&action=update-note",
            }).then(function (response) {
                // console.log(response)
                Swal.fire({
                    title: "Note updated successfully!",
                    type: "success",
                });
                $('#edit-note-form')[0].reset();
                $('#editNoteModal').modal('hide');
                displayAllNotes();

            })
        };
    });
    //End Update Note of an user Ajax request

    //Start delete a note of an user Ajax Request
    $("body").on("click", ".deleteBtn", function (e) {
        e.preventDefault();
        delete_id = $(this).attr('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                // ajax request for delete
                $.ajax({
                    url: "handler/process/note.php",
                    method: "POST",
                    data: {
                        delete_id: delete_id
                    }
                }).then(function (response) {
                    Swal.fire(
                        'Deleted!',
                        'Your Note deleted successfuly',
                        'success'
                    )
                    displayAllNotes();
                })
            }
        })
    });
    //End delete a note of an user Ajax Request

    //Start info a note of an user Ajax Request
    $("body").on("click", ".infoBtn", function (e) {
        e.preventDefault();
        info_id = $(this).attr('id');
        $.ajax({
            url: "handler/process/note.php",
            method: "POST",
            data: {
                info_id: info_id
            }
        }).then(function (response) {
            // console.log(response)
            data = JSON.parse(response);

            Swal.fire({
                title: '<strong>Note : ID(' + data.id + ')</strong>',
                type: 'info',
                html: '<b>Title : </b>' + data.title + '<br><br><b>Note : </b>' + data.note +
                    '<br><br><b>Written On : </b>' + data.created_at + '<br><br><b>Updated On : </b>' + data.updated_at,
                showCloseButton: true,
            })
        })
    });
    //End info a note of an user Ajax Request

    // Display All notes of an User
    displayAllNotes();
    function displayAllNotes() {
        $.ajax({
            url: "handler/process/note.php",
            method: "POST",
            data: {
                action: 'display_notes'
            }
        }).then(function (response) {
            // console.log(response);
            $('#showNote').html(response);
            $("table").DataTable({
                order: [0, "desc "]
            });
        })
    }
});
//end home page and ajax 