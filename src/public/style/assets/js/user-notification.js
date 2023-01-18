// env('PUSHER_APP_KEY')
Pusher.logToConsole = true;
var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
    encrypted: true,
    cluster: "{{ env('PUSHER_APP_CLUSTER') }}",
});
var channel = pusher.subscribe("user-notification");
channel.bind("App\\Events\\UserNotification", function (data) {
    console.log(data);
    // append the new notification
    $(".notifications-wrapper").append(
        `<a class="content" href="#"><div class="notification-item"><h4 class="item-title">${data.message}</h4><p class="item-info">View</p></div></a>`
    );
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    // increase the coutenr by 1
    var counter = parseInt($("#counter").html());
    console.log(counter);
    counter++;
    $("#counter").html(counter);
    // store the new notifactions in databse
    $.ajax({
        url: "/home/notification",
        data: {
            user_id: data.userID,
            message: data.message,
            route_name: "storeNotification",
        },
        type: "POST",
        dataType: "json",
    });
});
