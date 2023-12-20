@extends('admin.layouts.master')
@section('content')
<div class="page">
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('lessions.index') }}">
                            <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Bài Học
                        </a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title">Thêm Bài Học</h1>
        </header>

        <div class="page-section">
            <form action="{{ route('lessions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <legend>Thông tin cơ bản</legend>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="name">Tên bài học<abbr name="Trường bắt buộc">*</abbr></label>
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="Nhập tên bài học">
                                <small class="form-text text-muted"></small>
                                @error('name')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="type">Loại bài học<abbr name="Trường bắt buộc">*</abbr></label>
                                <select name="type" class="form-control" id="type"> xml_error_string
                                    <option value="">---Vui lòng chọn---</option>
                                    <option value="Bài đọc" {{ old('type') === 'Bài đọc' ? 'selected' : '' }}>Bài đọc
                                    </option>
                                    <option value="Thực hành" {{ old('type') === 'Thực hành' ? 'selected' : '' }}>Thực
                                        hành</option>
                                    <option value="Xem video" {{ old('type') === 'Xem video' ? 'selected' : '' }}>Xem
                                        video</option>
                                </select>
                                <small class="form-text text-muted"></small>
                                @error('type')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="course_id">Khoá Học<abbr name="Trường bắt buộc">*</abbr></label>
                                <select name="course_id" class="form-control">
                                    <option>--Vui lòng chọn--</option>
                                    @foreach ($items as $item)
                                    <option value="{{ $item->id }}" {{ old('course_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <small id="" class="form-text text-muted"></small>
                                @error('course_id')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-md-6 mb-4">
                                <label for="duration">Khoảng thời gian<abbr name="Trường bắt buộc">*</abbr></label>
                                <input name="duration" type="number" value="{{ old('duration') }}" class="form-control" placeholder="Nhập khoảng thời gian">
                                <small class="form-text text-muted"></small>
                                @error('duration')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="image">Ảnh</label>
                                <input name="image_url" type="file" class="form-control" placeholder="Chọn ảnh">
                                <small class="form-text text-muted"></small>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="video_url">Video<abbr name="Trường bắt buộc">*</abbr></label>
                                <input type="file" class="form-control" name="video_url" placeholder="Video..." id="video" accept="video/*">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="content">Nội dung<abbr name="Trường bắt buộc">*</abbr></label>
                            <textarea name="content" class="form-control" id="content" placeholder="Nhập nội dung">{{ old('content') }}</textarea>
                            <small class="form-text text-muted"></small>
                            @error('content')
                            <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-actions">
                        <a class="btn btn-secondary float-right" href="{{ route('lessions.index') }}">Hủy</a>
                        <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endsection