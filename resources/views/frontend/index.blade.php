@extends('frontend/partials/master')
@section('title', $setting->$get_name)

@section('content')
{{-- <h1 style="display: none;">{{ $setting->title_seo }}</h1> --}}
@include('frontend.partials.slide')
<div class="box1">
    <div class="tieude1 wow fadeInUp animated">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-4">
                    <img src="{{ asset('images/trai.png') }}" alt="">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4">
                    <h2 class="tdh2">Lý do bạn nên chọn THPT HÀ NỘI</h2>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-4">
                    <img src="{{ asset('images/phai.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    
    <div class="mieutab1">
        <div class="container">
            <div class="row">
                @foreach ($top as $key => $t)
                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <div class="itembox1 wow zoomIn animated">
                            
                            <a href="{{ route('lydochon') }}/#lydom{{$key}}">
                                <img src="{{ asset($t->image) }}" alt="">
                                <h4>{{ $t->$get_name }}</h4></a>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
    
</div>
@if ($baihay)
<div class="box2">
    <img src="{{ asset($baihay->image) }}" alt="">
    <div class="mtb2 wow fadeInUp animated">
        <a href="{{ $baihay->link }}"><h1>{{ $baihay->name_vi }}</h1></a>
        <p>{!! $baihay->description_vi !!} </p>
    </div>
</div>
@endif
<div class="box3">
    <div class="tieude">
        <h2 class="tdh2">{{ trans('home.chuongtrinhhoc') }}</h2>
        <img src="{{ asset('images/giua.png') }}" alt="">
    </div>
    <div class="ndb3">
        <div class="container">
            <div class="row">
                @foreach ($cate_post as $c)
                    <div class="col-md-6">
                        <div class="cot1r3 wow zoomIn animated">
                            <div class="hovicon effect-8">
                                <a href="{{ route('detail', $c->slug_vi) }}"><img src="{{ asset($c->image) }}" alt="">
                            </div>
                                <h5>{!! $c->$get_title!!}</h5></a>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>

<div class="about_homes" style="background: url('images/c1.png') no-repeat; background-size: cover;background-attachment: fixed;">
    <h2 class="tdh2 wow fadeInUp animated" style="color: #fff;">{{ trans('home.conso') }}</h2>
    <div class="ndcs">
        <div class="container">
            <div class="row">
                @foreach ($conso as $key => $c)
                
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="about_pro wow zoomIn animated">
                        <div class="ab_thumb">
                            <img src="{{ asset($c->image) }}" alt="{{ $c->$get_name }}" class="img-fluid">
                        </div>
                        <div class="ab_content">
                            <div class="sochay">
                                
                                <div class="lamck2">
                                    @if ($key%2 == 0)
                                        <span class="ckasls2">+</span>
                                    @endif
                                    
                                    <div class="counter-value" data-count="+315">{{ $c->conso }}</div>
                                </div>
                            </div>

                        </div>
                        <p>{{ $c->$get_name }}</p>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>

