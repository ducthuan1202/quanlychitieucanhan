<x-layouts.guest>

    <x-slot name="title">Đăng nhập</x-slot>

    <div class="d-flex justify-content-center my-5">

        {!! Form::open([
            'url' => route('verify_login'),
            'method' => 'POST',
            'class' => 'border p-5',
            'style' => 'width: 600px',
        ]) !!}

        <h1>QUẢN LÝ CHI TIÊU CÁ NHÂN</h1>

        @error('login')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror

        <div class="form-group mt-3">
            {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
            {!! Form::text('email', old('email'), ['class' => 'form-control', 'autofocus' => true]) !!}
        </div>

        <div class="form-group mt-3 mb-3">
            {!! Form::label('password', 'Mật khẩu', ['class' => 'form-label']) !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        <br />
        <button type="submit" class="btn btn-success">Đăng nhập</button>
        {!! Form::close() !!}
    </div>

</x-layouts.guest>
