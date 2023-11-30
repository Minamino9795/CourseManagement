@extends('admin.layouts.master')
@section('content')
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('categories.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý Danh Mục Khóa Học</a>
                    </li>
                </ol>
            </nav>
            <!-- <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> -->
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto">Chi Tiết Danh mục " {{ $items->name }} "</h1>
                <div class="btn-toolbar">
                   
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
                       
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên danh mục</th>
                                    <th>Mô tả</th>
                                    <th>Trạng thái</th>                                  
                                </tr>
                            </thead>
                            <tbody>
                             
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $items->id }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p>{{ $items->name }}</p>
                                        </td>
                                        <td>
                                            <p>{!! $items->description !!}</p>
                                        </td>
                                        @if ($items->status == \App\Models\Category::ACTIVE)
                                            <td><span>
                                                    <i class="fas fa-check-circle"></i> Đang mở
                                                </span></td>
                                        @else
                                            <td> <span>
                                                    <i class="fas fa-times-circle"></i> Đang đóng
                                                </span></td>
                                        @endif

                                       
                                    </tr>
                             
                            </tbody>
                        </table>
                    

                        </div>
                    </div>
                </div>
            </div><!-- /.page -->
        </div><!-- /.wrapper -->
    </div>
@endsection
