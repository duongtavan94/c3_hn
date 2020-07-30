<!DOCTYPE html>

<html lang="vi">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="@yield('meta_des')">

    <meta name="author" content="Nguyễn Quốc Thông - 01639277272">

    <meta name="keywords" content="@yield('meta_key')">

    <meta name="twitter:card" content="summary" />

    <meta property="og:site_name" content="CODOBYE" />

    <meta property="og:url" content="{{ Request::url() }}" />

    <meta property="og:locale" content="vi_VN" />

    <meta property="og:type" content="article" />

    <meta property="og:title" content="@yield('title_seo')" />

    <meta name="twitter:description" content="@yield('meta_des')" />

    <meta name="twitter:title" content="@yield('title_seo')" />
    <link REL="SHORTCUT ICON" href="{{ $setting->icon }}">


    <title>@yield('title')</title>

    <link rel="canonical" href="@yield('canonical')"/>

    <link href={{ asset('bootstrap/css/bootstrap.min.css') }} rel="stylesheet" type="text/css">


    <link rel="stylesheet" type="text/css" href={{ asset('frontend/css/g3zcp.css') }}>

    <link rel="stylesheet" type="text/css" href={{ asset('frontend/css/news.css') }}>


    <link rel="stylesheet" type="text/css" href={{ asset('frontend/css/phonering.css') }}>

    <link rel="stylesheet" type="text/css" href={{ asset('frontend/css/menu.css') }}>

    <link rel="stylesheet" type="text/css" href={{ asset('css/fontawesome-all.css') }}>
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href={{ asset('box/jquery.fancybox.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('frontend/css/style.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('frontend/css/mobile.css') }}>
    
    {!! $setting->thead !!}

</head>

<body>
    {{-- {!! $setting->tbody !!} --}}


    @if(Session::has('success'))

        <script type="text/javascript">

            alert('{{ Session::get('success') }}');

        </script>

    @endif

    @include('frontend.partials.header')

    {{-- @include('frontend.partials.slide') --}}

    @yield('content')

    @include('frontend.partials.footer')



    <script src={{ asset('js/jquery-3.3.1.min.js') }}></script>

    <script src={{ asset('bootstrap/js/bootstrap.min.js') }}></script>

    <script src={{ asset('frontend/js/menu.js') }}></script>

    <script>
        $('#addd-pop').modal('show');
    </script>

    {{-- <a href="tel:{{ $setting->phone }} ">

        <div class="hotline">

            <div id="phonering-alo-phoneIcon" class="phonering-alo-phone phonering-alo-green phonering-alo-show">

                <div class="phonering-alo-ph-circle"></div>

                <div class="phonering-alo-ph-circle-fill"></div>

                <div class="phonering-alo-ph-img-circle"></div>

            </div>

        </div>

    </a> --}}

    <a href="#" class="go-top hien" style="display: block;">

        <img src="{{ asset('frontend/images/btn_top.png') }}" alt="Back to top" title="Back to top">

    </a>

    {{-- <a href="#" class="conong" data-toggle="modal" data-target="#myModalq"><img src="{{ asset('images/mascot-outline-01.png') }}" alt=""></a> --}}



    {{-- <div id="myModalq" class="modal fade" role="dialog">

          <div class="modal-dialog">



            <!-- Modal content-->

            <div class="modal-content">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

              <div class="modal-body">

                @include('frontend.partials.form')

              </div>

            </div>



          </div>

    </div> --}}

    <script>

        $(window).scroll(function() {

            if ($(this).scrollTop() > 200) {

                $('.go-top').fadeIn(200);

                $('.go-top').addClass('hien');

            } else {

                $('.go-top').fadeOut(200);

                $('.go-top').removeClass('hien');

            }

        });

        $('.go-top').click(function(event) {

            event.preventDefault();

            $('html, body').animate({

                scrollTop: 0

            }, 300);

        });

    </script>

    {{-- slick --}}

    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>

    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
    




    <script type="text/javascript">

        $('.cccc').slick({

            dots: false,

            arrows: true,

            infinite: true,

            speed: 300,

            slidesToShow: 7,

            slidesToScroll: 1,

            speed: 500,

            // fade: true,

            autoplay: true,

            responsive: [

                {

                  breakpoint: 1024,

                  settings: {

                    slidesToShow: 3,

                    slidesToScroll: 1,

                    infinite: true,

                    // dots: true

                    }

                },

                {

                  breakpoint: 600,

                  settings: {

                    slidesToShow: 3,

                    slidesToScroll: 1

                    }

                },

                {

                  breakpoint: 480,

                  settings: {

                    slidesToShow: 3,

                    slidesToScroll: 1

                    }

                }

            ]

        });

    </script>

    {{-- endslick --}}

    

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>

    <script src="http://agroexport.vn/frontend/js/jquery.counterup.min.js"></script>

    <script>

    jQuery(document).ready(function( $ ) {

        $('.counter-value').counterUp({

            delay: 1,

            time: 100

        });

    });

  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    <script type="text/javascript" src="{{ asset('box/imagesloaded.js') }}"></script>
    <script type="text/javascript" src="{{ asset('box/masonry.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('box/jquery.prettyPhoto.js') }}"></script>
    @yield('script')

<!-- End Subiz -->
<div class="register">
    <img src="{{ asset('images/1q.png') }}" alt="register">
</div>
<div class="col-xs-8 no-padding content-wrapper reg-content page-home">
    <form name="register" id="form_register" method="post" action="{{ route('post_contact') }}">
        @csrf

        <ul class="reg-inner">
            <li><input type="text" class="form-control" name="name" placeholder="Họ tên học sinh*" required=""></li>
            <li><input type="number" class="form-control" name="phone" placeholder="Số điện thoại*" required=""></li>
            <li><input type="number" class="form-control" name="namsinh" placeholder="Năm sinh*" required=""></li>
            <li><input type="text" class="form-control" name="totnghiep" placeholder="Tốt nghiệp trường*" required=""></li>
            <li><input type="text" class="form-control" name="address" placeholder="Địa chỉ*" required=""></li>
            <li><input type="text" class="form-control" name="phuhuynh" placeholder="Họ tên phụ huynh*" required=""></li>
            <li><input type="number" class="form-control" name="phone2" placeholder="Số điện thoại*" required=""></li>
            <li><input type="email" class="form-control" name="email" placeholder="Email" ></li>
            <li class="moithem">
                <label class="radio-inline">
                <input type="radio" name="lop" checked value="Lớp học cơ bản">Lớp học cơ bản</label>
                <label class="radio-inline">
                <input type="radio" name="lop" value="Lớp học nâng cao">Lớp học nâng cao</label>
            </li>
        </ul>
        <div style="clear: both"></div>
        <button type="submit" class="btn btn-default reg-button">Đăng ký</button>
        <button class="btn btn-default cancel-button" onclick="return false">Thoát</button>

    </form>

    <br>
</div>
{{-- <source src="http://apaxenglish.com/public/js/main.js" type=""> --}}
        <script type="text/javascript">
                $(document).on('click','.register-button',function () {
                    $('.reg-content').show();
                    $('#navbar').collapse('hide');
                });
                $(document).on('click','.dropdown-sub-menu > a',function (e) {
                    $(this).next().toggle();
                    e.stopPropagation();
                    e.preventDefault();
                });
                function putForm() {
                    $('#form_register').hide();
                    $('#send_email').show();
                    document.form_register.submit();
                }
                $('.register').on('click',function(){
                    $('.icon_form_re').fadeIn();
                $('.reg-content').fadeIn();
                
                    });
                        $(document).on('click', '#myModal1 .close', function () {
                    $('#video_intro1').html('');
                });
                        $(document).on('click', '#myModal1 .close', function () {
                    $('#video_intro1').html('');
                });
                        $('.cancel-button').on('click',function(){
                        $('.reg-content').fadeOut();
                        $('.icon_form_re').fadeOut();
                    });
            </script>
            <script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
            <script type="text/javascript">
        new WOW().init();
    </script>


    <!-- Add fancybox3 -->
        <script src={{ asset('box/jquery.fancybox.min.js') }}></script>

        <script type="text/javascript">
            $('[data-fancybox="images"]').fancybox({
          caption : function( instance, item ) {
              return $(this).find('figcaption').html();
          }
        });
</script>
<style type="text/css">
        .sticky {
          position: fixed;
          top: 0px;
          width: 100%;

          z-index: 999999;
        }

        .sticky + .content {
          padding-top: 102px;
        }
    </style>
    <script>
        window.onscroll = function() {myFunction()};

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
          if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
          } else {
            header.classList.remove("sticky");
          }
        }
    </script>
    <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v4.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="264713920375004"
  logged_in_greeting="Chào anh chị, Chúng tôi có thể giúp gì cho anh/chị ?"
  logged_out_greeting="Chào anh chị, Chúng tôi có thể giúp gì cho anh/chị ?">
      </div>

</body>

</html>

