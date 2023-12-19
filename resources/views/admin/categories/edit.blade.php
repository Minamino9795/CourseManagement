@extends('admin.layouts.master')
@section('content')
    <div class="page">
        <div class="page-inner">
            <header class="page-title-bar">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="{{ route('categories.index') }}"><i
                                    class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Danh Mục Khóa Học</a>
                        </li>
                    </ol>
                </nav>
                <h1 class="page-title">Chỉnh Sửa Danh Mục Khóa Học</h1>
            </header>
            <div class="page-section">
                <form method="post" action="{{ route('categories.update', $categories->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <legend>Thông tin cơ bản</legend>
                            <div class="form-group">
                                <label for="tf1">Tên danh mục khóa học <abbr name="Trường bắt buộc">*</abbr></label>
                                <input name="name" type="text" value="{{ $categories->name }}" class="form-control"
                                    id="" placeholder="Nhập tên danh mục khóa học">
                                <small id="" class="form-text text-muted"></small>
                                @error('name')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tf1">Mô tả <abbr name="Trường bắt buộc">*</abbr></label>
                                <textarea name="description" type="text"class="form-control" id="description" placeholder="Nhập mô tả">{{ $categories->description }}</textarea>

                                <small id="" class="form-text text-muted"></small>
                                @error('description')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tf1">Trạng thái<abbr name="Trường bắt buộc">*</abbr></label>
                                <select name="status" class="form-control">
                                    <option value="">--Vui lòng chọn--</option>
                                    <option value="{{ \App\Models\Category::INACTIVE }}"
                                        {{ old('status', $categories->status) == \App\Models\Category::INACTIVE ? 'selected' : '' }}>
                                        Đang đóng</option>
                                    <option value="{{ \App\Models\Category::ACTIVE }}"
                                        {{ old('status', $categories->status) == \App\Models\Category::ACTIVE ? 'selected' : '' }}>
                                        Đang mở</option>
                                </select>
                                <small id="" class="form-text text-muted"></small>
                                @error('status')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-actions">
                                <a class="btn btn-secondary float-right" href="{{ route('categories.index') }}">Hủy</a>
                                <button class="btn btn-primary ml-auto" type="submit">Lưu thay đổi</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endsection
