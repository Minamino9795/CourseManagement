@extends('admin.layouts.master')
@section('content')
<div class="page">
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('lessions.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang
                            Chủ</a>
                    </li>
                </ol>
            </nav>
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto">Quản Lý Bài Học</h1>
                <div class="btn-toolbar">
                    @if (Auth::user()->hasPermission('lessions_create'))
                    <a href="{{ route('lessions.create') }}" class="btn btn-primary mr-2">
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
                    <div class="col">
                        <form action="{{ route('lessions.index') }}" method="GET" class="search-form">
                            <div class="row">
                                <div class="col">
                                    <input name="searchname" class="form-control" type="text" placeholder=" Tên" value="{{ request('searchname') }}">
                                </div>
                                <div class="col">
                                    <input name="search" class="form-control" type="text" placeholder=" Loại bài học " value="{{ request('search') }}">
                                </div>
                                <div class="col-lg-2">
                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearch" type="submit">Tìm Kiếm</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            @include('admin.includes.global.alert')
            <div class="table-reponsive">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Loại bài học</th>
                                <th>Nội dung</th>
                                <th>Tuỳ chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="name">
                                    <p>{{ $item->name }}</p>
                                </td>
                                <td>
                                    <p>{{ $item->type }}</p>
                                </td>

                                <td>
                                    <p>{!! Str::limit($item->content, 80) !!}</p>
                                </td>
                                <td>
                                    @if (Auth::user()->hasPermission('lessions_update'))
                                    <a href="{{ route('lession.show', ['id' => $item->id]) }}" class="btn btn-sm btn-icon btn-secondary">
                                        <i class="fa fa-eye"></i>
                                        <span class="sr-only">Show</span>
                                    </a>
                                    <span class="sr-only">Edit</span>
                                    <a href="{{ route('lessions.edit', $item->id) }}" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Remove</span></a>
                                    @endif
                                    @if (Auth::user()->hasPermission('lessions_delete'))
                                    <form action="{{ route('lessions.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Bạn có muốn xóa không ?')" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i>
                                        </button>

                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div>
                    </div>
                </div>
                <div style="float:right">
                    {{ $items->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
        @endsection