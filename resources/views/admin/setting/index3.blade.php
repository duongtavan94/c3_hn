@extends('admin.partials.master')

@section('title', 'Tuyển sinh')

@section('content')

<div class="content-wrapper">

<section class="content-header">

    <div class="static-content-wrapper">

        <div class="static-content">

            <div class="page-content">

                <div class="page-heading">

                    <h1>Tuyển sinh</h1>

                    <div class="options">

                        <div class="btn-toolbar">

                        </div>

                    </div>

                </div>

                <ol class="breadcrumb">

                    <li>Trang chủ</li>

                    <li class="active">Tuyển sinh</li>

                </ol>

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-sm-12">

                            <div class="panel panel-default">

                                <div class="panel-heading">

                                </div>

                                @include('errors.message')

                                <div class="panel-body">

                                    <form role="form" class="form-horizontal" method="post"

                                    action="{{ route('admin.chi-nhanh.update') }}"

                                    enctype="multipart/form-data">

                                        {{ csrf_field() }}

                                        <div class="row">

                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Tên: </label>

                                                <div class="col-md-8">

                                                    <input type="text" class="form-control"

                                                    placeholder="Tên công ty" name="name_vi" value="{{ $settings->name_vi }}">

                                                </div>

                                            </div>

                                            {{-- <div class="form-group">

                                                <label class="col-md-3 control-label">Tên _en: </label>

                                                <div class="col-md-8">

                                                    <input type="text" class="form-control"

                                                    placeholder="Tên công ty" name="name_en" value="{{ $settings->name_en }}">

                                                </div>

                                            </div> --}}

                                            
                                            <div class="form-group">

                                                <label class="col-md-3 control-label">Miêu tả 1: </label>

                                                <div class="col-md-8">

                                                    <textarea class="form-control" placeholder="Meta_Des"

                                                    name="description_vi" id="mt1">{{ $settings->description_vi }}</textarea>

                                                </div>

                                            </div>

                                           {{--  <div class="form-group">

                                                <label class="col-md-3 control-label">Miêu tả 1_en: </label>

                                                <div class="col-md-8">

                                                    <textarea class="form-control" placeholder="Meta_Des"

                                                    name="description_en" id="mt2">{{ $settings->description_en }}</textarea>

                                                </div>

                                            </div> --}}





                                        </div>

                                        <div class="panel-footer">

                                            <div class="row">

                                                <div class="col-sm-8 col-sm-offset-2">

                                                    <button class="btn-success btn">Lưu</button>

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

    CKEDITOR.replace( 'mt1', {

        filebrowserBrowseUrl: '{{ route('ckfinder-customer') }}',

    } );

    CKEDITOR.replace( 'mt2', {

        filebrowserBrowseUrl: '{{ route('ckfinder-customer') }}',

    } );

    CKEDITOR.replace( 'mt3', {

        filebrowserBrowseUrl: '{{ route('ckfinder-customer') }}',

    } );

    CKEDITOR.replace( 'mt4', {

        filebrowserBrowseUrl: '{{ route('ckfinder-customer') }}',

    } );

    CKEDITOR.replace( 'mt5', {

        filebrowserBrowseUrl: '{{ route('ckfinder-customer') }}',

    } );

    CKEDITOR.replace( 'mt6', {

        filebrowserBrowseUrl: '{{ route('ckfinder-customer') }}',

    } );

    CKEDITOR.replace( 'mt7', {

        filebrowserBrowseUrl: '{{ route('ckfinder-customer') }}',

    } );

    CKEDITOR.replace( 'mt8', {

        filebrowserBrowseUrl: '{{ route('ckfinder-customer') }}',

    } );

    CKEDITOR.replace( 'mt9', {

        filebrowserBrowseUrl: '{{ route('ckfinder-customer') }}',

    } );

    CKEDITOR.replace( 'mt10', {

        filebrowserBrowseUrl: '{{ route('ckfinder-customer') }}',

    } );

</script>



@endsection