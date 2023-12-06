@extends('admin.layouts.master')
@section('content')
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('orders.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang
                            Chủ</a>
                    </li>
                </ol>
            </nav>
            <!-- <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> -->
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto">Quản Lý Đăng Ký Khóa Học</h1>
                <div class="btn-toolbar">

                    <a href="" class="btn btn-primary mr-2">
                        <i class="fa-solid fa fa-arrow-up"></i>
                        <span class="ml-1">Export Excel</span>
                    </a>
                </div>
            </div>
        </header>
        <div class="page-section">
            <div class="card card-fluid">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active " href="">Tất Cả</a>
                        </li>

                    </ul>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <form action="{{ route('orders.index') }}" method="GET" id="form-search">

                                <div class="row">
                                    <div class="col">
                                        <input name="searchname" class="form-control" type="text"
                                            placeholder=" Tìm theo tên khách hàng..." value="{{ request('searchname') }}">

                                    </div>
                                    <div class="col">
                                        <input name="searchphone" class="form-control" type="text"
                                            placeholder=" Số điện thoại..." value="{{ request('searchphone') }}">

                                    </div>
                                    <div class="col">
                                        <select name="searchcourse_id" class="form-control">
                                            <option value=""> Khóa học</option>
                                            @foreach ($courses as $key => $course)
                                                <option value="{{ $course->id }}"
                                                    {{ $request->searchcourse_id == $course->id ? 'selected' : '' }}>
                                                    {{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col">
                                        <select name="searchstatus" class="form-control">
                                            <option value=""
                                                {{ request('searchstatus') === '' && !request()->has('search') ? 'selected' : '' }}>
                                                Trạng thái</option>
                                            <option value="{{ \App\Models\Order::INACTIVE }}"
                                                {{ request('searchstatus') === \App\Models\Order::INACTIVE ? 'selected' : '' }}>
                                                Chưa xác nhận
                                            </option>
                                            <option value="{{ \App\Models\Order::ACTIVE }}"
                                                {{ request('searchstatus') === \App\Models\Order::ACTIVE ? 'selected' : '' }}>
                                                Đã xác nhận
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-lg-2">
                                        <button class="btn btn-secondary" type="submit">Tìm Kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    @include('admin.includes.global.alert')

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Khách hàng</th>
                                    <th>SĐT</th>
                                    <th>Khóa học</th>
                                    <th>Giá</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $key => $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $key + 1 }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p>{{ $item->user->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->user->phone }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->course->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{ number_format($item->course->price) }} VND</p>
                                        </td>
                                        @if ($item->status == \App\Models\Order::ACTIVE)
                                            <td><span>
                                                    <i class="fas fa-check-circle"></i> Đã xác nhận
                                                </span></td>
                                        @else
                                            <td> <span>
                                                    <i class="fas fa-times-circle"></i> Chưa xác nhận
                                                </span></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $items->links('pagination::bootstrap-5') }}
                        <div style="float:right">

                        </div>
                    </div>
                </div>
            </div><!-- /.page -->
        </div><!-- /.wrapper -->
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
