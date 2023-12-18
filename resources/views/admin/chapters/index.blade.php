@extends('admin.layouts.master')
@section('content')
    <div class="page">
        <div class="page-inner">
            <header class="page-title-bar">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="{{ route('chapters.index') }}">
                                <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>
                                Trang Chủ
                            </a>
                        </li>
                    </ol>
                </nav>
                <div class="d-md-flex align-items-md-start">
                    <h1 class="page-title mr-sm-auto">Quản Lý Chương Học</h1>
                    <div class="btn-toolbar">
                        @if (Auth::user()->hasPermission('chapters_create'))
                            <a href="{{ route('chapters.create') }}" class="btn btn-primary mr-2">
                                <i class="fa-solid fa fa-plus"></i>
                                <span class="ml-1">Thêm Mới</span>
                            </a>
                        @endif
                    </div>
                </div>
            </header>
            <div class="page-section">
                <div class="card card-fluid">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col">
                                <form action="" method="GET" id="form-search">
                                    <div class="row">
                                        <div class="col">
                                            <input name="s" class="form-control" type="text" placeholder=" Tên"
                                                value="{{ request('s') }}">
                                        </div>
                                        <div class="col-lg-2">
                                            <button class="btn btn-secondary" data-toggle="modal"
                                                data-target="#modalSaveSearch" type="submit">
                                                Tìm Kiếm
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @include('admin.includes.global.alert')
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên chương học</th>
                                        <th>Tên khóa học</th>
                                        <th>Tuỳ chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->course->name }}</td>
                                            <td>
                                                @if (Auth::user()->hasPermission('chapters_delete'))
                                                <form action="{{ route('chapters.destroy', $item->id) }}"
                                                    style="display:inline" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"
                                                        class="btn btn-sm btn-icon btn-secondary">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                                @endif
                                                @if (Auth::user()->hasPermission('chapters_update'))
                                                <span class="sr-only">Edit</span>
                                                <a href="{{ route('chapters.edit', $item->id) }}"
                                                    class="btn btn-sm btn-icon btn-secondary">
                                                    <i class="fa fa-pencil-alt"></i>
                                                    <span class="sr-only">Remove</span>
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="float:right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
      
            <div style="float:right">
                    {{ $items->appends(request()->query())->links() }}
                </div>
           
        </div>
    </div>
@endsection