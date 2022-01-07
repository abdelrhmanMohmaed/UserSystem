$(document).ready(function () {
    $("#profile-update-form").submit(function (e) {
        e.preventDefault()
        // Start ajax Request for update profile user
        $.ajax({
            url: "handler/process/profile.php",
            method: "POST",
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData(this),
        }).then(function (response) {
            // console.log(response);
            location.reload();
        });
    })
})
//start change password
$('#changePassBtn').click(function (e) {
    if ($("#change-pass-form")[0].checkValidity()) {
        e.preventDefault()
        $('#changePassBtn').val('Please Wait....')
        if ($('#newpass').val() != $('#cnewpass').val()) {
            $('#changePassBtn').val('Change Password');
            $('#changepassError').text('* Password did not matched');
        } else {
            $.ajax({
                url: "handler/process/profile.php",
                method: "POST",
                data: $("#change-pass-form").serialize() + '&action=change_pass',
            }).then(function (response) {
                // console.log(response);
                $('#changepassAlert').html(response);
                $('#changePassBtn').val('Change Password');
                $('#changePassBtn').text('');
                $('#change-Pass-form')[0].reset();
            })
        }
    }
    // check user is logged in or not
    $.ajax({
        url: "handler/process/profile.php",
        method: "POST",
        data: {
            action: 'checkUser'
        }
    }).then(function (response) {
        if (response === 'bye') {
            window.location = 'index.php';
        }
    })
})