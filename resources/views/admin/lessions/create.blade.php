@extends('admin.layouts.master')
@section('content')

<body>
    <h2> THÊM BÀI HỌC </h2>
    <form action="{{ route('lession.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>TÊN:</label>
            <input type="text" name="name" class="form-control" placeholder="Nhập tên" value="{{ old('name') }}">
            @error('name')
            <div style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>LOẠI BÀI HỌC:</label>
            <input type="text" name="type" class="form-control" placeholder="Nhập loại" value="{{ old('type') }}">
            @error('type')
            <div style="color: red">{{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label>NỘI DUNG:</label>
            <input type="text" name="content" class="form-control" placeholder="Nhập nội dung" value="{{ old('content') }}">
            @error('content')
            <div style="color: red">{{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label>ẢNH:</label>
            <input type="file" name="image_url" class="form-control" placeholder="Thêm ảnh">
            @error('image_url')
            <div style="color: red">{{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label>VIDEO:</label>
            <input type="text" name="video_url" class="form-control" placeholder="Thêm video" value="{{ old('video_url') }}">
            @error('video_url')
            <div style="color: red">{{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label>THỜI GIAN:</label>
            <input type="number" name="duration" class="form-control" placeholder="Nhập khoảng thời gian" value="{{ old('duration') }}">
            @error('duration')
            <div style="color: red">{{ $message }}
            </div>
            @enderror
        </div><br>
        <div class="mb-3">
            <input type="submit" value="Thêm mới">
        </div>

    </form>

</body>

@endsection
