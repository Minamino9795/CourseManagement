<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>



    <!-- Thêm các liên kết CSS và JS cho thông báo -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>

</head>

<body>
    <div class="container">
        <!-- Thông báo -->
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
            <h2 class="offset-4">DANH MỤC KHÓA HỌC</h2>
        </div>
        <div class="">
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <form action="{{ route('categories.index') }}" method="GET">
                        @csrf
                    
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <input type="text" name="name" value="{{ request()->name }}" class="form-control"
                                            placeholder="Nhập tên danh mục">
                                    </div>
                    
                                    <div class="col-md-3 mb-2">
                                        <select name="status" class="form-control">
                                            <option value="{{ \App\Models\Category::INACTIVE }}"
                                                {{ request()->input('status') == \App\Models\Category::INACTIVE ? 'selected' : '' }}>
                                                {{ \App\Models\Category::getDescStatus(\App\Models\Category::INACTIVE) }}
                                            </option>
                                            <option value="{{ \App\Models\Category::ACTIVE }}"
                                                {{ request()->input('status') == \App\Models\Category::ACTIVE ? 'selected' : '' }}>
                                                {{ \App\Models\Category::getDescStatus(\App\Models\Category::ACTIVE) }}
                                            </option>
                                        </select>
                                    </div>
                    
                                    <div class="col-md-2">
                                        <button type="submit"class="btn btn-outline-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <a href="{{ route('categories.create') }}" class="btn btn-success"> <i class="fas fa-plus"></i> Thêm
                        mới</a>

                    <table class="table table-hover" border="1">
                        <thead style="background: rgb(51, 51, 53)">
                            <tr>
                                <th scope="col" style="color: white">STT</th>
                                <th scope="col" style="color: white">Tên danh mục</th>
                                <th scope="col" style="color: white">Mô tả</th>
                                <th scope="col" style="color: white">Trạng thái</th>
                                <th scope="col" style="color: white">Tùy chọn</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $category)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $key + 1 }}</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $category->name }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $category->description }}</p>
                                    </td>
                                    @if ($category->status == \App\Models\Category::ACTIVE)
                                        <td><span class="badge bg-success">
                                                <i class="fas fa-check-circle"></i> Đang mở
                                            </span></td>
                                    @else
                                        <td> <span class="badge bg-danger">
                                                <i class="fas fa-times-circle"></i> Đang đóng
                                            </span></td>
                                    @endif

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                {{-- <a class="dropdown-item"
                                                    href="{{ route('categories.show', $category->id) }}">
                                                    <i class="fas fa-eye"></i> Show
                                                </a> --}}
                                                <a class="dropdown-item"
                                                    href="{{ route('categories.edit', $category->id) }}">
                                                    <i class="fas fa-edit"></i> Sửa
                                                </a>

                                                <form method="POST"
                                                    action="{{ route('categories.destroy', $category->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item"
                                                        onclick="return confirm('Bạn có muốn xóa ?')">
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
                    {{ $items->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
