@extends('admin.layouts.master')
@section('content')
<div class="page-inner">
    <header class="page-title-bar">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('categories.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý
                        Danh Mục Khóa Học</a>
                </li>
            </ol>
        </nav>
        <!-- <button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button> -->
        <div class="d-md-flex align-items-md-start">
            <h1 class="page-title mr-sm-auto">Chi Tiết Danh mục " {{ $items->name }} "</h1>
            <div class="btn-toolbar">

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
            <div class="card-body px-0 pb-2">
                <div class="table align-items-center mb-0">
                    <table class="table">
                        <thead class="">
                            <tr>
                                <td><strong> ID : </strong> </td>
                                <td>{{ $items->id }}</td>
                            </tr>
                            <tr>
                                <td><strong> Danh mục : </strong> </td>
                                <td>{{ $items->name }}</td>
                            </tr>
                            <tr>

                                <td><strong> Trạng thái: </strong> </td>
                                @if ($items->status == \App\Models\Category::ACTIVE)
                                <td><span>
                                        <i class="fas fa-check-circle"></i> Đang mở
                                    </span></td>
                                @else
                                <td> <span>
                                        <i class="fas fa-times-circle"></i> Đang đóng
                                    </span></td>
                                @endif
                            </tr>
                            <tr>
                                <td><strong> Mô tả: </strong> </td>

                                <td class="description-cell">
                                    <p>{!! $items->description !!}</p>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div><!-- /.page -->
</div><!-- /.wrapper -->
</div>
<style>
    .description-cell {
        max-width: 300px;
        text-overflow: ellipsis;
    }

    .description-cell p {
        margin: 0;
    }
</style>
@endsection