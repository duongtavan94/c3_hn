<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                <div class="colum1">
                    <a href="tel:">Hotline: {{ $setting->hotline }}</a>
                    <a href="">{{ $setting->email }}</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="colum2">
                    <a href="{{ $setting->fb }}"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $setting->yt }}"><i class="fab fa-youtube-square"></i></a>
                    <a href="{{ $setting->sky }}"><i class="fab fa-skype"></i></a>
                    <a href="{{ $setting->gg }}"><i class="fab fa-google-plus"></i></a>
                    <a href="{{ $setting->ig }}"><i class="fab fa-instagram"></i></a>
                    <a href="{{ $setting->tw }}"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="sigin">
                    <ul>
                        @if (Route::has('login'))
                            @auth
                                <li style="">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li><a><i class="fa fa-user"></i> {{ Auth::user()->name }} </a></li>
                            @else
                                <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i></i> Đăng nhập</a></li>
                                <li><a href="{{ route('register') }}"><i class="fa fa-key"></i> Đăng ký</a></li>
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="headermb" style="display: none;">
    <div class="row">
        <div class="col-xs-6">
            <div class="logo2">
                    <a href="{{ route('index') }}"><img src="{{ asset($setting->logo) }}" alt=""></a>
                </div>
        </div>
        <div class="col-xs-6">
                <div class="sigin">
                    <ul>
                        @if (Route::has('login'))
                            @auth
                                <li style="">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li><a><i class="fa fa-user"></i> {{ Auth::user()->name }} </a></li>
                            @else
                                <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i></i> Đăng nhập</a></li>
                                <li><a href="{{ route('register') }}"><i class="fa fa-key"></i> Đăng ký</a></li>
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
    </div>
</div>
<div class="logomenu" id="myHeader">
    {{-- <div class="row"> --}}
    	<div class="col-xs-12 col-sm-12 col-md-3">
    	    <div class="logo">
    	        <a href="{{ route('index') }}"><img src="{{ asset($setting->logo) }}" alt=""></a>
    	    </div>
    	</div>
    	<div class="col-xs-12 col-sm-12 col-md-9">
    	    <div class="menu">
    	        <nav id='flexmenu'>
    	            <div id="mobile-toggle" class="button"></div>
    	            <ul id="main-menu">
    	                {{-- <li class='active'><a href="{{ route('index') }}">Trang chủ</a></li> --}}
    	                <li><a href="{{ route('intro') }}">{{ trans('home.gioithieu') }}</a>
    	                    <ul class="sub-menu">
    	                        
    	                        <li><a href="{{ route('intro') }}">Về nhà trường</a>
    	                        </li>
    	                        <!-- <li><a href="{{ route('intro') }}">Mục tiêu</a>
    	                        </li>
    	                        <li><a href="{{ route('intro') }}">Lịch sử phát triển</a>
    	                        </li> -->
    	                        <li><a href="{{ route('giaovien') }}">Đội ngũ giáo viên</a>
    	                        </li>
    	                    </ul>
    	                </li>
    	                <li><a href="{{ route('detail') }}">{{ trans('home.chuongtrinhhoc') }}</a>
    	                    <ul class="sub-menu">
    	                        @php
    	                            $cth = DB::table('posts')->where('status', 1)->orderBy('position', 'ASC')->get();
    	                        @endphp
    	                        @foreach($cth as $l)
    	                        <li><a href="{{ route('detail') }}">{{ $l->$get_name }}</a>
    	                        </li>
    	                        @endforeach
    	                    </ul>
    	                </li>
    	                @php
    	                    $cth2 = DB::table('cate_products')->where('status', 1)->where('parent_id', 0)->orderBy('position', 'ASC')->get();
    	                @endphp
    	                @foreach($cth2 as $l)
    	                    <li><a href="{{ route('productByCate', $l->slug_vi) }}">{{ $l->$get_name }}</a>
    	                        <ul class="sub-menu">
    	                            @php
    	                                $cth3 = DB::table('cate_products')->where('status', 1)->where('parent_id', $l->id)->orderBy('position', 'ASC')->get();
    	                            @endphp
    	                            @foreach ($cth3 as $c)
    	                                <li><a href="{{ route('productByCate', $c->slug_vi) }}">{{ $c->$get_name }}</a>
    	                                </li>
    	                            @endforeach
    	                        </ul>
    	                    </li>
    	                @endforeach
    	                
    	                {{-- <li><a href="{{ route('chinhanh') }}">Tuyển sinh</a></li> --}}
    	                {{-- <li><a href="{{ route('tintuc') }}">{{ trans('home.tintuc') }}</a></li> --}}
    	                <li><a href="{{ route('thongtingiaoduc') }}">{{ trans('home.thongtingiaoduc') }}</a></li>
    	                
    	                <li><a href="#">Thư viện</a>
    	                    <ul class="sub-menu">
    	                        <li><a href="{{ route('allAlbum') }}">Thư viện ảnh</a>
    	                        <li><a href="{{ route('video') }}">Video</a></li>
    	                        
    	                    </ul>
    	                </li>
    	                <li><a href="{{ route('allTailieu') }}">Tài liệu</a>
    	                    <ul class="sub-menu">
    	                        @php
    	                            $cate_tailieu = DB::table('cate_investors')->where('status',1)->orderBy('position', 'DESC')->get();
    	                        @endphp
    	                        @foreach ($cate_tailieu as $c)
    	                        <li><a href="{{ route('tailieuByCate', $c->slug) }}">{{ $c->name_vi }}</a>
    	                        @endforeach
    	                    </ul>
    	                </li>
    	                <li><a href="{{ route('contact') }}">{{ trans('home.lienhe') }}</a></li>
    	            </ul>
    	        </nav>
    	    </div>
    	</div>
    {{-- </div> --}}
</div>