window.Broadcast = require('./broadcasting');

// lắng nghe thay đổi của order theo quyền sở hữu đơn hàng (user_id)
const authUserId = $('meta[name="auth-id"]').attr('content');
Echo.private(`orders.${authUserId}`).listen('OrderShippingNotification', (e) => {
  Toastify({
    text: `Đơn hàng ${e.order.code} của bạn đã thay đổi trạng thái sang (${e.order.shipping_status})`,
    className: "info",
    style: {
      background: "linear-gradient(to right, #00b09b, #96c93d)",
    }
  }).showToast();

});

$(function () {
  // push notification
  $('.push-noty').on('click', function () {
    const userId = $(this).data('user-id');
    const orderCode = $(this).data('code');

    const payload = {
      status: 'pickup',
      ref_id: orderCode,
      user_id: userId,
    };

    Broadcast.sendPrivateChannel(payload,
      // success callback
      (response) => {
        console.log('success', response);
      },
      // error callback
      (error) => {        
        // console.log(JSON.parse(JSON.stringify(error)));
        // console.log(error.response);

        Toastify({
          text: error.message,
          className: "error",
          style: {
            background: "linear-gradient(to right, #ff5722, #ed6a40)",
          }
        }).showToast();
      }
    );

  })
});
