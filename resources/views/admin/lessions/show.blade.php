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
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên bài học</th>
                                <th>Loại bài học</th>
                                <th>Nội dung bài học</th>
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
                                <td class="name">
                                    <p>{{ $item->name }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->type }}</p>
                                </td>
                                <style>
                                    .content-wrapper.collapsed .content-text {
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        max-height: 60px;
                                        width: 300px; 
                                        /* Chiều cao tối đa của nội dung khi thu gọn */
                                    }
                                </style>

                                <td class="content">
                                    <div class="content-wrapper collapsed" data-item-id="{{ $item->id }}">
                                        <p class="content-text"  width="12px">{{ $item->content }}</p>
                                    </div>
                                    <button class="view-more-button" onclick="expandContent({{ $item->id }})">Xem thêm</button>
                                </td>

                                <script>
                                    function expandContent(itemId) {
                                        var contentWrapper = document.querySelector('.content-wrapper[data-item-id="' + itemId + '"]');
                                        contentWrapper.classList.remove('collapsed');
                                    }
                                </script>
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

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection