@extends('admin.partials.master')

@section('title', 'Thêm Tin tức')

@section('content')

<div class="content-wrapper">

<!-- Content Header (Page header) -->

<section class="content-header">

    <div class="static-content-wrapper">

        <div class="static-content">

            <div class="page-content">

                <div class="page-heading">

                    <h1>Thêm Tin tức</h1>

                    <div class="options">

                        <div class="btn-toolbar">

                        </div>

                    </div>

                </div>

                <ol class="breadcrumb">

                    <li>Trang chủ</li>

                    <li>Quản lý Tin tức</li>

                    <li>Tin tức</li>

                    <li class="active">Thêm</li>

                </ol>

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-sm-12">

                            <div class="panel panel-default">

                                <div class="panel-heading">

                                </div>

                                @include('errors.message')

                                <div class="panel-body">

                                    <form role="form" class="form-horizontal" method="POST"

                                    action="{{ route('admin.banner.createPost') }}"

                                    enctype="multipart/form-data">

                                        {{ csrf_field() }}

                                        <div class="row">

                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Tên: </label>

                                                <div class="col-md-8">

                                                    <input type="text" class="form-control"

                                                    placeholder="Nhập tiêu đề" name="name_vi" value="{{ old('name_vi') }}">

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Tên_en: </label>

                                                <div class="col-md-8">

                                                    <input type="text" class="form-control"

                                                    placeholder="Nhập tiêu đề" name="name_en" value="{{ old('name_en') }}">

                                                </div>

                                            </div>
                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Ngày: </label>

                                                <div class="col-md-8">

                                                    <input type="number" class="form-control"

                                                    placeholder="" name="ngay" value="{{ old('ngay') }}">

                                                </div>

                                            </div>
                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Tháng: </label>

                                                <div class="col-md-8">

                                                    <input type="text" class="form-control"

                                                    placeholder="Nhập tiêu đề" name="thang" value="{{ old('thang') }}">

                                                </div>

                                            </div>
                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Vị trí: </label>

                                                <div class="col-md-8">

                                                    <input type="number" class="form-control"

                                                    placeholder="Nhập tiêu đề" name="position" value="{{ old('position') }}">

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Ảnh home: </label>

                                                <div class="col-md-8">

                                                    <input type="file" class="form-control" name="image">

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Giới thiệu_vi: </label>

                                                <div class="col-md-8">

                                                    <textarea name="title_vi" class="form-control "

                                                    id="editor3">

                                                        {{ old('title_vi') }}

                                                    </textarea>

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Giới thiệu_en: </label>

                                                <div class="col-md-8">

                                                    <textarea name="title_en" class="form-control "

                                                    id="editor4">

                                                        {{ old('title_en') }}

                                                    </textarea>

                                                </div>

                                            </div>





                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Nội dung_vi: </label>

                                                <div class="col-md-8">

                                                    <textarea name="description_vi" class="form-control "

                                                    id="editor1">

                                                        {{ old('description_vi') }}

                                                    </textarea>

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Nội dung_en: </label>

                                                <div class="col-md-8">

                                                    <textarea name="description_en" class="form-control "

                                                    id="editor2">

                                                        {{ old('description_en') }}

                                                    </textarea>

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Trạng thái: </label>

                                                <label class="switch">

                                                    <input type="checkbox" name="status" value="0">

                                                    <span class="slider round"></span>

                                                    <input type="hidden" name="id" value="1">

                                                </label>

                                            </div>

                                        <div class="panel-footer">

                                            <div class="row">

                                                <div class="col-sm-8 col-sm-offset-2">

                                                    <button class="btn-success btn">Lưu</button>

                                                    <a class="btn-default btn"

                                                    href="{{ route('admin.banner.create') }}">

                                                        Hủy

                                                    </a>

                                                    <a class="btn-default btn" href='javascript:goback()'>Quay lại</a>

                                                </div>

                                            </div>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Main content -->

</div><!-- /.content-wrapper -->

@endsection

@section('script')

<script>

    CKEDITOR.replace( 'editor1', {

        filebrowserBrowseUrl: '{{ route('ckfinder-customer') }}',

    } );

    CKEDITOR.replace( 'editor2', {

        filebrowserBrowseUrl: '{{ route('ckfinder-customer') }}',

    } );

    CKEDITOR.replace( 'editor3', {

        filebrowserBrowseUrl: '{{ route('ckfinder-customer') }}',

    } );

    CKEDITOR.replace( 'editor4', {

        filebrowserBrowseUrl: '{{ route('ckfinder-customer') }}',

    } );

</script>

@endsection