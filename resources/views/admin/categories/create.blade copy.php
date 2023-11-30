@extends('admin.layouts.master')
@section('content')

    <h2>THÊM DANH MỤC KHÓA HỌC</h2>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tên danh mục:</label>
            <input type="text" name="name" class="form-control" placeholder="Nhập tên">
            @error('name')
                <div style="color: red">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Mô tả:</label>
            <input type="text" name="description" class="form-control" placeholder="Nhập mô tả">
            @error('description')
            <div style="color: red">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label>Trạng thái:</label>
            <select name="status" class="form-control">
                <option @selected(request()->status == \App\Models\Category::INACTIVE) value="{{ \App\Models\Category::INACTIVE }}">Đang Đóng</option>
                <option @selected(request()->status == \App\Models\Category::ACTIVE) value="{{ \App\Models\Category::ACTIVE }}">Đang mở</option>
            </select><br>
        </div><br>
        <div class="mb-3">
            <input type="submit" value="Submit">
        </div>
    </form>
@endsection


