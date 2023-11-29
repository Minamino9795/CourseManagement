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
