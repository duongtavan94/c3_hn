@extends('admin.partials.master')
@section('title', 'Chương trình học')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Chương trình học</h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i>Trang chủ</li>
            <li class="active">Chương trình học</li>
        </ol>
        <a href="{{ route('admin.cate_post.create') }}" class="btn btn-primary">
            <i class=" fa fa-fw fa-plus"></i>
            Thêm mới
        </a>
    </section>
	<section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <div class="static-content-wrapper">
                    <div class="static-content">
                        <div class="page-content">
                            @include('errors.message')
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <div class="options">
                                                </div>
                                            </div>
                                            <div class="panel-body" style="overflow-x:auto;">
                                                <table id="datatable_cate_post" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Tên</th>
                                                            <th>Ảnh home</th>
                                                            <th>Ảnh trang con</th>
                                                            <th>Trạng thái</th>
                                                            <th>Cập nhật</th>
                                                            <th>Xử lý</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($cate_post as $key => $c)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $c->name_vi }}</td>
                                                            <td>
                                                                <img src="{{ asset($c->image) }}"
                                                                style="height: 60px; width: 60px;">
                                                            </td>
                                                            <td>
                                                                <img src="{{ asset($c->image2) }}"
                                                                style="height: 60px; width: 60px;">
                                                            </td>
                                                            <td>
                                                                @if($c->status == 1)
                                                                    <a href="#" title="Ẩn" id="status" data-id="{{ $c->id }}">
                                                                        <span id="status{{ $c->id }}"><span class="label label-success">Hiện</span></span>
                                                                    </a>
                                                                @else
                                                                    <a href="#" title="Hiện" id="status" data-id="{{ $c->id }}">
                                                                        <span id="status{{ $c->id }}"><span class="label label-danger">Ẩn</span></span>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                            <td>{{ $c->updated_at }}</td>
                                                            <td>
                                                                <a href="{{ route('admin.cate_post.update', $c->id)}}">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <a href="{{ route('admin.cate_post.destroy', $c->id) }}"
                                                                    type="button"
                                                                    onclick="return confirm_delete('Bạn có muốn xóa không ?')">
                                                                    <i class="fa fa-times-circle"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
        </div>

	</section>
</div><!-- /.content-wrapper -->
@endsection
<style type="text/css">
    body{
    margin:0;
    padding:0;
    background:#f1f1f1;
    font:70% Arial, Helvetica, sans-serif;
    color:#555;
    line-height:150%;
    text-align:left;
    }
    a{
        text-decoration:none;
        color:#057fac;
    }
    a:hover{
        text-decoration:none;
        color:#999;
    }
    h1{
        font-size:140%;
        margin:0 20px;
        line-height:80px;
    }
    #container{
        margin:0 auto;
        width:680px;
        background:#fff;
        padding-bottom:20px;
        padding-top: 20px;
    }
    #content{margin:0 20px;}
    p{
        margin:0 auto;
        width:680px;
        padding:1em 0;
    }
    #datatable_cate_post{
        font-size: 14px;
    }
</style>
@section('script')
<script type="text/javascript">
    $(function () {
        $("#datatable_cate_post").DataTable();
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '#status', function(){
        var id = $(this).data('id');
        $.post('{{ route('admin.cate_post.status') }}', {id:id}, function(data){
            if (data.status == 1)
            {
                $('#status'+id).html('<span class="label label-success">Hiện</span>');
            } else {
                $('#status'+id).html('<span class="label label-danger">Ẩn</span>');
            }
        });
    });
</script>
@endsection