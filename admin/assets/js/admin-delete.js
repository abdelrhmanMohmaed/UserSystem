$(document).ready(function () {
    // fetchAllUser
    fetchAllDeleteUsers();
    function fetchAllDeleteUsers() {
        $.ajax({
            url: "handler/process/deleteUser.php",
            method: "POST",
            data: { action: 'fethAllDeleteUsers' }
        }).then(function (response) {
            console.log(response);
            $('#showAllDeletedUsers').html(response);
            $("table").DataTable({
                order: [0, "desc "]
            });
        })
    }
        //Start restore a  Ajax Request
        $("body").on("click", ".restoreUserIcon", function (e) {
            e.preventDefault();
            restore_id = $(this).attr('id');
    
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, restore it!'
            }).then((result) => {
                if (result.value) {
                    // ajax request for restore
                    $.ajax({
                        url: "handler/process/deleteUser.php",
                        method: "POST",
                        data: {
                            restore_id: restore_id
                        }
                    }).then(function (response) {
                        Swal.fire(
                            'restored!',
                            'Your Note restored successfuly',
                            'success'
                        )
                        fetchAllDeleteUsers();
                    })
                }
            })
        });
        //End restore a user  Ajax Request
})
