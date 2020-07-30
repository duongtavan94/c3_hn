@extends('admin.partials.master')
@section('title', 'Sửa danh mục')
@section('content')
<div class="content-wrapper">
<section class="content-header">
    <div class="static-content-wrapper">
        <div class="static-content">
            <div class="page-content">
                <div class="page-heading">
                    <h1>Sửa danh mục</h1>
                    <div class="options">
                        <div class="btn-toolbar">
                            <a href="#" class="btn btn-default"><i class="fa fa-fw fa-plus"></i>Thêm mới</a>
                        </div>
                    </div>
                </div>
                <ol class="breadcrumb">
                    <li>Trang chủ</li>
                    <li>Quản lý tin</li>
                    <li>Danh mục</li>
                    <li class="active">Sửa</li>
                </ol>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div>
                                @include('errors.message')
                                <div class="panel-body">
                                    <form role="form" class="form-horizontal" method="POST"
                                        action="{{ route('admin.cate_investor.postUpdate', $cate_investor->slug) }}"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Tên danh mục: </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" placeholder="Name"
                                                    name="name_vi" value="{{ $cate_investor->name_vi }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Tên danh mục_en: </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" placeholder="Name"
                                                    name="name_en" value="{{ $cate_investor->name_en }}">
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Vị trí: </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" placeholder="Vị trí"
                                                    name="position" value="{{ $cate_investor->position }}">
                                                </div>
                                            </div>



                                            <div style="margin-top: 20px;margin-bottom: 20px;">
                                                <label class="col-md-3 control-label">Trạng thái: </label>
                                                <label class="switch">
                                                    <input type="checkbox" name="status"
                                                    value="0" {{($cate_investor->status)?'checked':''}}>
                                                    <span class="slider round"></span>
                                                    <input type="hidden" name="id" value="1">
                                                </label>
                                            </div>




                                        </div>
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <button class="btn-success btn">Lưu</button>
                                                    <a class="btn-default btn" href="{{ route('admin.cate_investor.home') }}">
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
