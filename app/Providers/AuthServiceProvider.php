<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        /*
        |--------------------------------------------------------------------------
        | Gate và Policy
        |--------------------------------------------------------------------------
        |
        | Gate và Policy đều có chức năng kiểm tra quyền của user trên hệ thống
        | Gate để kiểm tra các quyền phức tạp và linh hoạt
        | Policy thường gắn liền với một model nào đó
        |
        */
        
        // định nghĩa gate sửa dữ liệu user
        Gate::define('update-user', function (User $userAuth, User $userUpdate) {
            // nếu là admin thì có thể sửa
            // nếu là member thì chỉ có thể sửa dữ liệu của chính user đó
            return $userAuth->id === $userUpdate->id || $userAuth->role === 'admin';
        });

        // định nghĩa gate xóa user
        Gate::define('delete-user', function (User $userAuth, User $userUpdate) {
            // nếu là admin thì có thể sửa
            return $userAuth->role === 'admin';
        });
    }
}
