@extends('admin.layouts.master')
@section('content')

<div class="page">
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('lession.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Bài Học</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title">Sửa Thông Tin Bài Học</h1>
        </header>
        <div class="page-section">
            <form action="{{ route('lession.update', $lessions->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-body">
                        <legend>Thông tin cơ bản</legend>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="name">Tên bài học<abbr name="Trường bắt buộc">*</abbr></label>
                                <input name="name" value="{{ $lessions->name }}" type="text" class="form-control" id="name" placeholder="Nhập tên bài học">
                                <small id="nameHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="type">Loại bài học<abbr name="Trường bắt buộc">*</abbr></label>
                                <input name="type" value="{{ $lessions->type }}" class="form-control" id="type" placeholder="Nhập loại bài học">
                                <small id="typeHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="content">Nội dung bài</label>
                                <input name="content" value="{{ $lessions->content }}" class="form-control" id="content" placeholder="Nhập nội dung bài học">
                                <small id="contentHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="duration">Khoảng thời gian</label>
                                <input name="duration" value="{{ $lessions->duration }}" class="form-control" id="duration" placeholder="Nhập khoảng thời gian">
                                <small id="durationHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="image">Ảnh</label>
                                <input type="file" class="form-control" name="image_url">
                                <img src="{{ asset($lessions->image_url) ?? asset('public/images/' . old('image', $lessions->image)) }}" width="90px" height="90px" id="image-preview" alt="">
                                <small id="imageHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="video_url">Video</label>
                                <input type="text" class="form-control" name="video_url" placeholder="Nhập URL video" value="{{ $lessions->video_url }}">
                                <small id="videoUrlHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="form-actions">
                            <a class="btn btn-secondary float-right" href="{{ route('lession.index') }}">Hủy</a>
                            <button class="btn btn-primary ml-auto" type="submit">Lưu thay đổi</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection