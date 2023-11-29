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
    <h2>CHỈNH SỬA</h2>
    <form action="<?php echo route('lession.update', $lessions->id); ?>" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name">TÊN:</label>
            <input type="text" name="name" placeholder="Nhập tên vào" value="{{ $lessions->name }}">
        </div><br>
        <div class="mb-3">
            <label for="name">LOẠI BÀI HỌC:</label>
            <input type="text" name="type" placeholder="Nhập loại bài học" value="{{ $lessions->type }}"><br>
        </div><br>
        <div class="mb-3">
            <label for="name">NÔỊ DUNG BÀI:</label>
            <input type="text" name="content" placeholder="Nhập nội dung" value="{{ $lessions->content }}"><br>
        </div><br>
        <div class="mb-3">
            <label for="image">ẢNH:</label>
            <input type="file" class="form-control-file" id="image_url" name="image_url">
            <br><br>
            <img src="{{ asset($lessions->image_url) ?? asset('public/images/' . old('image', $lessions->image)) }}" width="90px" height="90px" id="blah1" alt="">
            <br><br>
        </div><br>
        <div class="mb-3">
            <label for="name">VIDEO:</label>
            <input type="text" name="video_url" placeholder="Enter category video_url" value="{{ $lessions->video_url}}"><br>
        </div><br>
        <div class="mb-3">
            <label for="name">KHOẢNG THỜI GIAN:</label>
            <input type="number" name="duration" placeholder="Nhập khoảng thời gian" value="{{ $lessions->duration}}"><br>
        </div><br>
        <br>
        <input type="submit" onclick=" return confirm('Bạn chắc chắn muốn thay đổi?')" value="Chỉnh sửa">
    </form>
</body>

</html>