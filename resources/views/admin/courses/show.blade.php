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
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto">Chi Tiết Khóa Học</h1>
                <div class="btn-toolbar">

                </div>
            </div>
        </header>
        <div class="page-section">
            <div class="card card-fluid">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="">Tất Cả</a>
                        </li>
                    </ul>
                </div>
                
                        <form method="post">
                            <div class="form-row">
                                <label for="input01" class="col-md-3"><strong>Tên :</strong></label>
                                <div class="col-md-9 mb-3">
                                    <div class="custom-file">
                                        <p>{{ $item->name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="input02" class="col-md-3"><strong>Mô tả :</strong></label>
        
                                <div class="col-md-9 mb-3">
                                    <p>{!! $item->description !!}</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="input02" class="col-md-3"> <strong>Hình ảnh :</strong></label>
                                <div class="col-md-9 mb-3">
                                    <div class="image-container">
                                        @if ($item->image_url)
                                            <img class="course-image" src="{{ asset($item->image_url) }}" alt="Image">
                                        @else
                                            <p>Không có ảnh</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="input02" class="col-md-3"> <strong>Video:</strong></label>
                                <div class="col-md-9 mb-3">
                                    <div class="video-container">
                                        @if ($item->video_url)
                                            <video class="course-video" controls>
                                                <source src="{{ asset('storage/videos/' . $item->video_url) }}"
                                                    type="video/mp4">
                                            </video>
                                        @else
                                            <p>Không có video</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <style>
            /* Custom CSS for the page */
            .image-container {
                display: flex;
                align-items: center;
            }

            .course-image {
                width: 100px;
                height: 90px;
            }

            .video-container {
                display: flex;
                align-items: center;
            }

            .course-video {
                width: 300px;
                height: 400px;
            }
        </style>
    @endsection
