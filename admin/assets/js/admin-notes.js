$(document).ready(function () {
    fetchAllNotes();
    // fetchAllNotes by ajax request 
    function fetchAllNotes() {
        $.ajax({
            url: "handler/process/allNotes.php",
            method: "POST",
            data: {
                action: 'fetchAllNotes'
            }
        }).then(function (response) {
            // console.log(response);
            $('#showAllNotes').html(response);
            $("table").DataTable({
                order: [0, "desc "]
            });
        });
    }
    
    //Start delete a note of an user Ajax Request
    $("body").on("click", ".deleteNoteIcon", function (e) {
        e.preventDefault();
        note_id = $(this).attr('id');

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
                    url: "handler/process/allNotes.php",
                    method: "POST",
                    data: {
                        note_id: note_id
                    }
                }).then(function (response) {
                    Swal.fire(
                        'Deleted!',
                        'Note deleted successfuly',
                        'success'
                    )
                    fetchAllNotes();
                })
            }
        })
    });
    //End delete a note of an user Ajax Request
});