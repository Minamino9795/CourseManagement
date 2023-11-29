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
