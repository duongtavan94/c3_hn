@extends('admin.partials.master')

@section('title', 'Chi tiết')

@section('content')

<div class="content-wrapper">

    <section class="content-header">

        <h1>Chi tiết</h1>

        <ol class="breadcrumb">

            <li><i class="fa fa-dashboard"></i>Trang chủ</li>

            <li class="active">Chi tiết </li>

        </ol>

    </section>



    <div class="container">
        <div class="row">
            <a href="{{ route('admin.contact.index') }}"><button class="btn btn-primary">Quay lại</button></a>
        </div>

        <div class="row" style="border-bottom: 2px #eeeeee solid; margin-bottom: 30px; padding-left: 20px;">

            <div class="col-md-6">

                <div class="card" style="background-color: #eeeeee;">

                    <div class="card-content">

                        <h4 style="border-bottom: 1px solid white; padding-bottom: 5px;"></h4>

                        <p><strong>Ngày :</strong> {{ $result->created_at }}</p>

                        <p><strong>Phone :</strong> {{ $result->phone }}</p>

                        <p><strong>Năm sinh :</strong> {{ $result->namsinh }}</p>

                        <p><strong>Tốt nghiệp trường :</strong> {{ $result->totnghiep }}</p>

                        <p><strong>Địa chỉ :</strong> {{ $result->address }}</p>



                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <div class="card" style="background-color: #eeeeee;">

                    <div class="card-content">

                        <h4 style="border-bottom: 1px solid white; padding-bottom: 5px;"></h4>

                        <p><strong>Tên phụ huynh :</strong> {{ $result->phuhuynh }}</p>

                        <p><strong>Điện thoại PH :</strong> {{ $result->phone2 }}</p>

                        <p><strong>Email :</strong> {{ $result->email }}</p>

                        <P><strong>Lớp :</strong> {{ $result->lop }}</p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <form action="{{ route('admin.contact.postStatus', $result->id) }}" method="post">

        {{ csrf_field() }}

        <div class="form-group col-md-4">

            <div class="row">

                <div class="col-md-7">

                    <select class="form-control" name="status">

                        <option {{ $result->status == 1? 'selected' : '' }} value="1">Chờ xử lý</option>

                        <option {{ $result->status == 2? 'selected' : '' }} value="2">Đang xử lý</option>

                        <option {{ $result->status == 3? 'selected' : '' }} value="3">Hoàn thành</option>

                        <option {{ $result->status == 4? 'selected' : '' }} value="4">Hủy</option>

                    </select>

                </div>

                <div class="col-md-2"><button class="btn btn-primary">Lưu</button></div>

            </div>

        </div>

    </form>

    </div><!-- /.content-wrapper -->

@endsection

@section('script')



@endsection