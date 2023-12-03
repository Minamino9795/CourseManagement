@extends('admin.layouts.master')
@section('content')
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('courses.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang
                            Chủ</a>
                    </li>
                </ol>
            </nav>
            <!-- <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> -->
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto">Quản Lý Khóa Học</h1>
                <div class="btn-toolbar">

                    <a href="" class="btn btn-primary mr-2">
                        <i class="fa-solid fa fa-arrow-down"></i>
                        <span class="ml-1">Import Excel</span>
                    </a>
                    <a href="" class="btn btn-primary mr-2">
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
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Khóa học</th>
                                <th>Mô tả</th>
                                <th>Hình ảnh</th>
                                <th>Video</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $item->id }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p>{{ $item->name }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->description }}</p>
                                </td>
                                <td>
                                    @if ($item->image_url)
                                        <img width="100" height="90" src="{{ asset($item->image_url) }}"
                                            alt="Image">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ asset($item->video_url) }}"
                                        target="_blank">{{ asset($item->video_url) }}</a>
                                </td>


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
