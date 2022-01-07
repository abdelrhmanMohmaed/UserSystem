$(document).ready(function () {
    $('#open-nav').click(function () {
        $('.admin-nav').toggleClass('animate')
    });

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
            if (response) {
                $('#checkNotification').html('<i class="fas fa-circle text-danger fa-sm"></i>');
            }
        });
    }
});
