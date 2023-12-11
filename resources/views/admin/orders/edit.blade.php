@extends('admin.layouts.master')
@section('content')
    <div class="page">
        <div class="page-inner">
            <header class="page-title-bar">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="{{ route('orders.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý
                                Đăng Ký & Mua Khóa Học</a>
                        </li>
                    </ol>
                </nav>
                <h1 class="page-title">Kích hoạt khóa học</h1>
            </header>
            <div class="col-lg-13">
                <div class="card card-fluid">
                    <h6 class="card-header">Thông tin cơ bản</h6>
                    <div class="card-body">
                        <div class="media mb-3">
                        </div>
                        <form method="post">
                            <div class="form-row">
                                <label for="input01" class="col-md-3">Tên khách hàng :</label>
                                <div class="col-md-9 mb-3">
                                    <div class="custom-file">
                                        <p>{{ $item->user->name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="input02" class="col-md-3">E-mail :</label>
                                <div class="col-md-9 mb-3">
                                    <p>{{ $item->user->email }}</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="input03" class="col-md-3">Số điện thoại :</label>
                                <div class="col-md-9 mb-3">
                                    <p>{{ $item->user->phone }}</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="input04" class="col-md-3">Khóa học đăng ký :</label>
                                <div class="col-md-9 mb-3">
                                    <p>{{ $item->course->name }}</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="input04" class="col-md-3">Học phí khóa học :</label>
                                <div class="col-md-9 mb-3">
                                    <p>{{ number_format($item->course->price) }} VND</p>
                                </div>
                            </div>
                        </form>
                        <nav class="nav nav-tabs flex-column border-0">
                            <form method="POST" action="{{ route('orders.update', $item->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="status">Trạng thái kích hoạt<abbr
                                                    name="Trường bắt buộc">*</abbr></label>
                                            <select name="status" class="form-control">
                                                <option value="">--Vui lòng chọn--</option>
                                                <option value="{{ \App\Models\Order::INACTIVE }}"
                                                    {{ old('status', $item->status) == \App\Models\Order::INACTIVE ? 'selected' : '' }}>
                                                    Chưa xác nhận</option>
                                                <option value="{{ \App\Models\Order::ACTIVE }}"
                                                    {{ old('status', $item->status) == \App\Models\Order::ACTIVE ? 'selected' : '' }}>
                                                    Đã xác nhận</option>
                                            </select>
                                            <small id="" class="form-text text-muted"></small>
                                            @error('status')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-actions">
                                            <a class="btn btn-secondary float-right"
                                                href="{{ route('orders.index') }}">Hủy</a>
                                            <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
