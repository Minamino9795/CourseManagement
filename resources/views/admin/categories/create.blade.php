@extends('admin.layouts.master')
@section('content')
<link rel="stylesheet" href="https://cdn.ckeditor.com/4.16.0/standard-all/ckeditor.js">

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
                <h1 class="page-title">Thêm Danh Mục Khóa Học</h1>
            </header>
            <div class="page-section">
                <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <legend>Thông tin cơ bản</legend>
                            <div class="form-group">
                                <label for="name">Tên danh mục khóa học <abbr name="Trường bắt buộc">*</abbr></label>
                                <input name="name" type="text" value="{{ old('name') }}" class="form-control" id=""
                                    placeholder="Nhập tên danh mục khóa học">
                                <small id="" class="form-text text-muted"></small>
                                @error('name')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Mô tả <abbr name="Trường bắt buộc">*</abbr></label> 
                                <textarea class="form-control" rows="4" name="description" id="description" placeholder="Nhập mô tả">{{ old('description') }}</textarea>
                                <small id="" class="form-text text-muted"></small>
                                @error('description')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="tf1">Trạng thái<abbr name="Trường bắt buộc">*</abbr></label>
                                <select name="status" class="form-control">
                                    <option value="">--Vui lòng chọn--</option>
                                    <option value="{{ \App\Models\Category::INACTIVE }}">Đang
                                        Đóng</option>
                                    <option value="{{ \App\Models\Category::ACTIVE }}">Đang mở
                                    </option>
                                </select>
                                <small id="" class="form-text text-muted"></small>
                                @error('status')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="form-actions">
                                <a class="btn btn-secondary float-right" href="{{ route('categories.index') }}">Hủy</a>
                                <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
   <!-- Thêm mã CSS của CKEditor -->
{{-- <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
        contentsCss: '/path/to/your/custom-styles.css',
    });
</script> --}}
@endsection
