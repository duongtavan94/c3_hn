@extends('admin.partials.master')
@section('title', 'Sửa sản phẩm')
@section('content')
<div class="content-wrapper">
<section class="content-header">
    <div class="static-content-wrapper">
        <div class="static-content">
            <div class="page-content">
                <div class="page-heading">
                    <h1>Sửa danh mục sản phẩm</h1>
                    <div class="options">
                        <div class="btn-toolbar">
                            <a href="#" class="btn btn-default"><i class="fa fa-fw fa-plus"></i>Thêm mới</a>
                        </div>
                    </div>
                </div>
                <ol class="breadcrumb">
                    <li>Trang chủ</li>
                    <li>Quản lý sản phẩm</li>
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
                                        action="{{ route('admin.cate_product.postUpdate', $cate_product->id) }}"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Tên danh mục: </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" placeholder="Tên"
                                                    name="name_vi" value="{{ $cate_product->name_vi }}">
                                                </div>
                                            </div>

                                           
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Ảnh bìa: </label>
                                                <div class="col-md-8">
                                                    <input type="file" class="form-control" name="image"
                                                    value="{{ $cate_product->image }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-8">
                                                    <img src="{{asset($cate_product->image)}}" style="max-width: 30%;"/>
                                                </div>
                                            </div>

                                            <div style="margin-top: 20px;margin-bottom: 20px;">
                                                <label class="col-md-3 control-label">Trạng thái: </label>
                                                <label class="switch">
                                                    <input type="checkbox" name="status"
                                                    value="0" {{($cate_product->status)?'checked':''}}>
                                                    <span class="slider round"></span>
                                                    <input type="hidden" name="id" value="1">
                                                </label>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Miêu tả: </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" placeholder="Miêu tả"
                                                    name="description_vi" value="{{ $cate_product->description_vi }}">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Vị trí: </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" placeholder="Vị trí"
                                                    name="position" value="{{ $cate_product->position }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Danh mục</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="parent_id">
                                                        <?php $hihi = DB::table('cate_products')
                                                        ->where('id',$cate_product->parent_id)->first(); ?>
                                                        @if(isset($hihi))
                                                        <option value="{{ $cate_product->parent_id }}">
                                                            {{ $hihi->name_vi }}
                                                        </option>
                                                        @else
                                                        <option value="0">
                                                            {{ $cate_product->name_vi }}
                                                        </option>
                                                        @endif
                                                        <?php  menu($data);?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <button class="btn-success btn">Lưu</button>
                                                    <a class="btn-default btn" href="{{ route('admin.cate_product.home') }}">
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
