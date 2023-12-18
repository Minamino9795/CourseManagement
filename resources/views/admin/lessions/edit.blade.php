@extends('admin.layouts.master')
@section('content')

<div class="page">
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('lessions.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Bài Học</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title">Sửa Thông Tin Bài Học</h1>
        </header>
        <div class="page-section">
            <form action="{{ route('lessions.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-body">
                        <legend>Thông tin cơ bản</legend>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="name">Tên bài học<abbr name="Trường bắt buộc">*</abbr></label>
                                <input name="name" value="{{ $item->name }}" type="text" class="form-control" id="name" placeholder="Nhập tên bài học">
                                <small id="nameHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="type">Loại bài học<abbr name="Trường bắt buộc">*</abbr></label>
                                <input name="type" value="{{ $item->type }}" class="form-control" id="type" placeholder="Nhập loại bài học">
                                <small id="typeHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="content">Nội dung bài</label>
                                <textarea name="content" class="form-control" id="content" placeholder="Nhập nội dung bài học">{{ $item->content }}</textarea>
                                <small id="contentHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="duration">Khoảng thời gian</label>
                                <input name="duration" value="{{ $item->duration }}" class="form-control" id="duration" placeholder="Nhập khoảng thời gian">
                                <small id="durationHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="image">Ảnh</label>
                                <input type="file" name="image_url"><br>
                                <input type="hidden" name="old_image" value="{{ $item->image_url }}"><br>
                                <img width="100" height="100" src="{{ asset($item->image_url) }}" alt=""><br>
                                <small id="imageHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="video_url">Video</label>
                                <div>
                                    <video id="current_video" width="300" height="400"   controls>
                                        <source src="{{ asset('storage/videos/' . $item->video_url) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div>
                                    <input type="file" class="form-control" name="video_url" id="new_video_url" accept="video/*">
                                </div>
                                <small id="videoUrlHelp" class="form-text text-muted"></small>
                            </div>

                            <script>
                                // Xử lý sự kiện khi chọn tệp video mới
                                document.getElementById('new_video_url').addEventListener('change', function(event) {
                                    var videoPlayer = document.getElementById('current_video');
                                    var newVideo = event.target.files[0];

                                    // Kiểm tra xem người dùng đã chọn tệp video mới hay chưa
                                    if (newVideo) {
                                        // Tạo URL tạm thời cho tệp video mới
                                        var newVideoURL = URL.createObjectURL(newVideo);

                                        // Cập nhật nguồn video và hiển thị video mới
                                        videoPlayer.src = newVideoURL;
                                    }
                                });
                            </script>
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