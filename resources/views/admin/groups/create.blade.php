@extends('admin.layouts.master')
@section('content')

<div class="page">
    <div class="page-inner">
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{route('groups.index')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý
                            Quyền</a>
                    </li>
                </ol>
            </nav>
            <h1 class="page-title">Thêm Quyền</h1>
        </header>

        <div class="page-section">
            <form method="post" action="{{route('groups.store')}}">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <legend>Thông tin cơ bản</legend>
                        <div class="form-group">
                            <label for="tf1">Tên nhóm</label> <input name="name" type="text" class="form-control" id="tf1" placeholder="Nhập tên nhóm"> <small id="" class="form-text text-muted"></small>
                            @if ($errors->any())
                            <p style="color:red">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="form-actions">
                            <button class="btn btn-secondary float-right" onclick="window.history.go(-1); return false;">Hủy</button>
                            <button style="float: right;" class="btn btn-primary ml-auto" type="submit">Lưu<noscript></noscript> </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection