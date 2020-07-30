@extends('admin.partials.master')
@section('title', 'Quản lý Tài liệu')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Tài liệu</h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i>Trang chủ</li>
            <li>Quản lý Tài liệu</li>
            <li class="active">Tài liệu</li>
        </ol>
    </section>
    <section class="content-header">
        <div class="static-content-wrapper">
            <div class="static-content">
                <div class="page-content">
                    @include('errors.message')
                    <div class="search">
                        <form class="" method="get" enctype="multipart/form-data" action="{{ route('admin.investor.search') }}">
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-8">
                                    <a href="{{ route('admin.investor.create') }}" class="btn btn-primary">
                                        <i class=" fa fa-fw fa-plus"></i>Thêm mới
                                    </a>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="options">
                                        </div>
                                    </div>
                                    <div class="panel-body" style="overflow-x:auto;">
                                        <form method="post" action="{{ route('investor.checkbox') }}">
                                            {{ csrf_field() }}
                                            <table id="datatable_investor" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" class="checkall" name="checkall" /></th>
                                                        <th>STT</th>
                                                        <th>Tên Tài liệu</th>
                                                        <th>Danh mục</th>
                                                        <th>Trạng thái</th>
                                                        <th>Cập nhật</th>
                                                        <th>Xử lý</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($investor as $key => $c)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="checkbox[]" class="checkbox" value="{{ $c->id }}">
                                                        </td>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $c->name_vi }}</td>
                                                        <td>{{ $c->Cate_investor->name_vi }}</td>
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
                                                            <a href="{{ route('admin.investor.update', $c->slug)}}">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <a href="{{ route('admin.investor.destroy', $c->id) }}"
                                                                type="button"
                                                                onclick="return confirm_delete('Bạn có muốn xóa không ?')">
                                                                <i class="fa fa-times-circle"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <th><input type="checkbox" class="checkall" name="checkall" /></th>
                                                    <th>STT</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Danh mục</th>
                                                    <th>Trạng thái</th>
                                                    <th>Cập nhật</th>
                                                    <th>Xử lý</th>
                                                </tfoot>
                                            </table>
                                            <select class="" name="select_action">
                                                <option value="0">Lựa chọn</option>
                                                <option value="1">Xóa</option>
                                                <option value="2">Hiện</option>
                                                <option value="3">Ẩn</option>
                                            </select>
                                            <button id="delete_all" class="btn-success">Thực hiện</button>
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
</div><!-- /.content-wrapper -->
@endsection
@section('script')
<script type="text/javascript">
    $(function () {
        $("#datatable_investor").DataTable();
    });
</script>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".checkall").change(function(){
            var checked = $(this).is(':checked');
            if(checked){
                $(".checkbox").each(function(){
                    $(this).prop("checked",true);
                });
            }else{
                $(".checkbox").each(function(){
                    $(this).prop("checked",false);
                });
            }
        });

        $(".checkbox").click(function(){
            if($(".checkbox").length == $(".checkbox:checked").length) {
                $(".checkall").prop("checked", true);
            } else {
                $(".checkall").removeAttr("checked");
            }
        });
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '#status', function(){
        var id = $(this).data('id');
        $.post('{{ route('admin.investor.status') }}', {id:id}, function(data){
            if (data.status == 1)
            {
                $('#status'+id).html('<span class="label label-success">Hiện</span>');
            } else {
                $('#status'+id).html('<span class="label label-danger">Ẩn</span>');
            }
        });
    });
    $(document).on('click', '#is_home', function(){
        var id = $(this).data('id');
        $.post('{{ route('admin.investor.is_home') }}', {id:id}, function(data){
            if (data.is_home == 1)
            {
                $('#is_home'+id).html('<span class="label label-success">Hiện</span>');
            } else {
                $('#is_home'+id).html('<span class="label label-danger">Ẩn</span>');
            }
        });
    });
</script>
@endsection