$(document).ready(function () {
    // fetch All Feedback of users ajax Request
    fetchAllFeedback();
    function fetchAllFeedback() {
        $.ajax({
            url: "handler/process/allFeedback.php",
            method: "POST",
            data: { action: 'fethAllFeedback' }
        }).then(function (response) {
            // console.log(response);
            $('#showAllFeedback').html(response);
            $("table").DataTable({
                order: [0, "desc "]
            });
        })
    }
    // Get The Current Row User ID and Feedback ID 
    var uid;
    var fid;
    $("body").on("click", ".replyFeedbackIcon", function (e) {
        uid = $(this).attr('id');
        fid = $(this).attr('fid');
    });
    $("#feedbackReplyBtn").click(function (e) {
        if ($("#feedback-reply-form")[0].checkValidity()) {
            let message = $('#message').val();
            e.preventDefault();
            $("#feedbackReplyBtn").val('Please Wait...');

            $.ajax({
                url: "handler/process/allFeedback.php",
                method: "POST",
                data: { uid: uid, message: message, fid: fid }
            }).then(function () {
                //  console.log(response);
                $("#feedbackReplyBtn").val('Send Reply');
                $('#showReplyModal').modal('hide');
                $('#feedback-reply-form')[0].reset();
                Swal.fire(
                    'Sent!',
                    'Reply sent successfuly to the user!',
                    'success'
                );
                fetchAllFeedback();
            })
        }
    })


});