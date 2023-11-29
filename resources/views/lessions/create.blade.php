<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=4, initial-scale=1.0">
    <title>Document</title>
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
    <h2> THÊM BÀI HỌC </h2>
    <form action="{{ route('lession.store') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>TÊN:</label>
            <input type="text" name="name" class="form-control" placeholder="Nhập tên">
            {{-- @error('name')
                <div style="color: red">{{ $message }}
        </div>
        @enderror --}}
        </div>
        <div class="mb-3">
            <label>LOẠI BÀI HỌC:</label>
            <input type="text" name="type" class="form-control" placeholder="Nhập loại">
            {{-- @error('type')
                <div style="color: red">{{ $message }}
        </div>
        @enderror --}}
        </div>
        <div class="mb-3">
            <label>NỘI DUNG:</label>
            <input type="text" name="content" class="form-control" placeholder="Nhập nội dung">
            {{-- @error('type')
                <div style="color: red">{{ $message }}
        </div>
        @enderror --}}
        </div>
        <div class="mb-3">
            <label>ẢNH:</label>
            <input type="file" name="image_url" class="form-control" placeholder="Thêm ảnh">
            {{-- @error('type')
                <div style="color: red">{{ $message }}
        </div>
        @enderror --}}
        </div>
        <div class="mb-3">
            <label>VIDEO:</label>
            <input type="text" name="video_url" class="form-control" placeholder="Thêm video">
            {{-- @error('type')
                <div style="color: red">{{ $message }}
        </div>
        @enderror --}}
        </div>
        <div class="mb-3">
            <label>THỜI GIAN:</label>
            <input type="number" name="duration" class="form-control" placeholder="Nhập khoảng thời gian">
            {{-- @error('type')
                <div style="color: red">{{ $message }}
        </div>
        @enderror --}}
        </div><br>
        <div class="mb-3">
            <input type="submit" value="Submit">
        </div>
        
    </form>

</body>

</html>