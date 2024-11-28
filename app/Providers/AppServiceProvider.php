<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // bật/tắt debugbar với tùy chọn
        // $isDev = config('app.debug') && request()->get('isdev') === 'true';
        // $isDev ? DebugBar::enable() : Debugbar::disable();

        Paginator::useBootstrap(); 

    }
}
