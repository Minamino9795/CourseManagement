@extends('admin.layouts.master')
@section('content')
@include('admin.includes.global.alert')
<div class="page">
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('users.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
                    </li>
                </ol>
            </nav>
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto">Quản Lý Người Dùng</h1>
                <div class="btn-toolbar">
                    <a href="{{ route('users.create') }}" class="btn btn-primary mr-2">
                        <i class="fa-solid fa fa-plus"></i>
                        <span class="ml-1">Thêm Mới</span>
                    </a>
                </div>
            </div>
        </header>
        <div class="page-section">
            <div class="card card-fluid">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active " href="{{ route('users.index') }}">Tất Cả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('users.trash')}}">Thùng Rác</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <form action="{{ route('users.index') }}" method="GET" id="form-search">
                                <div class="row">
                                    <div class="col">
                                        <input name="filter[name]" class="form-control" type="text" placeholder=" tên..." value="">
                                    </div>
                                    <div class="col">
                                        <input name="filter[email]" class="form-control" type="text" placeholder=" E-mail..." value="">
                                    </div>
                                    <div class="col">
                                        <input name="filter[phone]" class="form-control" type="text" placeholder=" số điện thoại..." value="">
                                    </div>
                                    <div class="col">
                                        <select name="filter[group_id]" class="form-control">
                                            <option value="">Chức vụ...</option>
                                            @foreach ($groups as $group)
                                            <option value="{{ $group->id }}" {{ isset($request->filter['group_id']) && $request->filter['group_id'] == $group->id ? 'selected' : '' }}>
                                                {{ $group->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn btn-secondary" data-toggle="modal" data-target="#modalSaveSearch" type="submit">Tìm Kiếm</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>E-mail</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Chức vụ</th>
                                    <th>Giới tính</th>
                                    <th>Trạng thái</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <a href="#" class="tile tile-img mr-1">
                                            <img class="img-fluid" src="{{ asset($user->image) }}" alt="">
                                        </a>
                                        <a>{{ $user->name }}</a>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->groups->name }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>
                                        <span class="sr-only">Edit</span> <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span class="sr-only">Remove</span></a>
                                        @if($user->id != 1)
                                        <form action="{{ route('users.destroy',$user->id )}}" method="POST" class="d-inline">
                                            <input type="hidden" name="_token" value="NM6SM622JIITOK1NKyz0F1iHE94JPaBpFlKOs6yV"> <input type="hidden" name="_method" value="DELETE"> <button type="submit" onclick="return confirm('Bạn có muốn xóa không ?')" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i>
                                            </button>
                                            @csrf
                                            @method('delete')
                                        </form>
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
    </div>
</div>
@endsection