@extends('frontend.partials.master')

@section('title', trans('home.chuongtrinhhoc'))

@section('content')

    @include('frontend.partials.slide')



    <div class="detail_category2">

        <div class="container">

            <div class="tieude1 chuongtrinhhoc">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-md-3">

                            <img src="{{ asset('images/trai.png') }}" alt="">

                        </div>

                        <div class="col-md-6">

                            <h2 class="tdh2">{{ trans('home.lydochon') }}</h2>

                        </div>

                        <div class="col-md-3">

                            <img src="{{ asset('images/phai.png') }}" alt="">

                        </div>

                    </div>

                </div>

            </div>

            <div class="row">

                

                <div class="col-lg-12 col-xl-12">

                    <div class="cate_list2">

                        <ul>

                            @foreach ($top as $key => $p)

                                @if ($key%2 == 0)

                                    <li id="lydom{{$key}}">

                                        <div class="row">

                                            <div class="col-md-6 col-lg-6 col-xl-6">

                                                <div class="cate_title2">

                                                    <h4>

                                                        <a href="#"><img src="{{ asset('images/icon.png') }}" alt="">{{ $p->$get_name }}</a>

                                                    </h4>

                                                    <p>{!! $p->$get_des !!}</p>

                                                </div>

                                            </div>

                                            <div class="col-md-6 col-lg-6 col-xl-6">

                                                <div class="cate_thumb2 anh">

                                                    <a href="">

                                                        <img src="{{ asset($p->image2) }}" alt="" class="img-hover">

                                                    </a>

                                                </div>

                                            </div>

                                        </div>

                                    </li>

                                @else

                                    <li id="lydom{{$key}}">

                                        <div class="row">

                                            <div class="col-md-6 col-lg-6 col-xl-6">

                                                <div class="cate_thumb2 anh">

                                                    <a href="">

                                                        <img src="{{ asset($p->image2) }}" alt="" class="img-hover">

                                                    </a>

                                                </div>

                                            </div>

                                            <div class="col-md-6 col-lg-6 col-xl-6">

                                                <div class="cate_title2">

                                                    <h4>

                                                        <a href="#"><img src="{{ asset('images/icon.png') }}" alt="">{{ $p->$get_name }}</a>

                                                    </h4>

                                                    <p>{!! $p->$get_des !!}</p>

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

