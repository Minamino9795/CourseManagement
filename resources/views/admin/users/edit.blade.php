@extends('admin.layouts.master')
@section('content')
<div class="page">
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('users.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý
                            Người Dùng</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title">Sửa Thông Tin Người Dùng</h1>
        </header>
        <div class="page-section">
            <form method="post" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <legend>Thông tin cơ bản</legend>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="tf1">Tên người dùng<abbr name="Trường bắt buộc">*</abbr></label>
                                <input name="name" value="{{ $user->name }}" type="text" class="form-control" id="" placeholder="Nhập tên giáo viên">
                                <small id="" class="form-text text-muted"></small>
                                @error('name')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="tf1">Email<abbr name="Trường bắt buộc">*</abbr></label>
                                <input name="email" type="text" value="{{ $user->email }}" class="form-control" id="" placeholder="Nhập E-mail">
                                <small id="" class="form-text text-muted"></small>
                                @error('email')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="tf1">Mật khẩu<abbr name="Trường bắt buộc"></abbr></label>

                                <input name="password" type="password" class="form-control" id="" placeholder="Nhập mật khẩu">
                                <small id="" class="form-text text-muted"></small>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="tf1">Địa chỉ<abbr name="Trường bắt buộc">*</abbr></label>
                                <input name="address" value="{{ $user->address }}" type="text" value="test" class="form-control" id="" placeholder="Nhập địa chỉ">
                                <small id="" class="form-text text-muted"></small>
                                @error('address')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="tf1">Số điện thoại<abbr name="Trường bắt buộc">*</abbr></label>
                                <input name="phone" type="text" value="{{ $user->phone }}" class="form-control" id="" placeholder="Nhập số điện thoại">
                                <small id="" class="form-text text-muted"></small>
                                @error('phone')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="tf1">Ngày sinh<abbr name="Trường bắt buộc">*</abbr></label>
                                <input name="birthday" type="date" value="{{ $user->birthday }}" class="form-control" id="" placeholder="">
                                <small id="" class="form-text text-muted"></small>
                                @error('birthday')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="tf1">Giới tính<abbr name="Trường bắt buộc">*</abbr></label>
                                <select name="gender" id="" class="form-control">
                                    <option value="Nam" {{ old('gender', $user->gender) === 'Nam' ? ' selected' : '' }}>Nam</option>
                                    <option value="Nữ" {{ old('gender', $user->gender) === 'Nữ' ? ' selected' : '' }}>Nữ</option>
                                    <option value="Khác" {{ old('gender', $user->gender) === 'Khác' ? ' selected' : '' }}>Khác</option>
                                </select>
                                <small id="" class="form-text text-muted"></small>
                                @error('gender')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="tf1">Chức vụ<abbr name="Trường bắt buộc">*</abbr></label>
                                <select name="group_id" id="" class="form-control">
                                    @foreach ($groups as $group)
                                    <option value="{{ $group->id }}" {{ old('group_id', $user->group_id) == $group->id ? ' selected' : '' }}>{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                <small id="" class="form-text text-muted"></small>
                                @error('group_id')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="image">Ảnh<abbr name="Trường bắt buộc"></abbr></label>
                                <input type="file" class="form-control" name="image">
                                <img src="{{ asset(old('image', $user->image)) }}" width="90px" height="90px" id="blah1" alt="">
                                <small id="" class="form-text text-muted"></small>
                                @error('image')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="tf1">Trạng thái<abbr name="Trường bắt buộc">*</abbr></label>
                                <select name="status" id="" class="form-control">
                                    <option value="{{ \App\Models\Category::INACTIVE }}" {{ old('status', $user->status) == \App\Models\Category::INACTIVE ? ' selected' : '' }}>Không tồn tại</option>
                                    <option value="{{ \App\Models\Category::ACTIVE }}" {{ old('status', $user->status) == \App\Models\Category::ACTIVE ? ' selected' : '' }}>Tồn tại</option>
                                </select>
                                <small id="" class="form-text text-muted"></small>
                                @error('status')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="form-actions">
                            <a class="btn btn-secondary float-right" href="{{ route('users.index') }}">Hủy</a>
                            <button class="btn btn-primary ml-auto" type="submit">Lưu thay đổi</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection