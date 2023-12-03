@extends('admin.layouts.master')
@section('content')
    <div class="page">
        <div class="page-inner">
            <header class="page-title-bar">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="{{ route('courses.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản
                                Lý Khóa Học</a>
                        </li>
                    </ol>
                </nav>
                <h1 class="page-title">Thêm Khóa Học</h1>
            </header>
            <div class="page-section">
                <form method="post" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <legend>Thông tin cơ bản</legend>
                            <div class="form-group">
                                <label for="name">Tên khóa học <abbr name="Trường bắt buộc">*</abbr></label>
                                <input name="name" type="text" value="" class="form-control" id=""
                                    placeholder="Nhập tên danh mục khóa học">
                                <small id="" class="form-text text-muted"></small>
                                @error('name')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Mô tả <abbr name="Trường bắt buộc">*</abbr></label>
                                <textarea class="form-control" rows="4" name="description" id="description" placeholder="Nhập mô tả"></textarea>
                                <small id="" class="form-text text-muted"></small>
                                @error('description')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="price">Giá <abbr name="Trường bắt buộc">*</abbr></label>
                                    <input name="price" type="number" value="" class="form-control" id=""
                                        placeholder="Nhập giá">
                                    <small id="" class="form-text text-muted"></small>
                                    @error('price')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="status">Trạng thái<abbr name="Trường bắt buộc">*</abbr></label>
                                    <select name="status" class="form-control">
                                        <option value="">--Vui lòng chọn--</option>
                                        <option value="{{ \App\Models\Course::INACTIVE }}">Đang
                                            Đóng</option>
                                        <option value="{{ \App\Models\Course::ACTIVE }}">Đang mở
                                        </option>
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
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                            <option value="{{ $level->id }}">{{ $level->name }}</option>
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
                                    <input name="image_url" type="file" value="" class="form-control"
                                        id="">
                                    <small id="" class="form-text text-muted"></small>
                                    @error('image_url')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="video_url">Video <abbr name="Trường bắt buộc">*</abbr></label>
                                    <input name="video_url" type="text" value="" class="form-control"
                                        id="">
                                    <small id="" class="form-text text-muted"></small>
                                    @error('video_url')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
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
@endsection
