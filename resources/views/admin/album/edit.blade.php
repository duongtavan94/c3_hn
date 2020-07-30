@extends('admin.partials.master')
@section('title', 'Sửa Album')
@section('content')
<div class="content-wrapper">
<section class="content-header">
    <div class="static-content-wrapper">
        <div class="static-content">
            <div class="page-content">
                <div class="page-heading">
                    <h1>Sửa Album</h1>
                    <div class="options">
                        <div class="btn-toolbar">
                        </div>
                    </div>
                </div>
                <ol class="breadcrumb">
                    <li>Trang chủ</li>
                    <li>Quản lý Album</li>
                    <li>Album</li>
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
                                    action="{{ route('admin.album.postUpdate', $album->slug) }}"
                                    enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Tên Album: </label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control"
                                                    placeholder="Nhập tên" name="name" value="{{ $album->name }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Ảnh bìa: </label>
                                                <div class="col-md-8">
                                                    <input type="file" class="form-control" name="image">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-8">
                                                    <img src="{{ asset($album->image) }}"
                                                    style="height: 50px; width: 50px">
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 control-label">Ảnh chi tiết Album: </label>
                                                <div class="col-md-8">
                                                    @foreach($img_detail as $i)
                                                        <div class="image">
                                                            <img src="{{ asset($i->name) }}" style="height: 50px; width: 50px">
                                                            <label><span class="btn btn-danger delImage" id="data-1" data-id="{{ $i->id }}"> X </span></label>
                                                        </div>
                                                    @endforeach
                                                    <a class="btn btn-primary btn-sm addimg" style="margin-top: 2px; margin-left: 0">+ Thêm ảnh</a>
                                                </div>
                                            </div>

                                            <div class="form-group" id="contentimg">
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Trạng thái: </label>
                                                <label class="switch">
                                                    <input type="checkbox" name="status"
                                                    {{ ($album->status) ? 'checked': '' }}>
                                                    <span class="slider round"></span>
                                                    <input type="hidden" name="id" value="1">
                                                </label>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Vị trí: </label>
                                                <div class="col-md-8">
                                                    <input type="number" class="form-control"
                                                    placeholder="Nhập vị trí" name="position"
                                                    value="{{ $album->position }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <button class="btn-success btn">Lưu</button>
                                                    <a class="btn-default btn"
                                                    href="{{ route('admin.album.create') }}">
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

    $(document).ready(function() {
        $('.addimg').on('click', function(){
            $('#contentimg').append('<label class="col-md-3 control-label"></label><div class="col-md-8"><input type="file" class="form-control" name="img[]"></div>');
        });
        $('.delImage').on('click',function(){
            id = $(this).data('id');
            if(confirm('Bạn có muốn xóa ?')){
                flag = $(this).parent('label').parent('div.image').hide();
                $.get('http://master.qt/admin/album/delImage/', {id:id},function(data){
                });
            }
        });
    });
</script>
@endsection