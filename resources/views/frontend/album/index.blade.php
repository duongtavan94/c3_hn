@extends('frontend.partials.master')

@section('title', 'Thư viện ảnh')

@section('content')
<div class="anhbanner">

        <img src="{{ asset($setting->anh5) }}" alt="">

    </div>

<main id="main" class="main clearfix">

    <div class="content-page">

        <div class="container">

            <div class="content-in clearfix">

                <ul class="breadcrumb">

                    <li><a href="/" title="Trang chủ" >Trang chủ</a></li>

                    <li><a  title="Thư viện ảnh" >Thư viện ảnh</a></li>

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

                        <style type="text/css">.right-header-top {display: none;}</style>

                        <div class="list-album">

                            <div class="row albums">

                                @foreach ($allAlbum as $key => $a)

                                    <div class="col-md-4" @if ($key%3 == 0)

                                        style="clear: both;" 

                                    @endif>


                                            
                                            <div class="itemvideo">

                                            <div class="boxanh">

                                                <a href="{{ route('detailAlbum', $a->slug) }}">

                                                    <img src="{{ asset($a->image) }}" alt="">

                                                </a>

                                            </div>

                                            <a href="{{ route('detailAlbum', $a->slug) }}"><p>{{ $a->name }}</p></a>

                                        </div>


                                    </div>

                                @endforeach





                            </div>

                            <div class="wpager">

                            </div>

                        </div>

                </div>

            </div>

        </div>

    </div>

</main>

@endsection

@section('script')



@stop