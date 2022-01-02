$(document).ready(function () {
    // send feedback to admin ajax request 
    $("#feedbackBtn").click(function (e) {
        if ($('#feedback-form')[0].checkValidity()) {
            e.preventDefault();
            $(this).val('Please Wait...')
            $.ajax({
                url: "handler/process/feedback.php",
                method: "POST",
                data: $("#feedback-form").serialize() + "&action=feedback",
            }).then(function (response) {
                // console.log(response)
                $('#feedback-form')[0].reset();
                $('#feedbackBtn').val('Send Feedback')
                Swal.fire({
                    title: "Feedback Successfully send to the Admin!",
                    type: "success",
                });
            })
        }
    })
})