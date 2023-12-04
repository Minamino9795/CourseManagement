<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
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
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        div[style="color: red"] {
            color: red;
        }
    </style>
</head>

<body>
    <h2>CHỈNH SỬA DANH MỤC</h2>

    <form action="<?php echo route('categories.update', $categories->id); ?>" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Tên danh mục:</label><br>
            <input type="text" name="name" placeholder="Enter category name" value="{{ $categories->name }}"><br>
        </div>
        <div class="mb-3">
            <label for="name">Mô tả:</label><br>
            <input type="text" name="description" placeholder="Nhập mô tả" value="{{ $categories->description }}"><br>
        </div>
        <div class="mb-3">
            <label>Trạng thái:</label><br>
            <select name="status" class="form-control">
                <option value="0" {{ $categories->status ? 'selected' : '' }}>Đang mở</option>
                <option value="1" {{ $categories->status ? 'selected' : '' }}>Đang đóng</option>
            </select><br>
        </div><br>

        <input type="submit" onclick=" return confirm('Bạn chắc chắn muốn thay đổi?')" value="Submit">
    </form>
</body>

</html>
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
                <h1 class="page-title">Chỉnh Sửa Danh Mục Khóa Học</h1>
            </header>
            <div class="page-section">
                <form method="post" action="{{ route('categories.update', $categories->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <legend>Thông tin cơ bản</legend>
                            <div class="form-group">
                                <label for="tf1">Tên danh mục khóa học <abbr name="Trường bắt buộc">*</abbr></label>
                                <input name="name" type="text" value="{{ $categories->name }}" class="form-control"
                                    id="" placeholder="Nhập tên danh mục khóa học">
                                <small id="" class="form-text text-muted"></small>
                                @error('name')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tf1">Mô tả <abbr name="Trường bắt buộc">*</abbr></label>
                                <textarea name="description" type="text"class="form-control" id="" placeholder="Nhập mô tả">{{ $categories->description }}</textarea>

                                <small id="" class="form-text text-muted"></small>
                                @error('description')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tf1">Trạng thái<abbr name="Trường bắt buộc">*</abbr></label>
                                <select name="status" class="form-control">
                                    <option value="">--Vui lòng chọn--</option>
                                    <option value="{{ \App\Models\Category::INACTIVE }}"
                                        {{ old('status', $categories->status) == \App\Models\Category::INACTIVE ? 'selected' : '' }}>
                                        Đang đóng</option>
                                    <option value="{{ \App\Models\Category::ACTIVE }}"
                                        {{ old('status', $categories->status) == \App\Models\Category::ACTIVE ? 'selected' : '' }}>
                                        Đang mở</option>
                                </select>
                                <small id="" class="form-text text-muted"></small>
                                @error('status')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-actions">
                                <a class="btn btn-secondary float-right" href="{{ route('categories.index') }}">Hủy</a>
                                <button class="btn btn-primary ml-auto" type="submit">Lưu thay đổi</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
>>>>>>> d8072b3b7ec4e6856e99ae85877a3beea806cfb1
