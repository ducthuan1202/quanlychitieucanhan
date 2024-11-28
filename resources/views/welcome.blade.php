<x-layouts.guest>

    <x-slot name="title">
        Trang chủ
    </x-slot>

    <x-slot name="header">
        <!-- Fonts -->

    </x-slot>

    <x-slot name="footer">
        <script>
            // in json
            var app =
                {{ Js::from([
                    'id' => 1,
                    'married' => true,
                    'email' => 'ducthuan@gmail.com',
                    'name' => 'Nguyễn Đức Thuận',
                ]) }}

            console.log('app', app);
        </script>
    </x-slot>

    <h1 class="text-center mt-5">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </h1>

    <div class="container text-center">
        <a href="{{ route('login') }}"> Đăng nhập </a>
    </div>

</x-layouts.guest>
