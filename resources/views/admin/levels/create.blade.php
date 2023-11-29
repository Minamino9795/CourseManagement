@extends('admin.layouts.master')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <h2>THÊM CẤP ĐỘ KHÓA HỌC</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('levels.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <div>
                        <label for="name">Name:</label><br>
                        <input id="name" type="text" name="name">
                    </div>
                    <div>
                        <label for="level">Level:</label><br>
                        <input id="level" type="number" name="level">
                    </div>
                    <div>
                        <label for="status">Status:</label><br>
                        <input id="status" type="text" name="status">
                    </div>
                    <div>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-danger" href="{{ route('levels.index') }}">Back</a>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary" type="submit">Add</button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- <form method="post" action="{{ route('levels.store') }}">
        @csrf
        <input type="hidden" name="_token" value="GwcyuBsJtNYUq65DqTkxRtce4d2HE5bbcCK0PcwD">
        <div class="card">
            <div class="card-body">
                <legend>Thông tin cơ bản</legend>
                <div class="form-group">
                    <label for="">Tên khóa học<abbr name="Trường bắt buộc">*</abbr></label> <input name="name"
                        type="text" class="form-control" id="tf1" placeholder="Nhập tên khóa học">
                    <small id="" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label for="tf2">Cấp độ<abbr name="Trường bắt buộc">*</abbr></label> <input name="name"
                        type="text" class="form-control" id="tf2" placeholder="Nhập tên số cấp độ">
                    <small id="" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label for="tf3">Trạng thái<abbr name="Trường bắt buộc">*</abbr></label> <input name="name"
                        type="text" class="form-control" id="tf3" placeholder="Nhập trạng thái">
                    <small id="" class="form-text text-muted"></small>
                </div>

                <div class="form-actions">
                    <a class="btn btn-danger float-right" href="{{ route('levels.index') }}">Hủy</a>
                    <button class="btn btn-primary ml-auto" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </form> --}}
@endsection
