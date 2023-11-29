<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=4, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2> CREATE LESSION </h2>
    <form action="{{ route('lession.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Nhập tên">
            {{-- @error('name')
                <div style="color: red">{{ $message }}
        </div>
        @enderror --}}
        </div>
        <div class="mb-3">
            <label>Type:</label>
            <input type="text" name="type" class="form-control" placeholder="Nhập type">
            {{-- @error('type')
                <div style="color: red">{{ $message }}
        </div>
        @enderror --}}
        </div>
        <div class="mb-3">
            <label>content:</label>
            <input type="text" name="content" class="form-control" placeholder="Nhập content">
            {{-- @error('type')
                <div style="color: red">{{ $message }}
        </div>
        @enderror --}}
        </div>
        <div class="mb-3">
            <label>image_url:</label>
            <input type="text" name="image_url" class="form-control" placeholder="Nhập image_url">
            {{-- @error('type')
                <div style="color: red">{{ $message }}
        </div>
        @enderror --}}
        </div>
        <div class="mb-3">
            <label>video_url:</label>
            <input type="text" name="video_url" class="form-control" placeholder="Nhập video_url">
            {{-- @error('type')
                <div style="color: red">{{ $message }}
        </div>
        @enderror --}}
        </div>
        <div class="mb-3">
            <label>duration:</label>
            <input type="number" name="duration" class="form-control" placeholder="Nhập duration">
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