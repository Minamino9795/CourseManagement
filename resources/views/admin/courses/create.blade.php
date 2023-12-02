<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Create</title>
</head>

<body>
    <h5>Thêm mới khoá học</h5>
    <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">

            <div class="card-body">
                <p>
                    <label for="name">Tên khoá học:</label><br>
                    <input id="name" type="text" name="name" placeholder="Hãy nhập tên danh mục....">
                </p>
                <p>
                    <label for="price">Giá:</label><br>
                    <input id="price" type="text" name="price" placeholder="Hãy nhậpdescription....">
                </p>
                <label for="description">Mô tả:</label><br>
                <input id="description" type="text" name="description" placeholder="Hãy nhập tên danh mục....">
                </p>
                <p>
                    <label for="status">Trạng thái:</label><br>
                    <input id="status" type="text" name="status" placeholder="Hãy nhập tên danh mục....">
                </p>
                <p>
                    <label for="category_id">Tên danh mục:</label><br>
                    <input id="category_id" type="text" name="category_id" placeholder="Hãy nhập tên danh mục....">
                </p>
                <p>
                    <label for="level_id">Cấp độ:</label><br>
                    <input id="level_id" type="text" name="level_id" placeholder="Hãy nhập tên danh mục....">
                </p>
                <p>
                    <label for="image_url">Hình ảnh:</label><br>
                    <input id="image_url" type="text" name="image_url" placeholder="Hãy nhập tên danh mục....">
                </p>
                <p>
                    <label for="video_url">Video:</label><br>
                    <input id="video_url" type="text" name="video_url" placeholder="Hãy nhập tên danh mục....">
                </p>
                <button class="btn btn-info" type="submit">ADD</button>
                <a href="{{ route('courses.index') }}" class="btn btn-warning">BACK</a>
            </div>
        </div>
    </form>
    </div>

</body>

</html>
