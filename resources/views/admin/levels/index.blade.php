@extends('admin.layouts.master')

@section('content')
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="https://thptatuc-backend.quanlythietbitruonghoc.com/nests"><i
                                class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
                    </li>
                </ol>
            </nav>
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto">Cấp độ khóa học</h1>
                <div class="btn-toolbar">
                    <a href="{{ route('levels.create') }}" class="btn btn-primary mr-2">
                        <i class="fa-solid fa fa-plus"></i>
                        <span class="ml-1">Thêm Mới</span>
                    </a>
                    <a href="https://thptatuc-backend.quanlythietbitruonghoc.com/nests/getImport"
                        class="btn btn-primary mr-2">
                        <i class="fa-solid fa fa-arrow-down"></i>
                        <span class="ml-1">Import Excel</span>
                    </a>
                    <a href="https://thptatuc-backend.quanlythietbitruonghoc.com/nests/export" class="btn btn-primary mr-2">
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
                            <a class="nav-link active " href="https://thptatuc-backend.quanlythietbitruonghoc.com/nests">Tất
                                Cả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://thptatuc-backend.quanlythietbitruonghoc.com/nests/trash">Thùng
                                Rác</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <form action="{{ route('levels.index') }}" method="GET"
                                id="form-search">
                                <div class="row">
                                    <div class="col">
                                        <input name="searchname" value="" class="form-control" type="text"
                                            placeholder=" tên...">
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearch"
                                            type="submit">Tìm Kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> STT </th>
                                    <th> Tên khóa học</th>
                                    <th> Cấp độ </th>
                                    <th> Trạng thái </th>
                                    <th> Chức năng </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $key => $item )
                                    
                                @endforeach
                                <tr>    
                                    <td class="align-middle"> {{ ++$key }}</td>
                                    <td class="align-middle"> {{ $item->name }} </td>
                                    <td class="align-middle"> {{ $item->level }} </td>
                                    <td class="align-middle"> {{ $item->status }} </td>

                                    <td>
                                        <form action=""
                                            style="display:inline" method="post">
                                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"
                                                class="btn btn-sm btn-icon btn-secondary"><i
                                                    class="far fa-trash-alt"></i></button>
                                            <input type="hidden" name="_token"
                                                value="GwcyuBsJtNYUq65DqTkxRtce4d2HE5bbcCK0PcwD"> <input type="hidden"
                                                name="_method" value="delete">
                                        </form>
                                        <span class="sr-only">Edit</span> <a
                                            href=""
                                            class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i>
                                            <span class="sr-only">Remove</span></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div style="float:right">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
