<x-layouts.auth>

    <x-slot name="title">Danh sách chi tiêu</x-slot>

    <div class="my-5">

        <h1>Danh sách chi tiêu</h1>

        @if (session()->has('successed'))
            <div class="alert alert-success">
                {{ session()->get('successed') }}
            </div>
        @endif

        @if (session('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="headings">
                        <th width="5%" class="text-center align-middle">No.</th>
                        <th width="15%" class="text-center align-middle">Thời Gian</th>
                        <th width="15%" class="text-center align-middle">Danh Mục</th>
                        <th class="text-center align-middle">Khoản chi tiêu</th>
                        <th width="15%" class="text-center align-middle">Số tiền</th>
                        <th width="10%" class="text-center align-middle"></th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($data))
                        @foreach ($data as $index => $item)
                            <tr>
                                <td class="text-center align-middle">{{ $index + $data->firstItem() }}</td>
                                <td class="text-center align-middle">{{ $item->used_date }}</td>
                                <td class="text-center align-middle">{{ $item->formatCategory() }}</td>
                                <td class="text-center align-middle">
                                    <span class="fw-normal">{{ $item->name }} </span><br/>
                                    <i class="fw-light text-muted fs-6">{{ $item->note }}</i>
                                </td>
                                <td class="text-center align-middle">{{ $item->formatAmount() }}</td>
                                <td class="text-right align-middle">
                                    <a href="{{ route('spending.edit', $item) }}" class="btn btn-outline-dark btn-sm">
                                        Sửa
                                    </a>

                                    <a href="javascript:void(0);" class="btn btn-outline-danger btn-sm btn-delete-spending">
                                        Xóa
                                    </a>

                                    {!! Form::open(['url' => route('spending.destroy', $item),'method' => 'DELETE',]) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="100%">Không có dữ liệu.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>

    @if (count($data))
        <div role="pagination">{{ $data->appends([])->links() }}</div>
    @endif


    <div class="position-fixed end-0 p-3 top-0" style="z-index: 12">
        <a href="{{ route('spending.create') }}" class="btn btn-success">Tạo mới</a>
    </div>

    <x-slot name="footer">
        <script src="{{ asset('js/spending.js') }}"></script>
    </x-slot>
</x-layouts.auth>
