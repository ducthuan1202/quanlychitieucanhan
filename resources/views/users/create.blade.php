@php

    use App\Models\User;

@endphp

<x-layouts.auth>

    <x-slot name="title">Tạo mới users</x-slot>

    <div class="d-flex justify-content-center my-5">

        {!! Form::open([
            'url' => route('users.store'),
            'method' => 'POST',
            'class' => 'border p-5',
            'style' => 'width: 600px',
        ]) !!}

        {{-- form này sử dụng kiểu html thuần --}}

        <h1>Thông tin đăng ký</h1>

        @error('create_user_failed')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror

        <div class="form-group mt-3">
            {!! Form::label('name', 'Họ tên', ['class' => 'form-label']) !!}
            {!! Form::text('name', old('name'), ['class' => ['form-control', $errors->get('name') ? 'is-invalid' : '']]) !!}
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
            {!! Form::text('email', old('email'), ['class' => ['form-control', $errors->get('email') ? 'is-invalid' : '']]) !!}
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            {!! Form::label('phone', 'Số điện thoại', ['class' => 'form-label']) !!}
            {!! Form::text('phone', old('phone'), ['class' => ['form-control', $errors->get('phone') ? 'is-invalid' : '']]) !!}
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            {!! Form::label('role', 'Vai trò trên hệ thống', ['class' => 'form-label']) !!}
            {!! Form::select('role', User::roles(), old('role'), ['class' => ['form-control', $errors->get('role') ? 'is-invalid' : '']]) !!}
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            {!! Form::label('status', 'Trạng thái tài khoản', ['class' => 'form-label']) !!}
            {!! Form::select('status', User::status(), old('status'), ['class' => ['form-control', $errors->get('status') ? 'is-invalid' : '']]) !!}
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-3">Submit</button>
        {!! Form::close() !!}
    </div>

</x-layouts.auth>
