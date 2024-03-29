@extends('admin.partials.master')
@section('title', 'Danh mục bài viết')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Danh mục bài viết</h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i>Trang chủ</li>
            <li>Quản lý Bài viết</li>
            <li class="active">Danh mục</li>
        </ol>
        <a href="{{ route('admin.cate_investor.create') }}" class="btn btn-primary">
            <i class=" fa fa-fw fa-plus"></i>
            Thêm mới
        </a>
    </section>
	<section class="content-header">
        <div class="row">
            <div class="col-md-8">
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
                                                <table id="datatable_cate_investor" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Tên danh mục</th>
                                                            <th>Vị trí</th>
                                                            <th>Trạng thái</th>
                                                            <th>Cập nhật</th>
                                                            <th>Xử lý</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($cate_investor as $key => $c)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $c->name_vi }}</td>
                                                            <td>{{ $c->position }}</td>
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
                                                                <a href="{{ route('admin.cate_investor.update', $c->slug)}}">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <a href="{{ route('admin.cate_investor.destroy', $c->id) }}"
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
            <div class="col-md-4">
                <div id="container">
                    <div id="content">
                        <ul id="sitemap">
                            <?php
                                $level_1 = DB::table('cate_investors')->where([['status', 1], ['parent_id', 0]])
                                    ->orderBy('position', 'ASC')->get();
                            ?>
                            @foreach($level_1 as $l)
                            <li><a href="#">{{ $l->name_vi }}</a>
                                <ul>
                                    <?php
                                        $level_2 = DB::table('cate_investors')->where('status', 1)
                                            ->where('parent_id', $l->id)->orderBy('position', 'ASC')->get();
                                    ?>
                                    @foreach($level_2 as $v)
                                    <li><a href="#">{{ $v->name_vi }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
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
    #datatable_cate_investor{
        font-size: 14px;
    }
</style>
@section('script')
<script type="text/javascript">
    $(function () {
        $("#datatable_cate_investor").DataTable();
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '#status', function(){
        var id = $(this).data('id');
        $.post('{{ route('admin.cate_investor.status') }}', {id:id}, function(data){
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