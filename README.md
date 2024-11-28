# Tổng quan dự án

DỰ ÁN QUẢN LÝ CHI TIÊU CÁ NHÂN


## Hướng dẫn cài đặt

```bash
# bước 1: cài đặt package 
composer install

# bước 2: tạo app-key
php artisan key:generate --ansi

# bước 3: chạy lệnh migrate và seeding data
php artisan migrate:fresh --seed

# bước 4: thêm file cấu hình .env 

# bước 5: khởi động app
php artisan serve

# mở trình duyệt vào truy cập link: http://localhost:8000
# tài khoản login: 
# email     : admin@gmail.com
# password  : password

```
