@extends('admin.layouts.master')
@section('content')
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('levels.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang
                            Chủ</a>
                    </li>
                </ol>
            </nav>
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto">Thêm cấp độ</h1>
            </div>
        </header>

        <form method="post" action="{{ route('levels.store') }}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <legend>Thông tin cơ bản</legend>
                    <div class="form-group">
                        <label for="name">Tên cấp độ<abbr name="Trường bắt buộc">*</abbr></label>
                        <input name="name" type="text" class="form-control" id="name"
                            placeholder="Nhập tên cấp độ" value="{{ old('name') }}">
                        <small id="" class="form-text text-muted"></small>
                        @error('name')
                            <div style="color: red">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="level">Cấp độ<abbr name="Trường bắt buộc">*</abbr></label>
                        <input name="level" type="text" class="form-control" id="level" placeholder="Nhập cấp độ"
                            value="{{ old('level') }}">
                        <small class="form-text text-muted"></small>
                        @error('level')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Trạng thái<abbr name="Trường bắt buộc">*</abbr></label>
                        <select class="form-control" name="status" id="status">
                            <option value="">--Vui lòng chọn--</option>
                            <option value="{{ \App\Models\Level::ACTIVE }}">Đang mở</option>
                            <option value="{{ \App\Models\Level::INACTIVE }}">Đang đóng</option>
                        </select>
                        <small id="" class="form-text text-muted"></small>
                        @error('status')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <a class="btn btn-secondary float-right" href="{{ route('levels.index') }}">Hủy</a>
                        <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var selectedStatus = sessionStorage.getItem('selectedStatus');
            if (selectedStatus) {
                document.getElementById('status').value = selectedStatus;
            }
            document.getElementById('status').addEventListener('change', function() {
                var selectedValue = this.value;
                sessionStorage.setItem('selectedStatus', selectedValue);
            });
            window.addEventListener('load', function() {
                sessionStorage.removeItem('selectedStatus');
            });
        });
    </script>
@endsection
