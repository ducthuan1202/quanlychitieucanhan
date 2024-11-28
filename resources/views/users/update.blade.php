@php

    use App\Models\User;

@endphp

<x-layouts.auth>

    <x-slot name="title">Cập nhật user</x-slot>

    <div class="d-flex justify-content-center my-5">

        {!! Form::model($user, [
            'route' => ['users.update', $user->id],
            'method' => 'PUT',
            'class' => 'border p-5',
            'style' => 'width: 600px',
        ]) !!}

        {{-- form này sử dụng model binding và component --}}

        <h1>Binding Model form</h1>

        @error('update_user_failed')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror

        <x-common.input_group name="name"></x-common.input_group>

        <x-common.input_group name="email" type="email" title="Địa chỉ hòm thư" :disabled="true"></x-common.input_group>

        {{-- đặt 1 field ngoài DTO để check dữ liệu lưu vào db  --}}
        <x-common.input_group name="phone"></x-common.input_group>

        <x-common.select_group name="role" :data="User::roles()" :disabled="true"></x-common.input_group>

        <x-common.select_group name="status" :data="User::status()" :disabled="true"></x-common.input_group>

        <button type="submit" class="btn btn-success mt-3">Submit</button>

        {!! Form::close() !!}

    </div>

</x-layouts.auth>
