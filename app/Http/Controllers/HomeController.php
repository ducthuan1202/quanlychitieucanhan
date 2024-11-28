<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        
        $user = auth()->user();

        info('User login attempt failed.', ['user' => $user]);
        logger('User has logged in.', ['user' => $user]);
        logger()->error('You are not allowed here.');

        Log::info('Xin chào ngày mới', ['user' => $user]);
        Log::debug('Bạn cần debug ư?', ['user' => $user]);
        Log::warning('Có một vấn đề nhỏ cần xem xét ở đây!', ['user' => $user]);
        Log::emergency('Vấn đề có vẻ cần được quan tâm', ['user' => $user]);
        Log::error('Vấn đề bắt đầu trở nên nghiêm trọng hơn rồi đó!', ['user' => $user]);

        return view('welcome');
    }
}
