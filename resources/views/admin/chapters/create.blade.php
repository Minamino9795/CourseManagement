@extends('admin.layouts.master')
@section('content')
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('chapters.index') }}">
                            <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>
                            Trang Chủ
                        </a>
                    </li>
                </ol>
            </nav>
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto">Thêm Chương Học</h1>
            </div>
        </header>

        <form method="post" action="{{ route('chapters.store') }}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <legend>Thông tin cơ bản</legend>
                    <div class="form-group">
                        <label for="name">Tên chương học<abbr name="Trường bắt buộc">*</abbr></label>
                        <input name="name" type="text" class="form-control" id="name"
                            placeholder="Nhập tên chương học" value="{{ old('name') }}">
                        <small id="" class="form-text text-muted"></small>
                         @error('name')
                            <div style="color: red">{{ $message }}</div>
                        @enderror 
                    </div>

                    <div class="form-group">
                        <label for="course_id">Tên khoá học<abbr name="Trường bắt buộc">*</abbr></label>
                        <select name="course_id" class="form-control">
                            <option value="">-- Vui lòng chọn --</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted"></small>
                         @error('course_id')
                            <div style="color: red">{{ $message }}</div>
                        @enderror 
                    </div>
                    <div class="form-actions">
                        <a class="btn btn-secondary float-right" href="{{ route('chapters.index') }}">
                            Hủy
                        </a>
                        <button class="btn btn-primary ml-auto" type="submit">
                            Lưu
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
