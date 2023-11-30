@extends('admin.layouts.master')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <h2>THÊM CẤP ĐỘ KHÓA HỌC</h2>
   
    <form method="post" action="{{ route('levels.store') }}">
    @csrf
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <div class="form-group">
                    <label for="name">Tên cấp độ<abbr name="Trường bắt buộc">*</abbr></label> 
                    <input name="name" type="text" class="form-control" id="name" placeholder="Nhập tên khóa học" value="{{ old('name') }}">
                    <small id="" class="form-text text-muted"></small>
                    @error('name')
                    <div style="color: red">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                    <label for="level">Cấp độ<abbr name="Trường bắt buộc">*</abbr></label>
                    <input name="level" type="text" class="form-control" id="level" placeholder="Nhập tên số cấp độ">
                    <small class="form-text text-muted"></small>
                    @error('level')
                    <div style="color: red">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                    <label for="status">Trạng thái<abbr name="Trường bắt buộc">*</abbr></label> 
                    <select class="form-select" name="status" >
                        <option value="">--Vui lòng chọn--</option>
                        <option @selected (request()-> status == \App\Models\Level::ACTIVE) value="{{ \App\Models\Level::ACTIVE }}" >Đang đóng</option>
                        <option @selected (request()-> status == \App\Models\Level::INACTIVE) value="{{ \App\Models\Level::INACTIVE }}" >Đang mở</option>
                        <option value="" ></option>
                    </select>
                    <small id="" class="form-text text-muted"></small>
                    @error('status')
                    <div style="color: red">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-actions">
                    <a class="btn btn-secondary float-right" href="{{ route('levels.index') }}">Hủy</a>
                    <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </form>
@endsection
