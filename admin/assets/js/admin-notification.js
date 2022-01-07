$(document).ready(function () {
    fetchAllNotification();
    // fetchAllNotification by ajax request 
    function fetchAllNotification() {
        $.ajax({
            url: "handler/process/notification.php",
            method: "POST",
            data: {
                action: 'fetchAllnotification'
            }
        }).then(function (response) {
            // console.log(response);
            $('#showNotification').html(response);
        });
    }
    // released too function move in check notification in admin-panel
    // checkNotification(); 

    // delete a notification of an user by Ajax Request
    $("body").on("click", ".close", function (e) {
        e.preventDefault();
        notification_id = $(this).attr('id');
        $.ajax({
            url: "handler/process/notification.php",
            method: "POST",
            data: {
                notification_id: notification_id
            }
        }).then(function (response) {
            // console.log(response);
            fetchAllNotification();
            checkNotification();
        });
    });
});