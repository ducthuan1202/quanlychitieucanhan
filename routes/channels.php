<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('orders.{userId}', function ($user, $userId) {
    // kênh private, nên yêu cầu xác thực
    // chỉ những chủ đơn hàng mới có thể nhận thông báo    
    return true;
    return (int) $user->id === (int) $userId;
});

Broadcast::channel('notification', function ($user, $orderId) {
    // kênh public, nên ko cần xác thực
    return true;
});
