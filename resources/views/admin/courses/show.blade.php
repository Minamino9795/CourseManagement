@extends('admin.layouts.master')
@section('content')
<div class="page-inner">
    <header class="page-title-bar">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('lessions.index') }}">
                        <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>
                        Quản Lý Khóa Học
                    </a>
                </li>
            </ol>
        </nav>
    </header>
    <div class="d-md-flex align-items-md-start">
            <h1 class="page-title mr-sm-auto">Chi Tiết Khóa Học</h1>

        </div>
    <div class="page-section">
        <div class="card card-fluid">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="">Tất Cả</a>
                    </li>
                </ul>
            </div>
            
            <div class="card-body px-0 pb-2">
                <div class="table align-items-center mb-0">
                    <table class="table">
                        <thead class="">
                            <tr>
                                <td><strong>ID :</strong></td>
                                <td>{{ $item->id }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tên :</strong></td>
                                <td>{{ $item->name }}</td>
                            </tr>
                            <tr>

                                <td><strong>Mô tả :</strong></td>
                                <td>
                                    <p>{!!$item->description !!}</p>
                                </td>
                            </tr>
                            
                            <tr>
                                <td><strong>Hình ảnh :</strong></td>

                                <td>
                                    @if ($item->image_url)
                                    <img width="100" height="90" src="{{ asset($item->image_url) }}" alt="Image">
                                    @else
                                    Không có ảnh
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Video:</strong></td>

                                <td class="video_url-cell">
                                    @if ($item->video_url)
                                    <video width="300" height="400" controls>
                                        <source src="{{ asset('storage/videos/' . $item->video_url) }}" type="video/mp4">
                                    </video>
                                    @else
                                    <p>Không có video</p>
                                    @endif
                                </td>
                            </tr>
                           
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection