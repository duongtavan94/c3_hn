@extends('admin.partials.master')

@section('title', 'Quản lý liên hệ')

@section('content')

<div class="content-wrapper">

    <section class="content-header">

        <div class="static-content-wrapper">

            <div class="static-content">

                <div class="page-content">

                    <div class="page-heading">

                        <h1>Liên hệ</h1>

                        <div class="options">

                            <div class="btn-toolbar">

                            </div>

                        </div>

                    </div>

                    <ol class="breadcrumb">

                        <li>Trang chủ</li>

                        <li>Quản lý liên hệ</li>

                    </ol>
                    <div class="row">
                        <ol class="breadcrumb">
                            <li><a href="{{ route('admin.contact.exportexcel') }}">Xuất Excel</a></li>
                        </ol>
                        <!-- <div class="col-md-8">
                            <a href="{{ route('admin.post.create') }}" class="btn btn-primary">
                                <i class=" fa fa-fw fa-plus"></i>Thêm mới
                            </a>
                        </div> -->
                    </div>

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

                                        <table class="table table-striped table-responsive" id="datatable_post">

                                            <thead>

                                                <tr>

                                                    <th>STT</th>

                                                    <th>Tên HS</th>

                                                    <th>Phone</th>

                                                    <th>Năm sinh</th>
                                                    <th>Xửa lý</th>

                                                    <th>Ngày</th>
                                                    <th></th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                @foreach($contact as $key => $c)

                                                <tr>

                                                    <td>{{ $key + 1 }}</td>

                                                    <td>{{ $c->name }}</td>

                                                    <td>{{ $c->phone }}</td>

                                                    <td>{{ $c->namsinh }}</td>
                                                    <td>
                                                        @if($c->status == 1)
                                                        Chờ xử lý
                                                        @elseif($c->status == 2)
                                                        Đang xử lý
                                                        @elseif($c->status == 3)
                                                        Hoàn thành
                                                        @else
                                                        Hủy
                                                        @endif
                                                    </td>

                                                    

                                                    <td>{{ $c->created_at }}</td>

                                                    <td>
                                                        <a href="{{ route('admin.contact.show', $c->id)}}">
                                                                <i class="glyphicon glyphicon-eye-open"></i>
                                                            </a>

                                                        <a href="{{ route('admin.contact.destroy', $c->id) }}"

                                                            type="button"

                                                            onclick="return confirm_delete('Bạn có muốn xóa không ?')">

                                                            <i class="fa fa-times-circle"></i>

                                                        </a>

                                                    </td>

                                                </tr>

                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>

                                                    <th>STT</th>

                                                    <th>Tên HS</th>

                                                    <th>Phone</th>

                                                    <th>Năm sinh</th>
                                                    <th>Xửa lý</th>

                                                    <th>Ngày</th>
                                                    <th></th>

                                                </tr>
                                            </tfoot>

                                        </table>
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
    <script type="text/javascript">
        $(function () {
            $("#datatable_post").DataTable();
        });
    </script>
@endsection