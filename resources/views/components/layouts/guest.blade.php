<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- khu sử dụng axios, csrf_token tự động được thêm vào mà ko cần handle thủ công --}}
        {{-- do vậy, thẻ meta này là dư thừa (nhưng vẫn để đây =)) --}}
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ $title ?? config('app.name') }}</title>

        {{ $header ?? null }}

        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        @livewireStyles
    </head>
    <body class="antialiased">
       
        {{ $slot }}
        
        @livewireScripts
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        {{ $footer ?? null }}
    </body>
</html>
