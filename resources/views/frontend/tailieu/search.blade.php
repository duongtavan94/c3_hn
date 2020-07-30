@extends('frontend.partials.master')
@section('title',trans('home.timkiem'))
@section('content')

    <div class="container">
        <div class="content">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2 class="tdh22">{{ trans('home.timkiem') }}</h2>
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
                                @foreach($search_pro as $key => $c)
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
                        {{ $search_pro->links() }}
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="vanbanphapquy">
            <h2>Văn bản pháp quy</h2>
            <div class="vanbanphapquy-title">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="/index.php">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Loại văn bản:</label>
                                        <select class="form-control" name="loai">
                                            <option value="0">--Chọn tất cả--</option>
                                            <option value="1">Luật</option>
                                            <option value="2">Thông tư</option>
                                            <option value="3">Nghị định</option>
                                            <option value="4">Quyết định</option>
                                            <option value="5">Văn bản</option>
                                            <option value="6">Thông báo</option>
                                            <option value="7">Công văn </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Số hiệu</label>
                                        <input type="text" name="sohieu" class="form-control">
                                        <input type="hidden" name="page" value="van-ban-phap-quy">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Trích yếu</label>
                                        <input type="text" name="trichyeu" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <button class="btn">Tìm kiếm</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Số Hiệu</th>
                        <th>Loại VB</th>
                        <th>Ngày ban hành</th>
                        <th>Cơ quan ban hành</th>
                        <th>Lĩnh vực</th>
                        <th>Trích yếu</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>01/QD-BCDTW</td>
                        <td>Quyết định</td>
                        <td>22/08/2018</td>
                        <td>Chính Phủ</td>
                        <td>Nông nghiệp</td>
                        <td>Quyết định số 01/QĐ-BCĐTW ngày 22/8/2018 của Ban Chỉ đạo Trung ương các Chương trình MTQG về Kế hoạch triển khai Chương trình Mỗi xã một sản phẩm giai đoạn 2018 - 2020.</td>
                        <td><a href="/images/_FilesUpload_01-QD-BCDTW.pdf">download</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>5053/BNN-VPĐP</td>
                        <td>Văn bản</td>
                        <td>04/07/2018</td>
                        <td>Bộ NN và PTNT</td>
                        <td>Nông nghiệp</td>
                        <td>Về việc góp ý Kế hoạch triển khai Chương trình Mỗi xã một sản phẩm, giai đoạn 2018-2020</td>
                        <td><a href="/images/_FilesUpload_5035_BNN-VPDP_03072018.pdf">download</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>201/TB-UBND</td>
                        <td>Thông báo</td>
                        <td>15/06/2018  </td>
                        <td>Chính Phủ</td>
                        <td>Trồng trọt</td>
                        <td>THÔNG BÁO Kết luận của Phó Chủ tịch UBND tỉnh Lê Trí Thanh tại Hội nghị trực tuyến triển khai "Chương trình mỗi xã một sản phẩm tỉnh Quảng Nam, giai đoạn 2018-2020 và định hướng đến năm 2030"</td>
                        <td><a href="/images/_FilesUpload_201-TB-UBND.pdf">download</a></td>
                    </tr>
                </tbody>
            </table>
        </div> --}}
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