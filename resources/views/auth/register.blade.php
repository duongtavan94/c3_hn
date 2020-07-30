@extends('frontend.partials.master')
@section('title', 'Đăng ký')
@section('content')

    <div class="container">
        <div class="dangky">
            <div style="margin-top: 60px;">
            <h2 style="font-weight: bolder">Đăng ký</h2>

        </div>
            <div id="content">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">

                        @if (session('warning'))
                            <span class="alert alert-warning help-block">
                                <strong>{{ session('warning') }}</strong>
                            </span>
                        @endif

                        <form method="post" class="beta-form-checkout" action="{{ route('register') }}">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="">
                                <label style="padding: 5px 0;font-size: 13px;font-family: Arial">Họ tên*</label>
                                <input style="background: #f0f0f0;border: none;height: 30px" type="text"
                                       id="name" name="name" required value="{{old('name')}}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"
                                     style="">
                                     <label style="padding: 5px 0;font-size: 13px;font-family: Arial; ">Email*</label>
                                    <input style=" background: #f0f0f0;border: none;height: 30px"
                                           type="email" id="email" name="email" required value="{{old('email')}}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label style="padding: 5px 0;font-size: 13px;font-family: Arial">Mật khẩu*</label>
                                <input style=" background: #f0f0f0;border: none;height: 30px"
                                       type="password"
                                       id="pass" name="password"
                                       required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label style="padding: 5px 0;font-size: 13px;font-family: Arial">Xác nhận mật khẩu*</label>
                                <input style=" background: #f0f0f0;border: none;height: 30px"
                                       type="password" id="password-confirm"
                                       name="password_confirmation"
                                       required>
                            </div>
                            <div class="form-block">
                                <button type="submit"
                                        style="background: #E32124;font-size: 16px;color:#fff;padding: 10px 30px;border: none;border-radius: 3px">
                                    <i class="fa fa-external-link"></i> Đăng ký
                                </button>
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>
                    {{-- <div class="col-sm-6" style="margin-left: 40px">
                        <p style="font-weight: bolder;font-size: 20px;margin-bottom: 50px;font-family: Arial">BẠN ĐÃ CÓ
                            TÀI KHOẢN?</p>
                        <a href="{{route('login')}}" style="padding: 10px 40px;background: #E32124;color: #fff;
                                font-size: 16px;font-family: Arial;border-radius: 3px;margin-left: 15px"><i
                                    style="color: #fff" class="fa fa-sign-in"></i>ĐĂNG NHẬP</a>
                    </div> --}}
                </div>
            </div> <!-- #content -->
        </div> <!-- .container --></div>
@stop

