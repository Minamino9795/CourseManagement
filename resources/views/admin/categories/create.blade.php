<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            max-width: 80px;
            text-align: center;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h2>THÊM DANH MỤC KHÓA HỌC</h2>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tên danh mục:</label>
            <input type="text" name="name" class="form-control" placeholder="Nhập tên">
            {{-- @error('name')
                <div style="color: red">{{ $message }}</div>
            @enderror --}}
        </div>
        <div class="mb-3">
            <label>Mô tả:</label>
            <input type="text" name="description" class="form-control" placeholder="Nhập mô tả">
        </div>
        <div class="mb-3">
            <label>Trạng thái:</label>
            <select name="status" class="form-control">
                <option value="0">Đang mở</option>
                <option value="1">Đang đóng</option>
            </select><br>
        </div><br>
        <div class="mb-3">
            <input type="submit" value="Submit">
        </div>
    </form>
</body>

</html>
<style>

</style>
=======
@extends('admin.layouts.master')
@section('content')
    <div class="page">
        <div class="page-inner">
            <header class="page-title-bar">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="{{ route('categories.index') }}"><i
                                    class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Danh Mục Khóa Học</a>
                        </li>
                    </ol>
                </nav>
                <h1 class="page-title">Thêm Danh Mục Khóa Học</h1>
            </header>
            <div class="page-section">
                <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <legend>Thông tin cơ bản</legend>
                            <div class="form-group">
                                <label for="tf1">Tên danh mục khóa học <abbr name="Trường bắt buộc">*</abbr></label>
                                <input name="name" type="text" value="" class="form-control" id=""
                                    placeholder="Nhập tên danh mục khóa học">
                                <small id="" class="form-text text-muted"></small>
                                @error('name')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="tf1">Mô tả <abbr name="Trường bắt buộc">*</abbr></label> <input
                                    name="description" type="text" value="" class="form-control" id=""
                                    placeholder="Nhập mô tả">
                                <small id="" class="form-text text-muted"></small>
                                @error('description')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="tf1">Trạng thái<abbr name="Trường bắt buộc">*</abbr></label>
                                <select name="status" class="form-control">
                                    <option value="">--Vui lòng chọn--</option>
                                    <option value="{{ \App\Models\Category::INACTIVE }}">Đang
                                        Đóng</option>
                                    <option value="{{ \App\Models\Category::ACTIVE }}">Đang mở
                                    </option>
                                </select>
                                <small id="" class="form-text text-muted"></small>
                                @error('status')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="form-actions">
                                <a class="btn btn-secondary float-right" href="{{ route('categories.index') }}">Hủy</a>
                                <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
>>>>>>> d8072b3b7ec4e6856e99ae85877a3beea806cfb1
