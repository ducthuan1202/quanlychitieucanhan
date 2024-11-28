# Overview

```bash

# list route dạng ngắn gọn + search theo path
php artisan r:l -c --path=users

# chạy lại lệnh migrate và seeding data
php artisan migrate:fresh --seed

```

truy cập [pusher.com (login bằng email cá nhân)](https://dashboard.pusher.com/apps/1777324/keys) để lấy thông tin cấu hình


- phía server (laravel) cần cài đặt pusher `composer require pusher/pusher-php-server`

- phía client (npm) cần cài đặt `npm i pusher-js laravel-echo jquery`

- lấy thông tin và cập nhật vào file `.env`

- tạo 1 event để định nghĩa channel

- tạo route ở `web.php` và view file `listen.blade.php`

- un-comment phần load `pusher-js` và `laravel-echo` ở `bootstrap.js`

- thêm sự kiện lắng nghe trong `app.js`

- cài đặt các gói của npm

- chạy watch change `npm run watch`

- thay đổi `channel.php` với route trả về true

## Eloquent model

```php

$user = User::find(1);

$order = Order::where('user_id', $user->id)->first();

// set quan hệ User cho Order
$order->setRelation('user', $user);

// clone Order model mới từ model cũ và hủy User relation
$order1 = $order->unsetRelation('user');

// clone Order model mới từ model cũ và hủy tất cả relations
$order2 = $order->withoutRelations();

// hủy tất cả relations trên model hiện tại
$order->unsetRelations();

// attributesToArray() và getAttribute() là như nhau
$arr = $order->attributesToArray();
$arr = $order->getAttribute();


```