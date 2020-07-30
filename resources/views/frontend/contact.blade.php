@extends('frontend.partials.master')
@section('title', 'Liên hệ')
@section('content')
<div class="anhbanner">
        <img src="{{ asset($setting->anh7) }}" alt="">
    </div>
<div class="lienhes">
    <div class="container">
        <br/>
        <div class="col-sm-12 col-xs-12 col-md-6">
            <div id="contact" class="spacer">
                <!--Contact Starts-->
                <div class="contactform center">
                    <h4>{{ trans('home.lienhe') }}</h4>
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <div class="row wowload fadeInLeftBig animated" style="visibility: visible;">
                        <div class="col-sm-12 col-xs-12">
                            <form class="form-group" STYLE="  MARGIN-TOP: 34PX;" id="myformc" name="contactForm" method="post" action="{{ route('post_contact') }}">
                                {{ csrf_field() }}
                                <input class="form-control" type="text" class="form-control" name="name" placeholder="{{ trans('home.hotenhocvien') }}*" required=""><br>
            <input class="form-control" type="number" class="form-control" name="title" placeholder="{{ trans('home.namsinh') }}*" required=""><br>
            <input class="form-control" type="text" class="form-control" name="content" placeholder="{{ trans('home.hotenphuhuynh') }}*" required=""><br>
            <input class="form-control" type="number" class="form-control" name="phone" placeholder="{{ trans('home.sodienthoai') }}*" required=""><br>
            <input class="form-control" type="email" class="form-control" name="email" placeholder="Email*" required="">
            <p style="text-align:center;"><br>
                <button class="btn btn-danger" type="submit" value="Gửi mail" name="save">{{ trans('home.guidangky') }}</button>
            </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-6">
            <div class="bando">
                {!! $setting->bando !!}
            </div>
        </div>
    </div>
</div>
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