<div class="box5">
    <div class="tieude wow fadeInUp animated">
        <h2 class="tdh2">{{trans('home.thongtingiaoduc')}}</h2>
        <img src="{{ asset('images/giua.png') }}" alt="">
    </div>
    <div class="rowbox5">
        <div class="container">
            <div class="row">
                @foreach ($giaoduc as $t)
                    <div class="col-md-4">
                        <div class="itemb5 wow zoomIn animated">
                            <div class="anh">
                                <a href="{{ route('showgiaoduc', $t->slug) }}"><img src="{{ asset($t->image) }}" alt="" class="img-hover"></a>
                            </div>
                            <a href="{{ route('showgiaoduc', $t->slug) }}">
                                <h4>{{ $t->$get_name }}</h4>
                            </a>
                            <p>{{date_format (new DateTime($t->ngay), 'd-m-Y')}}</p>
                            <p>{!! str_limit($t->$get_title, 160, '...') !!}</p>
                            <a href="{{ route('showgiaoduc', $t->slug) }}" class="xemthem">{{ trans('home.xemthem') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="box6">
    <img src="{{ asset($setting->logo3) }}" alt="">
    <div class="formdk wow fadeInRight animated">
        <h3>{{ trans('home.dangkytrainghiem') }}</h3>
        <form class="form-group" action="{{ route('post_contact') }}" STYLE="" id="myform00" method="post" >
            {{ csrf_field() }}
            
            <input type="text" class="form-control" name="name" placeholder="Họ tên học sinh*" required="">
            <input type="number" class="form-control" name="phone" placeholder="Số điện thoại*" required="">
            <input type="number" class="form-control" name="namsinh" placeholder="Năm sinh*" required="">
            <input type="text" class="form-control" name="totnghiep" placeholder="Tốt nghiệp trường*" required="">
            <input type="text" class="form-control" name="address" placeholder="Địa chỉ*" required="">
            <input type="text" class="form-control" name="phuhuynh" placeholder="Họ tên phụ huynh*" required="">
            <input type="number" class="form-control" name="phone2" placeholder="Số điện thoại*" required="">
            <input type="email" class="form-control" name="email" placeholder="Email" style="margin-bottom: 10px">
            
                <label class="radio-inline">
                <input type="radio" name="lop" checked value="Lớp học cơ bản">Lớp học cơ bản</label>
                <label class="radio-inline">
                <input type="radio" name="lop" value="Lớp học nâng cao">Lớp học nâng cao</label>
            
            <p style="text-align:center;">
                <button class="btn btn-danger" type="submit" value="Gửi mail" name="save">{{ trans('home.guidangky') }}</button>
            </p>
        </form>
    </div>
</div>


<div class="box7">
    <div class="tieude1 wow fadeInUp animated">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('images/trai.png') }}" alt="">
                </div>
                <div class="col-md-4">
                    <h2 class="tdh2">{{trans('home.tintuc')}}</h2>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('images/phai.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="rowbox7">
        <div class="container">
            <div class="row">
                @foreach ($tintuc as $key => $c)
                    <div class="col-md-4" @if ($key%3 == 0)
                        style="clear: both;" 
                    @endif>
                        <div class="itemb7 wow zoomIn animated">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="anh">
                                        <a href="{{ route('detail_product', $c->slug_vi) }}"><img src="{{ asset($c->image) }}" alt="" class="img-hover"></a>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="makc7">
                                        <a href="{{ route('detail_product', $c->slug_vi) }}"><h5>{{ $c->$get_name }}</h5></a>
                                        <p><i class="far fa-clock"></i> {{date_format (new DateTime($c->ngay), 'd-m-Y')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>

{{-- <div class="hang">
    <div class="tieude">
        <h2 class="tdh2">{{ trans('home.doitac') }}</h2>
        <img src="{{ asset('images/giua.png') }}" alt="">
    </div>
    <div class="container">
        <div class="cccc">
            @foreach ($hang as $h)
                <div class="anhhang">
                        <a href="{{ $h->link }}" target="_blank"><img src="{{ asset($h->image) }}" alt=""></a>
                        <!-- <h5>{{ $h->value }}</h5> -->
                </div>
            @endforeach
        </div>
    </div>
</div> --}}
@php
    $popup = DB::table('slides')->where('status', 1)->where('dislay', 6)->first();

@endphp
@if($popup)
<style>

            #addd-pop .modal-dialog {

                max-width: 825px;
    width: unset!important;
    margin: 10px;
    padding: 0;
    /* text-align: center; */
    margin: auto;
    margin-top: 50px;

            }

            .modal-space {

                width: 100%;

                min-height: 200px;

                background: white;

                position: relative;

            }

            .addd-modal .modal-content{

                border: none;

                border-radius: 0;

                background: none;

            }

            .addd-modal .modal-space .close {

                position: absolute;

                top: -6px;

                right: -6px;

                z-index: 1px;

            }

            .addd-modal .modal-space img {

                max-width: 100%;

            }

</style>
<div class="modal fade addd-modal" id="addd-pop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-space">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">×</span>

                </button>

                <a href="{{ $popup->link }}" target="_blank"><img src="{{ asset($popup->image) }}" alt="1"></a>

            </div>

        </div>

    </div>

</div>
@endif

@endsection
@section('script')
    <script type="text/javascript">
            $(document).ready(function() {
                $("#myform").validate({
                    rules: {
                        name: {
                            required: true,
                            minlength:8,
                            maxlength:150
                        },
                        email: {
                            required: true,
                            email: true,
                            maxlength:150
                        },
                        phone: {
                            required: true,
                            number: true,
                            minlength: 7,
                            maxlength: 15
                        },
                        address: {
                            required: true,
                            minlength:5,
                            maxlength:150
                        }
                    },
                    messages: {
                        name: {
                            required: " <span style='color:#FF0000; '>Xin vui lòng nhập họ tên của bạn!</span><br />",
                            minlength: " <span style='color:#FF0000; '>Họ tên quá ngắn!</span><br />",
                            maxlength: " <span style='color:#FF0000; '>Họ tên quá dài!</span><br />",
                        },
                        phone: {
                            required: " <span style='color:#FF0000; '>Xin vui lòng nhập số điện thoại!</span><br />",
                            number: "<span style='color:#FF0000; '>Số điện thoại chỉ bao gồm các số từ 0 - 9!</span><br />",
                            minlength: "<span style='color:#FF0000; '>Số điện thoại quá ngắn!</span><br />",
                            maxlength: "<span style='color:#FF0000; '>Số điện thoại quá dài!</span><br />",
                        },
                        email: {
                            required: " <span style='color:#FF0000;'>Xin vui lòng nhập email!</span><br />",
                            maxlength: " <span style='color:#FF0000; '>Email quá dài!</span><br />",
                        },
                        address: {
                            required: " <span style='color:#FF0000;'>Xin vui lòng nhập tên công ty của bạn!</span><br />",
                            minlength: " <span style='color:#FF0000;'>Địa chỉ quá ngắn!</span><br />",
                            maxlength: " <span style='color:#FF0000; '>Địa chỉ quá dài!</span><br />",
                        }
                    }
                });
            });
    </script>
    
@endsection
