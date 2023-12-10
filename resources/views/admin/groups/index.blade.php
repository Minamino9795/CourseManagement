@extends('admin.layouts.master')
@section('content')
    <div class="page">
        <div class="page-inner">
            <header class="page-title-bar">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
                        </li>
                    </ol>
                </nav>
                <div class="d-md-flex align-items-md-start">
                    <h1 class="page-title mr-sm-auto">Quản Lý Quyền</h1>
                    <div class="btn-toolbar">
                        @if (Auth::user()->hasPermission('groups_create'))
                            <a href="{{ route('groups.create') }}" class="btn btn-primary mr-2">
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
                                <form action="https://thptatuc-backend.quanlythietbitruonghoc.com/groups" method="GET"
                                    id="form-search">
                                    <div class="row">
                                        <div class="col">
                                            <input name="search" value="" class="form-control" type="text"
                                                placeholder=" tên...">
                                        </div>
                                        <div class="col-lg-2">
                                            <button class="btn btn-secondary" data-toggle="modal"
                                                data-target="#modalSaveSearch" type="submit">Tìm Kiếm</button>
                                        </div>

                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Nhân Sự</th>
                                    <th>Chức Năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userGroups as $key => $group)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $group->name }}</td>
                                        <td>Hiện có {{ $group->users->count() }} người</td>

                                        <td>
                                            @if (Auth::user()->hasPermission('groups_update'))
                                                <span class="sr-only">Edit</span> <a
                                                    href="{{ route('groups.edit', $group->id) }}"
                                                    class="btn btn-sm btn-icon btn-secondary"><i
                                                        class="fa fa-pencil-alt"></i>
                                                    <span class="sr-only">Remove</span></a>
                                            @endif

                                            <form action="{{ route('groups.destroy', $group->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                @if (Auth::user()->hasPermission('groups_delete'))
                                                    <input type="hidden" name="_token"
                                                        value="CNND3NJoI2a9s3VW6nf8WdMH48c3KoYnodRDcvL3"> <input
                                                        type="hidden" name="_method" value="DELETE"> <button type="submit"
                                                        onclick="return confirm('Bạn có muốn xóa không ?')"
                                                        class="btn btn-sm btn-icon btn-secondary"><i
                                                            class="far fa-trash-alt"></i></button>
                                                @endif
                                                @if (Auth::user()->hasPermission('groups_view'))
                                                    <a class="btn btn-sm btn-icon btn-secondary"
                                                        href="{{ route('groups.show', $group->id) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="16"
                                                            width="14"
                                                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                                            <path
                                                                d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7H162.5c0 0 0 0 .1 0H168 280h5.5c0 0 0 0 .1 0H417.3c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2H224 204.3c-12.4 0-20.1 13.6-13.7 24.2z" />
                                                        </svg></a>
                                                @endif
                                            </form>

                                        </td>
                                @endforeach
                            </tbody>
                            <!-- /tbody -->
                        </table><!-- /.table -->
                        {{ $userGroups->appends(request()->query()) }}
                        <div style="float:right">

                        </div>

                    </div>
                    <!-- /.table-responsive -->
                    <!-- .pagination -->

                </div><!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
