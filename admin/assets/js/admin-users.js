$(document).ready(function () {
    // fetchAllUser
    fetchAllUsers();
    function fetchAllUsers() {
        $.ajax({
            url: "handler/process/allUsers.php",
            method: "POST",
            data: { action: 'fethAllUsers' }
        }).then(function (response) {
            // console.log(response);
            $('#showAllUsers').html(response);
            $("table").DataTable({
                order: [0, "desc "]
            });
        })
    }

    //fetch user Details 
    $("body").on("click", ".userDetailsIcon", function (e) {
        e.preventDefault();

        details_id = $(this).attr('id');
        $.ajax({
            url: "handler/process/allUsers.php",
            method: "POST",
            data: {
                details_id: details_id
            }
        }).then(function (response) {
            data = JSON.parse(response);
            // console.log(data)
            $("#getName").text(data.name + '' + '(ID: ' + data.id + ')');
            $("#getEmail").text('Email :' + data.email);
            $("#getPhone").text('Phone :' + data.phone);
            $("#getGender").text('Gender :' + data.gender);
            $("#getDob").text('DOB :' + data.dob);
            $("#getCreated").text('Joined On :' + data.created_at);
            $("#getVerified").text('Verified :' + data.verified);
            if (data.photo != '') {
                $("#getImage").html('<img src="../handler/process/' + data.photo + '"class = "img-thumbnail img-fluid align-self-center" width = "280px" > '
                );
            } else {
                $("#getImage").html('<img src="../assets/img/2.jpg"class = "img-thumbnail img-fluid align-self-center" width = "280px" > '
                );
            }
        });
    });

    //Start delete a  Ajax Request
    $("body").on("click", ".deleteUserIcon", function (e) {
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
                    url: "handler/process/allUsers.php",
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
                    fetchAllUsers();
                })
            }
        })
    });
    //End delete a user  Ajax Request
})
