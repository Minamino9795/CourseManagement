<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>



    <!-- Thêm các liên kết CSS và JS cho thông báo -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>

</head>

<body>
  <div>
  @if (session('successMessage'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '<h6>{{ session('successMessage') }}</h6>',
                    showConfirmButton: false,
                    timer: 2000,
                    width: '300px',
                    customClass: {
                        popup: 'animated bounce',
                    },
                    background: '#f4f4f4',
                    iconColor: '#00a65a',
                });
            </script>
        @endif

    <div class="panel-heading">
        <h2 class="offset-4">BÀI HỌC</h2>
    </div>
    <div class="">
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <form action="{{ route('lession.index') }}" method="GET">
                    <div class="input-group">
                        <div class="form-outline">
                            <input type="text" name="search" placeholder="Nhập từ tìm kiếm .....">
                            <button type="submit">
                            <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form><br>
                <a href="{{ route('lession.create') }}" class="btn btn-success"> <i class="fas fa-plus"></i> Thêm mới</a>

                <table class="table table-hover" border="" width="100%">
                    <thead style="background: rgb(51, 51, 53)">
                        <tr>
                            <th scope="col" style="color: white">Stt</th>
                            <th scope="col" style="color: white">Tên </th>
                            <th scope="col" style="color: white">Loại bài học</th>
                            <th scope="col" style="color: white">Nội dung bài học</th>
                            <th scope="col" style="color: white">Ảnh</th>
                            <th scope="col" style="color: white">Video</th>
                            <th scope="col" style="color: white"> Thời gian</th>
                            <th scope="col" style="color: white">Hành động</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lessions as $key => $lession)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $key + 1 }}</h6>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $lession->name }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $lession->type }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $lession->content }}</p>
                            </td>
                            <td>
                            <img width="90px" height="90px" src="{{ asset($lession->image_url) }}" alt="">
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $lession->video_url }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $lession->duration }}</p>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu">

                                        <a class="dropdown-item" href="{{ route('lession.edit', $lession->id) }}">
                                            <i class="fas fa-edit"></i> Sửa
                                        </a>

                                        <form method="POST" action="{{ route('lession.destroy', $lession->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" onclick="return confirm('Bạn có muốn xóa ?')">
                                                <i class="fas fa-trash-alt"></i> Xóa
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $lessions->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>  

</body>

                
</html>