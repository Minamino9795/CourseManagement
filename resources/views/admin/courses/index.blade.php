<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Course</title>
</head>

<body>

    <div class="card">
        <div class="card-body">
            {{-- form search --}}
            <form action="" method="get">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <h5>Search:</h5>
                        </div>

                        <div class="col-md-2">
                            <select name="status" class="form-select">
                                <option value="">Trạng thái</option>
                                <option value="0">Đã triển khai</option>
                                <option value="1">Chưa triển khai</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="level_id" class="form-select">
                                <option value="">Cấp độ</option>
                                <option value="0">Dễ</option>
                                <option value="1">Trung bình</option>
                                <option value="2">Khó</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="price" class="form-select">
                                <option value="">Giá cả</option>
                                <option value="0">Sơ cấp</option>
                                <option value="1">Trung cấp</option>
                                <option value="2">Cao cấp</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="category_id" class="form-select">
                                <option value="">Danh mục</option>
                                <option value="0">Back End</option>
                                <option value="1">Front End</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>

            {{-- table --}}
            <div class="card-body">
                <div class="container">
                    <div>
                        <a href="{{ route('courses.create') }}" class="btn btn-primary" >create</a>
                    </div>
                    <table border="1">
                        <thead>
                            <tr >
                                <th >STT</th>
                                <th >Tên khoá học</th>
                                <th >Mô tả</th>
                                <th >Trạng thái</th>
                                <th >Danh mục</th>
                                <th >Cấp độ</th>
                                <th >Hình ảnh</th>
                                <th >Video</th>
                                <th >Tuỳ chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item )
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->category_id }}</td>
                                    <td>{{ $item->level_id}}</td>
                                    <td>{{ $item->image_url}}</td>
                                    <td>{{ $item->video_url}}</td>
                                    <td>

                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
