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
                <h1 class="page-title mr-sm-auto">Chỉnh Sửa Chương Học</h1>
            </div>
            <form action="{{ route('chapters.update', $item->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <legend>Thông tin cơ bản</legend>
                        <div class="form-group">
                            <label for="name">Tên chương học</label>
                            <input type="text" name="name" value="{{ $item->name }}" class="form-control"
                                placeholder="Nhập tên khóa học ">
                            <small class="form-text text-muted"></small>
                        </div>

                  
                        <div class="form-group">
                            <label for="status">Tên khóa học<abbr name="Trường bắt buộc">*</abbr></label>
                            <select name="course_id" class="form-control">
                                <option value="">-- Vui lòng chọn --</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ $item->course_id == $course->id ? 'selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                            <small id="" class="form-text text-muted"></small>
                        </div>

                        <div class="form-actions">
                            <a class="btn btn-secondary float-right" href="{{ route('chapters.index') }}">
                                Hủy
                            </a>
                            <button class="btn btn-primary ml-auto" type="submit">
                                Cập nhật
                            </button>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>
@endsection
