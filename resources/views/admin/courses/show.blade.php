@extends('admin.layouts.master')
@section('content')
<div class="page-inner">
    <header class="page-title-bar">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('courses.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý
                        Khóa Học</a>
                </li>
            </ol>
        </nav>
        <!-- <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> -->
        <div class="d-md-flex align-items-md-start">
            <h1 class="page-title mr-sm-auto">Chi Tiết Khóa Học</h1>
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
                            <style>
                                .description-cell {
                                    max-width: 500px;
                                    text-overflow: ellipsis;
                                }

                                .description-cell p {
                                    margin: 0;
                                }
                            </style>
                            <td class="description-cell">
                                <p>{{ $item->description }}</p>
                            </td>
                            <td>
                                    @if ($item->image_url)
                                    <img width="100" height="90" src="{{ asset($item->image_url) }}" alt="Image">
                                    @else
                                    Không có ảnh
                                    @endif
                                </td>
                                <td class="video_url-cell">
                                    @if ($item->video_url)
                                    <video width="300" height="400" controls>
                                        <source src="{{ asset('storage/videos/' . $item->video_url) }}" type="video/mp4">
                                    </video>    
                                    @else
                                    <p>Không có video</p>
                                    @endif
                                </td>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div><!-- /.page -->
</div><!-- /.wrapper -->
</div>
@endsection