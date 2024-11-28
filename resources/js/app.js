
require('./bootstrap');

// pursher lắng nghe sự kiện `MessageNotification`
Echo.channel('notification').listen('MessageNotification', (payload, e) => {
    console.log(payload, e);
    Toastify({
        text: payload.message,
        className: "info",
        style: {
          background: "linear-gradient(to right, #00b09b, #96c93d)",
        }
      }).showToast();

});