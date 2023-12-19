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
                <div class="card-body px-0 pb-2">
                    <div class="table align-items-center mb-0">
                        <table class="table">
                            <thead class="">
                                <tr>
                                    <td><strong>ID :</strong></td>
                                    <td>{{ $item->id }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Tên bài học :</strong></td>
                                    <td>{{ $item->name }}</td>
                                </tr>
                                <tr>

                                    <td><strong>Loại bài học :</strong></td>
                                    <td>{{ $item->type }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Nội dung bài học :</strong></td>
                                    <style>
                                        .content-wrapper.collapsed .content-text {
                                            overflow: hidden;
                                            text-overflow: ellipsis;
                                            max-height: 60px;
                                            width: 200px;
                                            /* Chiều cao tối đa của nội dung khi thu gọn */
                                        }

                                        .content-wrapper.expanded .content-text {
                                            max-height: initial;
                                            width: 1000px;
                                            /* Chiều cao tối đa của nội dung khi được mở rộng */
                                        }
                                    </style>

                                    <td class="content">
                                        <div class="content-wrapper collapsed" data-item-id="{{ $item->id }}">
                                            <p class="content-text" width="12px">{{ $item->content }}</p>
                                        </div>
                                        <button class="view-more-button" onclick="expandContent({{ $item->id }})">Xem thêm</button>
                                    </td>
                                    <script>
                                        function expandContent(itemId) {
                                            var contentWrapper = document.querySelector('.content-wrapper[data-item-id="' + itemId + '"]');
                                            var viewMoreButton = contentWrapper.querySelector('.view-more-button');
                                            if (contentWrapper.classList.contains('collapsed')) {
                                                contentWrapper.classList.remove('collapsed');
                                                contentWrapper.classList.add('expanded');
                                                viewMoreButton.textContent = 'Thu gọn';
                                            } else {
                                                contentWrapper.classList.remove('expanded');
                                                contentWrapper.classList.add('collapsed');
                                                viewMoreButton.textContent = 'Xem thêm';
                                            }
                                        }
                                    </script>
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