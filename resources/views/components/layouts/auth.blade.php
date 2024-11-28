<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- khu sử dụng axios, csrf_token tự động được thêm vào mà ko cần handle thủ công --}}
    {{-- do vậy, thẻ meta này là dư thừa (nhưng vẫn để đây =)) --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- gán user login id vào đây, và sử dụng js để get ra thay vì gán thằng vào biến --}}
    <meta name="auth-id" content="{{ auth()->id() }}" />

    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/daterangepicker.css') }}">

    {{ $header ?? null }}

</head>

<body>

    <div class="container">
        <nav class="navbar-expand-lg navbar navbar-dark bg-dark">
            <span class="navbar-brand ps-5">
                QUẢN LÝ CHI TIÊU
            </span>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                {{-- <li class="nav-item">
                    <a class="nav-link {{ request()->is(['spending', 'spending/*']) ? 'active' : '' }}"
                        href="{{ route('spending.index') }}">Chi tiêu</a>
                </li> --}}

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is(['users', 'users/*']) ? 'active' : '' }}"
                        href="javascript:;" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        Thành viên
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item {{ request()->is('users') ? 'active' : '' }}"
                                href="{{ route('users.index') }}">Danh sách</a></li>
                        <li><a class="dropdown-item {{ request()->is('users/create') ? 'active' : '' }}"
                                href="{{ route('users.create') }}">Thêm mới</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li> --}}

            </ul>


            <div class="d-flex mx-3">

                {!! Form::open(['url' => route('logout'), 'method' => 'POST', 'class' => 'd-inline']) !!}
                <span class="text-white">Hi, {{ auth()->user()->name }}</span>
            {!! Form::submit('Đăng xuất', ['class' => 'btn btn-sm btn-outline-dark text-warning']) !!}
            {!! Form::close() !!}
            </div>
        </nav>

        {{ $slot }}

    </div>

    <script type="text/javascript" src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/daterangepicker.min.js') }}"></script>
    {{ $footer ?? null }}
</body>

</html>
