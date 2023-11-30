@extends('admin.layouts.master')

@section('content')
    <h1 class="page-title"> Chỉnh Sửa Khóa Học </h1>
    <form action="{{ route('levels.update',$item->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                
                <div class="form-group">
                    <label for="name">Tên khóa học</label>
                    <input type="text" name="name" value="{{ $item->name }}" class="form-control" placeholder="Nhập tên khóa học ">
                    <small class="form-text text-muted"></small>
                </div>
    
                <div class="form-group">
                    <label for="level">Tên cấp độ</label> 
                    <input type="text" name="level" value="{{ $item->level }}"  class="form-control" placeholder="Nhập tên cấp độ ">
                    <small class="form-text text-muted"></small>
                </div>
    
                <div class="form-group">
                    <label for="status">Trạng thái<abbr name="Trường bắt buộc">*</abbr></label> 
                    <select class="" name="status" >
                        <option value="">--Vui lòng chọn--</option>
                        <option @selected (request()-> status == \App\Models\Level::ACTIVE) value="{{ \App\Models\Level::ACTIVE }}" >Đang đóng</option>
                        <option @selected (request()-> status == \App\Models\Level::INACTIVE) value="{{ \App\Models\Level::INACTIVE }}" >Đang mở</option>
                    </select>
                    <small id="" class="form-text text-muted"></small>
                </div>
    
                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{ route('levels.index') }}">Hủy</a>
                    <button class="btn btn-primary ml-auto" type="submit">Cập nhật</button>
                </div>
            </div>
        </div>
    </form>
@endsection




