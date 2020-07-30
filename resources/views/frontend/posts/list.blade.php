@extends('frontend.partials.master')

@section('title', trans('home.chuongtrinhhoc'))

@section('content')

<div class="anhbanner">
        <img src="{{ asset($setting->anh3) }}" alt="">
    </div>



    <div class="detail_category2">

        <div class="container">

            <div class="tieude1 chuongtrinhhoc">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-md-4">

                            <img src="{{ asset('images/trai.png') }}" alt="">

                        </div>

                        <div class="col-md-4">

                            <h2 class="tdh2">Boston english</h2>

                        </div>

                        <div class="col-md-4">

                            <img src="{{ asset('images/phai.png') }}" alt="">

                        </div>

                    </div>

                </div>

            </div>

            <div class="row">

                

                <div class="col-lg-12 col-xl-12">

                    <div class="cate_list2">

                        <ul>

                            @foreach ($cate_post as $key => $p)

                                @if ($key%2 == 0)

                                    <li>

                                        <div class="row">

                                            <div class="col-md-6 col-lg-6 col-xl-6">

                                                <div class="cate_title2">

                                                    <h4>

                                                        <a href="{{ route('detail') }}">

                                                            <img src="{{ asset('images/icon.png') }}" alt="">{{ $p->$get_name }}</a>

                                                    </h4>

                                                    <p>{!! $p->$get_title !!}</p>

                                                </div>

                                            </div>

                                            <div class="col-md-6 col-lg-6 col-xl-6">

                                                <div class="cate_thumb2 anh">

                                                    <a href="{{ route('detail') }}">

                                                        <img src="{{ asset($p->image2) }}" alt="{{ $p->$get_name }}" class="img-hover">

                                                    </a>

                                                </div>

                                            </div>

                                        </div>

                                    </li>

                                @else

                                    <li>

                                        <div class="row">

                                            <div class="col-md-6 col-lg-6 col-xl-6">

                                                <div class="cate_thumb2 anh">

                                                    <a href="{{ route('detail') }}">

                                                        <img src="{{ asset($p->image2) }}" alt="{{ $p->$get_name }}" class="img-hover">

                                                    </a>

                                                </div>

                                            </div>

                                            <div class="col-md-6 col-lg-6 col-xl-6">

                                                <div class="cate_title2">

                                                    <h4>

                                                        <a href="{{ route('detail') }}">

                                                            <img src="{{ asset('images/icon.png') }}" alt="">{{ $p->$get_name }}</a>

                                                    </h4>

                                                    <p>{!! $p->$get_title !!}</p>

                                                </div>

                                            </div>

                                        </div>

                                    </li>

                                @endif

                            @endforeach

                            

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

