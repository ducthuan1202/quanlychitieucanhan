<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSpendingRequest;
use App\Http\Requests\UpdateSpendingRequest;
use App\Models\Category;
use App\Models\Spending;

class SpendingController extends Controller
{
    public function index()
    {
        $data = Spending::ofOwner()
            ->with(['category'])
            ->latest()
            ->paginate(10);

        return view('spending.index', ['data' => $data]);
    }

    public function show($id)
    {
        abort(400, 'Not implemented');
    }

    public function create()
    {
        $categories = Category::all();
        return view('spending.create', [
            'categories' => $categories,
        ]);
    }

    public function store(CreateSpendingRequest $request)
    {
        $attr = $request->validated();
        $attr['created_by'] = auth()->id();
        $user = new Spending($attr);

        if ($user->save()) {
            return redirect()
                ->route('spending.index')
                ->with('successed', 'Tạo thành công');
        }

        return back()->withInput()->withErrors([
            'failed' => 'Bạn đã gặp một lỗi nhỏ, vui lòng thực hiện đúng theo hướng dẫn'
        ]);
    }

    public function edit(Spending $spending)
    {
        $categories = Category::all();
        return view('spending.update', [
            'categories' => $categories,
            'model' => $spending,
        ]);
    }

    public function update(UpdateSpendingRequest $request, Spending $spending)
    {
        $attr = $request->validated();
        $attr['created_by'] = auth()->id();
        $spending->fill($attr);

        if ($spending->save()) {
            return redirect()
                ->route('spending.index')
                ->with('successed', 'Cập nhật thành công');
        }

        return back()->withInput()->withErrors([
            'failed' => 'Bạn đã gặp một lỗi nhỏ, cập nhật thất bại'
        ]);
    }

    public function destroy(Spending $spending)
    {
        if ($spending->delete()) {
            return redirect()
                ->route('spending.index')
                ->with('successed', 'Xóa thành công');
        }

        return back()->withErrors([
            'failed' => 'Xóa thất bại'
        ]);
    }
}
