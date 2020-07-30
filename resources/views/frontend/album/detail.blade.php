@extends('frontend.partials.master')

@section('title', $detail->name)

@section('content')
<style type="text/css">
    @media (min-width: 769px){
        .fancybox-slide {
            /* left: 0; */
            /* right: auto; */
             width: 100%; 
        }
    }
</style>
<div class="anhbanner">

        <img src="{{ asset($setting->anh5) }}" alt="">

    </div>

<main id="main" class="main clearfix">

    <div class="content-page">

        <div class="container">

            <div class="content-in clearfix">

                <ul class="breadcrumb">

                    <li><a href="/" title="Trang chủ" >Trang chủ</a></li>

                    <li><a  title="Thư viện ảnh" >{{ $detail->name }}</a></li>

                </ul>

                <style>

                    .breadcrumb li a{

                        text-transform: lowercase;

                        display: inherit;

                        /*visibility:hidden;*/

                    }

                    .breadcrumb li a::first-letter{

                        text-transform: capitalize;

                        visibility:visible;

                    }

                </style>

            <div class="page-in clearfix">

                <div class="col-left">



                    <div class="col-right">

                    <style type="text/css">.right-header-top {display: none;}</style><div class="album-title">

                        <h2>Du thuyền 6 sao Hera Cruises</h2>

                    </div>

                    <div id="image-box">

                        <div class="row image-list">

                            @foreach ($img as $i)

                                <div class="col-xs-3 imageitem">

                                    <a href="{{ asset($i->name) }}" data-fancybox="gallery" class="thumbnail imageitem-a">

                                        <img src="{{ asset($i->name) }}" alt="hera31-1497089380.jpg"/>

                                    </a>

                                </div>

                            @endforeach

                        </div>

                    </div>





                </div>

            </div>

        </div>

    </div>

</div>

</main>

@endsection

@section('script')

<script>

        $('#image-box .image-list').imagesLoaded(function() {

            $('#image-box .image-list').masonry({

                itemSelector: '.imageitem',

                isAnimated: true

            });

        });

  

</script>

@endsection