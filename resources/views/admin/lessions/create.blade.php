@extends('admin.layouts.master')
@section('content')
    <div class="page">
        <div class="page-inner">
            <header class="page-title-bar">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="">
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
                                    <input name="name" value="{{ old('name') }}" type="text" class="form-control" 
                                        placeholder="Nhập tên bài học">
                                    <small class="form-text text-muted"></small>
                                    @error('name')
                                    <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="type">Loại bài học<abbr name="Trường bắt buộc">*</abbr></label>
                                    <input name="type" type="text" value="{{ old('type') }}" class="form-control"
                                        placeholder="Nhập loại bài học">
                                    <small class="form-text text-muted"></small>
                                    @error('type')
                                    <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="content">Nội dung<abbr name="Trường bắt buộc">*</abbr></label>
                                    <textarea name="content" type="text" value="{{ old('content') }}" class="form-control"
                                         placeholder="Nhập mật nội dung"></textarea>
                                    <small class="form-text text-muted"></small>
                                    @error('content')
                                    <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="duration">Khoảng thời gian<abbr name="Trường bắt buộc">*</abbr></label>
                                    <input name="duration" type="number" value="{{ old('duration') }}" class="form-control"
                                         placeholder="Nhập khoảng thời gian">
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
                                    @error('image_url')
                                    <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="video_url">Video<abbr name="Trường bắt buộc">*</abbr></label>
                                    <input name="video_url" type="text" value="{{ old('video_url') }}" class="form-control"
                                        id="video_url" placeholder="Nhập số video">
                                    <small class="form-text text-muted"></small>
                                    @error('video_url')
                                    <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-actions">
                                <a class="btn btn-secondary float-right" href="{{ route('lessions.index') }}">Hủy</a>
                                <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
