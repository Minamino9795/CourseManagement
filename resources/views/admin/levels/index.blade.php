@extends('admin.layouts.master')
@section('content')
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('levels.index') }}">
                            <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>
                            Trang Chủ
                        </a>
                    </li>
                </ol>
            </nav>
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto">Cấp độ khóa học</h1>
                <div class="btn-toolbar">
                    @if (Auth::user()->hasPermission('levels_create'))
                        <a href="{{ route('levels.create') }}" class="btn btn-primary mr-2">
                            <i class="fa-solid fa fa-plus"></i>
                            <span class="ml-1">Thêm Mới</span>
                        </a>
                    @endif
                </div>
            </div>
        </header>
        <div class="page-section">
            <div class="card card-fluid">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active " href="">Tất
                                Cả</a>
                        </li>

                    </ul>
                </div>
                {{-- alert --}}
                @include('admin.includes.global.alert')

                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            {{-- form-search --}}
                            <form action="{{ route('levels.index') }}" method="GET" id="form-search">
                                <div class="row">
                                    <div class="col">
                                        <input name="name" value="{{ request('name') }}" class="form-control"
                                            type="text" placeholder=" Tên khóa học...">
                                    </div>

                                    <div class="col">
                                        <input name="level" value="{{ request('level') }}" class="form-control"
                                            type="text" placeholder=" Cấp độ...">
                                    </div>

                                    <div class="col">
                                        <select name="searchstatus" class="form-control">
                                            <option value=""
                                                {{ request('searchstatus') === '' && !request()->has('search') ? 'selected' : '' }}>
                                                Trạng thái</option>
                                            <option value="{{ \App\Models\Level::INACTIVE }}"
                                                {{ request('searchstatus') === \App\Models\Level::INACTIVE ? 'selected' : '' }}>
                                                Đang đóng
                                            </option>
                                            <option value="{{ \App\Models\Level::ACTIVE }}"
                                                {{ request('searchstatus') === \App\Models\Level::ACTIVE ? 'selected' : '' }}>
                                                Đang mở
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearch"
                                            type="submit">Tìm Kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> STT </th>
                                    <th> Tên khóa học</th>
                                    <th> Cấp độ </th>
                                    <th> Trạng thái </th>
                                    <th> Chức năng </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $key => $item)
                                    <tr>
                                        <td class="align-middle"> {{ $key + 1 }}</td>
                                        <td class="align-middle"> {{ $item->name }} </td>
                                        <td class="align-middle"> {{ $item->level }} </td>
                                        <td class="align-middle">
                                            @if ($item->status == \App\Models\Level::ACTIVE)
                                                <span>
                                                    <i class="fas fa-check-circle"></i> Đang mở
                                                </span>
                                            @else
                                                <span>
                                                    <i class="fas fa-times-circle"></i> Đang đóng
                                                </span>
                                        </td>
                                @endif

                                <td>
                                    @if (Auth::user()->hasPermission('levels_update'))
                                        <span class="sr-only">Edit</span>
                                        <a href="{{ route('levels.edit', $item->id) }}"
                                            class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i>
                                            <span class="sr-only">Remove</span></a>
                                    @endif
                                    @if (Auth::user()->hasPermission('levels_delete'))
                                        <form action="{{ route('levels.destroy', $item->id) }}" style="display:inline"
                                            method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"
                                                class="btn btn-sm btn-icon btn-secondary"><i
                                                    class="far fa-trash-alt"></i></button>

                                        </form>
                                    @endif

                                </td>
                                </tr>
                            </tbody>
                            @endforeach

                        </table>

                        <div style="float:right">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <div class="card-footer pt-1 pb-1">
            <div class="float-end">
                {{ $items->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var selectedStatus = "{{ request('searchstatus') }}";
            if (selectedStatus) {
                $('select[name="searchstatus"]').val(selectedStatus);
            }
            $('select[name="searchstatus"]').change(function() {
                selectedStatus = $(this).val();
            });
            $('#form-search').submit(function() {
                $('<input>').attr({
                    type: 'hidden',
                    name: 'searchstatus',
                    value: selectedStatus
                }).appendTo($(this));
                return true;
            });
        });
    </script>
@endsection
