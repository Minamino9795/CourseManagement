@extends('admin.layouts.master')
@section('content')


<div class="page">
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
                    </li>
                </ol>
            </nav>
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto">Quản Lý Bài Học</h1>
                <div class="btn-toolbar">
                    <a href="{{ route('lession.create') }}" class="btn btn-primary mr-2">
                        <i class="fa-solid fa fa-plus"></i>
                        <span class="ml-1">Thêm Mới</span>
                    </a>
                    <a href="https://thptatuc-backend.quanlythietbitruonghoc.com/users/getImport" class="btn btn-primary mr-2">
                        <i class="fa-solid fa fa-arrow-down"></i>
                        <span class="ml-1">Import Excel</span>
                    </a>
                    <a href="https://thptatuc-backend.quanlythietbitruonghoc.com/users/export" class="btn btn-primary mr-2">
                        <i class="fa-solid fa fa-arrow-up"></i>
                        <span class="ml-1">Export Excel</span>
                    </a>
                </div>
            </div>
        </header>
        <div class="page-section">
            <div class="card card-fluid">
                <div class="col">
                <form action="{{ route('lession.index') }}" method="GET" class="search-form">
                        <div class="row">
                            <div class="col">
                                <input name="search" class="form-control" type="text" placeholder=" Tên..." value="">
                            </div>
                            <div class="col">
                                <input name="search" class="form-control" type="text" placeholder=" Loại bài học ..." value="">
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearch" type="submit">Tìm Kiếm</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active " href="https://thptatuc-backend.quanlythietbitruonghoc.com/users">Tất Cả</a>
                        </li>
                    </ul>
                </div>

                <form action="{{ route('lession.index') }}" method="GET">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên</th>
                                        <th>Loại bài học</th>
                                        <th>Nội dung bài học</th>
                                        <th>Ảnh</th>
                                        <th>Video</th>
                                        <th>Thời gian</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lessions as $key => $lession)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $lession->name }}</p>

                                        </td>
                                        <td>{{ $lession->type }}</td>
                                        <td>{{ $lession->content }}</td>
                                        <td> <img width="90px" height="90px" src="{{ asset($lession->image_url) }}" alt="">
                                        </td>
                                        <td>{{ $lession->video_url }}</td>
                                        <td>{{ $lession->duration }}</td>
                                        <td>
                                            <span class="sr-only">Edit</span> <a href="{{ route('lession.edit', $lession->id) }}" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Remove</span></a>
                                            <form action="{{ route('lession.destroy', $lession->id) }}" method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" onclick="return confirm('Bạn có muốn xóa không ?')" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            <div style="float:right">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection