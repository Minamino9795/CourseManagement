@extends('admin.layouts.master')
@section('content')
<div class="page">
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('courses.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Khóa Học</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title">Sửa thông tin Khóa Học</h1>
        </header>
        <div class="page-section">
            <form method="POST" action="{{ route('courses.update', $item->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <legend>Thông tin cơ bản</legend>
                        <div class="form-group">
                            <label for="name">Tên khóa học <abbr name="Trường bắt buộc">*</abbr></label>
                            <input name="name" type="text" value="{{ $item->name }}" class="form-control" id="" placeholder="Nhập tên danh mục khóa học">
                            <small id="" class="form-text text-muted"></small>
                            @error('name')
                            <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Mô tả <abbr name="Trường bắt buộc">*</abbr></label>
                            <textarea class="form-control" rows="4" name="description" id="description" placeholder="Nhập mô tả">{{ $item->description }}</textarea>
                            <small id="" class="form-text text-muted"></small>
                            @error('description')
                            <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="price">Giá <abbr name="Trường bắt buộc">*</abbr></label>
                                <input name="price" type="number" value="{{ $item->price }}" class="form-control" id="" placeholder="Nhập giá">
                                <small id="" class="form-text text-muted"></small>
                                @error('price')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="status">Trạng thái<abbr name="Trường bắt buộc">*</abbr></label>
                                <select name="status" class="form-control">
                                    <option value="">--Vui lòng chọn--</option>
                                    <option value="{{ \App\Models\Course::INACTIVE }}" {{ old('status', $item->status) == \App\Models\Course::INACTIVE ? 'selected' : '' }}>
                                        Đang đóng</option>
                                    <option value="{{ \App\Models\Course::ACTIVE }}" {{ old('status', $item->status) == \App\Models\Course::ACTIVE ? 'selected' : '' }}>
                                        Đang mở</option>
                                </select>
                                <small id="" class="form-text text-muted"></small>
                                @error('status')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="category_id">Danh mục<abbr name="Trường bắt buộc">*</abbr></label>
                                <select name="category_id" class="form-control">
                                    <option>--Vui lòng chọn--</option>
                                    @foreach ($categories as $category)
                                    <<option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                        </option>
                                        @endforeach
                                </select>
                                <small id="" class="form-text text-muted"></small>
                                @error('category_id')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="level_id">Cấp độ<abbr name="Trường bắt buộc">*</abbr></label>
                                <select name="level_id" class="form-control">
                                    <option>--Vui lòng chọn--</option>
                                    @foreach ($levels as $level)
                                    <<option value="{{ $level->id }}" {{ $item->level_id == $level->id ? 'selected' : '' }}>
                                        {{ $level->name }}
                                        </option>
                                        @endforeach
                                </select>
                                <small id="" class="form-text text-muted"></small>
                                @error('level_id')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="image_url">Hình ảnh <abbr name="Trường bắt buộc">*</abbr></label>
                                <img width="100" height="100" src="{{ asset($item->image_url) }}" alt=""><br>
                                <input type="file" name="image_url"><br>
                                <input type="hidden" name="old_image" value="{{ $item->image_url }}"><br>
                                <small id="imageHelp" class="form-text text-muted"></small>
                                @error('image_url')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
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

                    </div>
                </div>

        </div>

        <div class="form-actions">
            <a class="btn btn-secondary float-right" href="{{ route('courses.index') }}">Hủy</a>
            <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
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