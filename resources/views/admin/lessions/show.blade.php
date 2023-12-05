@extends('admin.layouts.master')
@section('content')
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('lessions.index') }}">
                            <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>
                            Quản Lý Bài Học
                        </a>
                    </li>
                </ol>
            </nav>
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto">Chi Tiết Bài Học</h1>
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
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên bài học</th>
                                <th>Loại bài học</th>
                                <th>Nội dung bài học</th>
                                <th>Hình ảnh</th>
                                <th>Video</th>
                                <th>Thời gian</th>
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
                                <td >
                                    <p>{{ $item->type }}</p>
                                </td>
                                <td >
                                    <p>{{ $item->content }}</p>
                                </td>
                                <td>
                                    @if ($item->image_url)
                                        <img width="100" height="90" src="{{ asset($item->image_url) }}"
                                            alt="Image">
                                    @endif
                                </td>
                                <td class="video_url-cell">
                                    <a href="{{ asset($item->video_url) }}"
                                        target="_blank">{{ asset($item->video_url) }}</a>
                                </td>
                                <td >
                                    <p>{{ $item->duration }} phút</p>
                                </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

<style>
    .video_url-cell {
        max-width: 300px;
        text-overflow: ellipsis;
    }

    .video_url-cell p {
        margin: 0;
    }
</style>