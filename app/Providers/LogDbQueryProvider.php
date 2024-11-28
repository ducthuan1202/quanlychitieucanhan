<?php

namespace App\Providers;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\ServiceProvider;

/**
 * Provider là trung tâm của tất cả quá trình khởi động ứng dụng trong Laravel
 * lắng nghe mọi truy vấn tới db
 * mục đích là để debug khi có vấn đề
 * 
 * Khi tạo ra 1 Provider mới, cần đăng ký chúng trong 
 * file `config/app.php` ở mục `providers`
 */
class LogDbQueryProvider extends ServiceProvider
{
    /**
     * Register services.
     * 
     * chỉ nên binding một class vào container, tránh xử lý logic trong function này
     * Nếu không, có thể vô tình sử dụng một class chưa tải và gây ra lỗi
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // theo dõi thêm ở file debugbar
        // vendor\barryvdh\laravel-debugbar\src\LaravelDebugbar.php
        $db = $this->app['db'];

        if (!config('database.listen_query')) {
            return;
        }

        $db->listen(function ($query, $bindings = null, $time = null) {

            // thời gian xử lý của query
            $time = $query->time;

            // câu prepare query
            $sql = $query->sql;

            // giá trị bindings
            $bindings = $query->bindings;

            // Thay thế các placeholder trong câu truy vấn với các giá trị tương ứng
            foreach ($bindings as $binding) {
                $sql = preg_replace('/\?/', "'$binding'", $sql, 1);
            }

            // nếu cần hiểu thị dữ liệu trên debugbar, ta có thể add như bên dưới
            // khi sử dụng logger thì dữ liệu log cũng được hiển thị trên debugbar
            Debugbar::addMessage($sql . ' (took: ' . $time . ')', 'dbQuery');
        });
    }
}
