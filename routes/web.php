<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SpendingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/login', 'login')->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('verify_login');

// only login access
Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [HomeController::class, 'index'])->name('homepage');

    Route::group(['prefix' => 'users'], function () {
        Route::get('', [UserController::class, 'index'])->name('users.index');
        
        Route::get('create', [UserController::class, 'create'])->name('users.create');
        
        Route::get('{user}', [UserController::class, 'show'])->name('users.detail');

        Route::post('', [UserController::class, 'store'])->name('users.store');

        Route::get('{user}/edit', [UserController::class, 'edit'])->name('users.edit')->can('update-user', 'user');
        Route::put('{user}', [UserController::class, 'update'])->name('users.update')->can('update-user', 'user');

        Route::delete('{user}', [UserController::class, 'destroy'])->name('users.delete');

    });

    Route::resource('spending', SpendingController::class);

});
