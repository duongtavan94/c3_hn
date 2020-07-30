@extends('frontend.partials.master')
@section('title', trans('home.vanbanphapquy'))
@section('content')

    <div class="container">
        <div class="content">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2 class="tdh22">{{ trans('home.vanbanphapquy') }}</h2>
                <div class="vanbanphapquy-title">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{ route('searchTL') }}" action="get">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>{{ trans('home.loaivanban') }}:</label>
                                        <select class="form-control" name="loai">
                                            <option value="">--{{ trans('home.chontatca') }}--</option>
                                            <option value="Luật">{{ trans('home.luat') }}</option>
                                            <option value="Thông tư">{{ trans('home.thongtu') }}</option>
                                            <option value="Nghị định">{{ trans('home.nghidinh') }}</option>
                                            <option value="Quyết định">{{ trans('home.quyetdinh') }}</option>
                                            <option value="Văn bản">{{ trans('home.vanban') }}</option>
                                            <option value="Thông báo">{{ trans('home.thongbao') }}</option>
                                            <option value="Công văn">{{ trans('home.congvan') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>{{ trans('home.sohieu') }}</label>
                                        <input type="text" name="sohieu" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>{{ trans('home.trichyeu') }}</label>
                                        <input type="text" name="trichyeu" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <button class="btn">{{ trans('home.timkiem') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                <div class="baiviet">
                    <div class="panel-body" style="overflow-x:auto;">
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>{{ trans('home.sohieu') }}</th>
                                    <th>{{ trans('loaivanban') }}</th>
                                    <th>{{ trans('home.ngaybanhanh') }}</th>
                                    <th>{{ trans('home.coquanbanhanh') }}</th>
                                    <th>{{ trans('home.linhvuc') }}</th>
                                    <th>{{ trans('home.trichyeu') }}</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vbpq as $key => $c)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $c->sohieu }}</td>
                                    <td>{{ $c->$get_loai }}</td>
                                    <td>{{ $c->ngayban }}</td>
                                    <td>{{ $c->$get_coquan }}</td>
                                    <td>{{ $c->$get_linhvuc }}</td>
                                    <td>{!! str_limit($c->$get_trichyeu , $limit = 60, $end = '...') !!}</td>

                                    <td>
                                        <a href="{{ asset($c->file) }}">dowload</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        {{ $vbpq->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
<script type="text/javascript">
    $(function () {
        // $("#example2").DataTable();
        $('#example2').DataTable( {
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select><option value="">Chọn</option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        } );
    });
</script>
@endsection