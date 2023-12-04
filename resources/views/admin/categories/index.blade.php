<<<<<<< HEAD
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
                        <div class="input-group">
                            <div class="form-outline">
                                <input type="text" name="search" placeholder=" Nhập từ tìm kiếm">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form><br>
                    <a href="{{ route('categories.create') }}" class="btn btn-success"> <i class="fas fa-plus"></i> Thêm
                        mới</a>

                    <table class="table table-hover" border="1">
                        <thead style="background: rgb(51, 51, 53)">
                            <tr>
                                <th scope="col" style="color: white">Stt</th>
                                <th scope="col" style="color: white">Tên danh mục</th>
                                <th scope="col" style="color: white">Mô tả</th>
                                <th scope="col" style="color: white">Trạng thái</th>
                                <th scope="col" style="color: white">Tùy chọn</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
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
                                    @if ($category->status == $activeStatus)
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
                                                <a class="dropdown-item"
                                                    href="{{ route('categories.show', $category->id) }}">
                                                    <i class="fas fa-eye"></i> Show
                                                </a>
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
                    {{ $categories->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
=======
@extends('admin.layouts.master')
@section('content')
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('categories.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang
                            Chủ</a>
                    </li>
                </ol>
            </nav>
            <!-- <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> -->
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto">Quản Lý Danh Mục Khóa Học</h1>
                <div class="btn-toolbar">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary mr-2">
                        <i class="fa-solid fa fa-plus"></i>
                        <span class="ml-1">Thêm Mới</span>
                    </a>
                    <a href="https://thptatuc-backend.quanlythietbitruonghoc.com/devices/getImport"
                        class="btn btn-primary mr-2">
                        <i class="fa-solid fa fa-arrow-down"></i>
                        <span class="ml-1">Import Excel</span>
                    </a>
                    <a href="https://thptatuc-backend.quanlythietbitruonghoc.com/devices/export"
                        class="btn btn-primary mr-2">
                        <i class="fa-solid fa fa-arrow-up"></i>
                        <span class="ml-1">Export Excel</span>
                    </a>
                </div>
            </div>
        </header>
        <div class="page-section">
            <div class="card card-fluid">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active " href="">Tất Cả</a>
                        </li>

                    </ul>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <form action="{{ route('categories.index') }}" method="GET" id="form-search">

                                <div class="row">
                                    <div class="col">
                                        <input name="name" value="" class="form-control" type="text"
                                            placeholder=" Tìm tên danh mục...">
                                    </div>

                                    <div class="col">
                                        <select name="status" class="form-control">
                                            <option value="">Trạng thái</option>
                                            <option value="{{ \App\Models\Category::INACTIVE }}">
                                                Đang đóng
                                            </option>
                                            <<option value="{{ \App\Models\Category::ACTIVE }}">
                                                Đang mở
                                                </option>
                                        </select>
                                    </div>

                                    <div class="col-lg-2">
                                        <button class="btn btn-secondary" type="submit">Tìm Kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if (session('success'))
                    <div id="successAlert" class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    <script>
                        var delayTime = 1500;
                        var successAlert = document.getElementById('successAlert');
                        setTimeout(function () {
                            successAlert.style.display = 'none';
                        }, delayTime);
                    </script>
                @endif
                

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên danh mục</th>
                                    {{-- <th>Mô tả</th> --}}
                                    <th>Trạng thái</th>
                                    <th>Chức năng</th>
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
                                            <p>{{ $category->name }}</p>
                                        </td>
                                        {{-- <td>
                                            <p>{!! $category->description !!}</p>
                                        </td> --}}
                                        @if ($category->status == \App\Models\Category::ACTIVE)
                                            <td><span>
                                                    <i class="fas fa-check-circle"></i> Đang mở
                                                </span></td>
                                        @else
                                            <td> <span>
                                                    <i class="fas fa-times-circle"></i> Đang đóng
                                                </span></td>
                                        @endif

                                        <td>
                                            
                                                <span class="sr-only">Show</span>
                                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-icon btn-secondary">
                                                    <i class="fa fa-eye"></i>
                                                    <span class="sr-only">Show</span>
                                                </a>
                                         
                                            
                                            <span class="sr-only">Edit</span> <a
                                                href="{{ route('categories.edit', $category->id) }}"
                                                class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i>
                                                <span class="sr-only">Remove</span></a>
                                            <form method="POST" action="{{ route('categories.destroy', $category->id) }}"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE') <button type="submit"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"
                                                    class="btn btn-sm btn-icon btn-secondary"><i
                                                        class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $items->links('pagination::bootstrap-5') }}
                        <div style="float:right">

                        </div>
                    </div>
                </div>
            </div><!-- /.page -->
        </div><!-- /.wrapper -->
    </div>
@endsection
>>>>>>> d8072b3b7ec4e6856e99ae85877a3beea806cfb1
