@extends('frontend.partials.master')
@section('title', 'Tài liệu')
@section('content')
    <div class="container">
        <div class="content">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tieude">

            <h2 class="tdh2">Tài liệu</h2>

            <img src="{{ asset('images/giua.png') }}" alt="">

        </div>
                <div class="baiviet">
                    <div class="panel-body" style="overflow-x:auto;">
                        <table id="{{-- example2 --}}" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tailieu as $key => $c)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ str_limit($c->name_vi , $limit = 60, $end = '...') }}</td>

                                    <td>
                                        <a href="{{ route('detail_tailieu', $c->id) }}">dowload</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            {{-- <tfoot>
                                <th>STT</th>
                                <th>Tên</th>

                                <th>Download</th>
                            </tfoot> --}}
                        </table>
                    </div>
                </div>
            </div>
            {{-- @include('frontend.partials.sidebar') --}}
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    $(function () {
        // $("#example2").DataTable();
        $('#example2').DataTable( {
            // initComplete: function () {
            //     this.api().columns().every( function () {
            //         var column = this;
            //         var select = $('<select><option value="">Chọn</option></select>')
            //             .appendTo( $(column.footer()).empty() )
            //             .on( 'change', function () {
            //                 var val = $.fn.dataTable.util.escapeRegex(
            //                     $(this).val()
            //                 );

            //                 column
            //                     .search( val ? '^'+val+'$' : '', true, false )
            //                     .draw();
            //             } );

            //         column.data().unique().sort().each( function ( d, j ) {
            //             select.append( '<option value="'+d+'">'+d+'</option>' )
            //         } );
            //     } );
            // }
        } );
    });
</script>
@endsection