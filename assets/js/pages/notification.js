$(document).ready(function () {

    // fetch All notification of an User
    fetchNotification();
    function fetchNotification() {
        $.ajax({
            url: "handler/process/notification.php",
            method: "POST",
            data: {
                action: 'fetchNotification'
            }
        }).then(function (response) {
            // console.log(response);
            $('#showAllNotification').html(response)
        })
    }
    // check Notification 
    checkNotification();
    function checkNotification() {
        $.ajax({
            url: "handler/process/notification.php",
            method: "POST",
            data: {
                action: 'checkNotification'
            }
        }).then(function (response) {
            // console.log(response);
            $('#checkNotification').html(response)
        })
    }
    // Remove Notification
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
          //  console.log(response);
            checkNotification();
            fetchNotification();
        })
    })
});