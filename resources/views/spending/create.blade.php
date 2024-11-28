@php

    use App\Models\User;

@endphp

<x-layouts.auth>

    <x-slot name="title">Tạo mới users</x-slot>
    

    <div class="d-flex justify-content-center my-5">

        {!! Form::open([
            'url' => route('spending.store'),
            'method' => 'POST',
            'class' => 'border p-5',
            'style' => 'width: 600px',
        ]) !!}

        {{-- form này sử dụng kiểu html thuần --}}

        <h1>Tạo chi tiêu</h1>

        @error('create_user_failed')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror

        <div class="form-group mt-3">
            {!! Form::label('category_id', 'Chọn danh mục', ['class' => 'form-label']) !!}
            {!! Form::select('category_id', $categories->pluck('name', 'id'), old('category_id'), ['class' => ['form-control', $errors->get('category_id') ? 'is-invalid' : '']]) !!}
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            {!! Form::label('name', 'Khoản chi tiêu', ['class' => 'form-label']) !!}
            {!! Form::text('name', old('name'), ['class' => ['form-control', $errors->get('name') ? 'is-invalid' : '']]) !!}
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            {!! Form::label('amount', 'Số tiền', ['class' => 'form-label']) !!}
            {!! Form::number('amount', old('amount'), ['step' => 1000, 'class' => ['form-control', $errors->get('amount') ? 'is-invalid' : '']]) !!}
            @error('amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            {!! Form::label('used_date', 'Thời gian', ['class' => 'form-label']) !!}
            {!! Form::text('used_date', old('used_date'), ['class' => ['form-control', $errors->get('used_date') ? 'is-invalid' : ''], 'readonly'=>true]) !!}
            @error('used_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            {!! Form::label('note', 'Ghi chú', ['class' => 'form-label']) !!}
            {!! Form::textarea('note', old('note'), ['class' => ['form-control', $errors->get('note') ? 'is-invalid' : '']]) !!}
            @error('note')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-3">Submit</button>
        {!! Form::close() !!}
    </div>

    <x-slot name="footer">
        <script src="{{ asset('js/spending.js') }}"></script>
    </x-slot>

</x-layouts.auth>
