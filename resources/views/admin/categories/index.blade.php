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
                                    <th>Mô tả</th>
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
                                        <td>
                                            <p>{{ $category->description }}</p>
                                        </td>
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
