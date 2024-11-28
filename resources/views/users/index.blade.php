<x-layouts.auth>

    <x-slot name="title">Danh sách users</x-slot>

    <div class="d-flex justify-content-center my-5">

        <div>

            <h1>Danh sách Users</h1>

            @if (session()->has('create_successed'))
                <div class="alert alert-success">
                    {{ session()->get('create_successed') }}
                </div>
            @endif

            {{-- 2 cách là như nhau --}}
            @if (session('update_successed'))
                <div class="alert alert-success">
                    {{ session('update_successed') }}
                </div>
            @endif
        </div>

    </div>

</x-layouts.auth>
