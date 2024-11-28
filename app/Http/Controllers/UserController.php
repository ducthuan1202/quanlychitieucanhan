<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
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

        return view('users.index');
    }

    public function show($id)
    {
        abort(400, 'Not implemented');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $user = new User($request->validated());

        if ($user->save()) {
            return redirect()
                ->route('users.index')
                ->with('create_successed', 'Tạo thành công');
        }

        return back()->withInput()->withErrors([
            'create_user_failed' => 'Bạn đã gặp một lỗi nhỏ, vui lòng thực hiện đúng theo hướng dẫn'
        ]);
    }

    /**
     * nếu tham số truyền là: edit(string $id) thì model ko binding
     * nếu truyền: edit(User $user) thì là binding
     */
    public function edit(User $user)
    {
        return view('users.update', [
            'user' => $user,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->fill($request->validated());

        if ($user->save()) {
            return redirect()
                ->route('users.index')
                ->with('update_successed', 'Cập nhật thành công');
        }

        return back()->withInput()->withErrors([
            'update_user_failed' => 'Bạn đã gặp một lỗi nhỏ, cập nhật thất bại'
        ]);
    }

    /**
     * thực ra là controller check quyền
     * còn logic xóa thì sẽ move vào trong server 
     * (cập nhật sau)
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // check và throw exception tự động
        // Gate::authorize('delete-user', $user);

        // check và throw exception thủ công
        if (!Gate::allows('delete-user', $user)) {
            abort(403, 'bạn không có quyền thực hiện hành động này.');
        }

        abort(400, 'Not implemented');
    }
}
