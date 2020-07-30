@extends('admin.partials.master')

@section('title', 'Sửa')

@section('content')

<div class="content-wrapper">

<!-- Content Header (Page header) -->

<section class="content-header">

    <div class="static-content-wrapper">

        <div class="static-content">

            <div class="page-content">

                <div class="page-heading">

                    <h1>Sửa</h1>

                    <div class="options">

                        <div class="btn-toolbar">

                        </div>

                    </div>

                </div>

                <ol class="breadcrumb">

                    <li>Trang chủ</li>

                    <li>Tin tức</li>

                    <li class="active">Sửa</li>

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

                                    action="{{ route('admin.banner.postUpdate', $banner->id) }}"

                                    enctype="multipart/form-data">

                                        {{ csrf_field() }}

                                        <div class="row">

                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Tên_vi: </label>

                                                <div class="col-md-8">

                                                    <input type="text" class="form-control"

                                                    placeholder="Nhập tên" name="name_vi" value="{{ $banner->name_vi }}">

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Tên_en: </label>

                                                <div class="col-md-8">

                                                    <input type="text" class="form-control"

                                                    placeholder="Nhập tên" name="name_en" value="{{ $banner->name_en }}">

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Ảnh home: </label>

                                                <div class="col-md-8">

                                                    <input type="file" class="form-control" name="image"

                                                    value="{{ $banner->image }}">

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label class="col-md-3 control-label"></label>

                                                <div class="col-md-8">

                                                    <img src="{{asset($banner->image)}}" style="max-width: 30%;"/>

                                                </div>

                                            </div>
                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Ngày: </label>

                                                <div class="col-md-8">

                                                    <input type="number" class="form-control"

                                                    placeholder="" name="ngay" value="{{ $banner->ngay }}">

                                                </div>

                                            </div>
                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Tháng: </label>

                                                <div class="col-md-8">

                                                    <input type="text" class="form-control"

                                                    placeholder="" name="thang" value="{{ $banner->thang }}">

                                                </div>

                                            </div>
                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Vị trí: </label>

                                                <div class="col-md-8">

                                                    <input type="text" class="form-control"

                                                    placeholder="" name="position" value="{{ $banner->position }}">

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Giới thiệu_vi: </label>

                                                <div class="col-md-8">

                                                     <textarea class="form-control" placeholder="Miêu tả"

                                                    name="title_vi" id="editor3">

                                                        {{ $banner->title_vi }}

                                                    </textarea>

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Giới thiệu_en: </label>

                                                <div class="col-md-8">

                                                     <textarea class="form-control" placeholder="Miêu tả"

                                                    name="title_en" id="editor4">

                                                        {{ $banner->title_en }}

                                                    </textarea>

                                                </div>

                                            </div>

                                            



                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Nội dung_vi: </label>

                                                <div class="col-md-8">

                                                     <textarea class="form-control" placeholder="Miêu tả"

                                                    name="description_vi" id="editor1">

                                                        {{ $banner->description_vi }}

                                                    </textarea>

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Nội dung_en: </label>

                                                <div class="col-md-8">

                                                     <textarea class="form-control" placeholder="Miêu tả"

                                                    name="description_en" id="editor2">

                                                        {{ $banner->description_en }}

                                                    </textarea>

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Trạng thái: </label>

                                                <label class="switch">

                                                    <input type="checkbox" name="status"

                                                    {{ ($banner->status) ? 'checked': '' }}>

                                                    <span class="slider round"></span>

                                                    <input type="hidden" name="id" value="1">

                                                </label>

                                            </div>



                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Title_SEO: </label>

                                                <div class="col-md-8">

                                                        <input type="text" class="form-control" placeholder="Title SEO"

                                                        name="title_seo" value="{{ $banner->title_seo }}">

                                                    @if($errors->has('title_seo'))

                                                        <strong>

                                                            <span class="help-block">

                                                                {{ $errors->first('title_seo') }}

                                                            </span>

                                                        </strong>

                                                    @endif

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Meta_key: </label>

                                                <div class="col-md-8">

                                                    <textarea type="text" class="form-control" placeholder="Meta_key"

                                                    name="meta_key">{{ $banner->meta_key }}</textarea>

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Meta_des: </label>

                                                <div class="col-md-8">

                                                    <textarea class="form-control" placeholder="Meta_Des"

                                                    name="meta_des">{{ $banner->meta_des }}</textarea>

                                                </div>

                                            </div>

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

    CKEDITOR.replace( 'editor3', {

        filebrowserBrowseUrl: '{{ route('ckfinder-customer') }}',

    } );

    CKEDITOR.replace( 'editor4', {

        filebrowserBrowseUrl: '{{ route('ckfinder-customer') }}',

    } );

</script>

@endsection