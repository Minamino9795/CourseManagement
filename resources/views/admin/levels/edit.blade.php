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
                <h1 class="page-title mr-sm-auto">Chỉnh sửa khóa học</h1>
            </div>
            <form action="{{ route('levels.update', $item->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <legend>Thông tin cơ bản</legend>
                        <div class="form-group">
                            <label for="name">Tên khóa học</label>
                            <input type="text" name="name" value="{{ $item->name }}" class="form-control"
                                placeholder="Nhập tên khóa học ">
                            <small class="form-text text-muted"></small>
                        </div>

                        <div class="form-group">
                            <label for="level">Tên cấp độ</label>
                            <input type="text" name="level" value="{{ $item->level }}" class="form-control"
                                placeholder="Nhập tên cấp độ ">
                            <small class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái<abbr name="Trường bắt buộc">*</abbr></label>
                            <select name="status" class="form-control">
                                <option value="">
                                    --Vui lòng chọn--
                                </option>
                                <option value="{{ \App\Models\Level::INACTIVE }}"
                                    {{ old('status', $item->status) == \App\Models\Level::INACTIVE ? 'selected' : '' }}>
                                    Đang đóng
                                </option>
                                <option value="{{ \App\Models\Level::ACTIVE }}"
                                    {{ old('status', $item->status) == \App\Models\Level::ACTIVE ? 'selected' : '' }}>
                                    Đang mở
                                </option>
                            </select>
                            <small id="" class="form-text text-muted"></small>
                        </div>

                        <div class="form-actions">
                            <a class="btn btn-secondary float-right" href="{{ route('levels.index') }}">
                                Hủy
                            </a>
                            <button class="btn btn-primary ml-auto" type="submit">
                                Cập nhật
                            </button>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>
@endsection
