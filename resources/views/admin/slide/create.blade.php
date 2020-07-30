@extends('admin.partials.master')

@section('title', 'Thêm')

@section('content')

<div class="content-wrapper">

<section class="content-header">

    <div class="static-content-wrapper">

        <div class="static-content">

            <div class="page-content">

                <div class="page-heading">

                    <h1>Thêm</h1>

                    <div class="options">

                        <div class="btn-toolbar">

                        </div>

                    </div>

                </div>

                <ol class="breadcrumb">

                    <li>Trang chủ</li>

                    <li>Slide+Ảnh</li>

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

                                    action="{{ route('admin.slide.createPost') }}"

                                    enctype="multipart/form-data">

                                        {{ csrf_field() }}

                                        <div class="row">

                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Tên</label>

                                                <div class="col-md-8">

                                                    <input type="text" class="form-control"

                                                    placeholder="Nhập tên" name="name_vi" value="{{ old('name_vi') }}">

                                                </div>

                                            </div>

                                           


                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Miêu tả</label>

                                                <div class="col-md-8">

                                                    <textarea name="description_vi" class="form-control "

                                                    id="editor1">{{ old('description_vi') }}</textarea>

                                                </div>

                                            </div>

                                           


                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Link chi tiết</label>

                                                <div class="col-md-8">

                                                    <input type="text" class="form-control"

                                                    placeholder="Nhập tên" name="link" value="{{ old('link') }}">

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Vị trí: </label>

                                                <div class="col-md-8">

                                                    <input type="number" class="form-control"

                                                    placeholder="Nhập vị trí" name="position" value="{{ old('position') }}">

                                                </div>

                                            </div>
                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Số: </label>

                                                <div class="col-md-8">

                                                    <input type="number" class="form-control"

                                                    placeholder="Nhập vị trí" name="conso" value="{{ old('conso') }}">

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Ảnh bìa: </label>

                                                <div class="col-md-8">

                                                    <input type="file" class="form-control" name="image">

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Ảnh chi tiết: </label>

                                                <div class="col-md-8">

                                                    <input type="file" class="form-control" name="image2">

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



                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Danh mục: </label>

                                                <div class="col-md-8">

                                                    <select class="form-control" name="dislay">

                                                        <option value="1">Slide</option>

                                                        <option value="2">Lý do</option>

                                                        <option value="3">Con số</option>
                                                        {{-- <option value="4">Đối tác</option> --}}
                                                        <option value="5">Bài trang chủ</option>
                                                        <option value="6">Popup</option>

                                                    </select>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="panel-footer">

                                            <div class="row">

                                                <div class="col-sm-8 col-sm-offset-2">

                                                    <button class="btn-success btn">Lưu</button>

                                                    <a class="btn-default btn"

                                                    href="{{ route('admin.slide.create') }}">

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

</div>

@endsection

@section('script')

<script>

    CKEDITOR.replace( 'editor1', {

        filebrowserBrowseUrl: '{{ route('ckfinder-customer') }}',

    } );

    CKEDITOR.replace( 'editor2', {

        filebrowserBrowseUrl: '{{ route('ckfinder-customer') }}',

    } );

</script>

@endsection



