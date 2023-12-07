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
                <h1 class="page-title">Kích hoạt khóa học cho " {{ $item->user->name }} "</h1>
            </header>
            <div class="page-section">
                <form method="POST" action="{{ route('orders.update', $item->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <legend>Thông tin cơ bản</legend>

                            <div class="form-group">
                                <label for="status">Trạng thái<abbr name="Trường bắt buộc">*</abbr></label>
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
                                <a class="btn btn-secondary float-right" href="{{ route('orders.index') }}">Hủy</a>
                                <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
