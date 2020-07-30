@extends('frontend.partials.master')

@section('title', trans('home.nangluckinhnghiem'))

@section('content')

<div class="anhbanner">
        <img src="{{ asset($setting->anh2) }}" alt="">
    </div>

    <div class="contact-page">

        <div class="container">

            
            <div class="tieude">
                <h2 class="tdh2">{{ trans('home.nangluckinhnghiem') }}</h2>
                <img src="{{ asset('images/giua.png') }}" alt="">
            </div>

        </div>

    </div>



    <div class="detail_category">

        <div class="container">

            <div class="row">

                

                <div class="col-lg-8 col-xl-8">

                    <div class="cate_list">

                        <ul>

                            @foreach ($product as $p)

                            <li>

                                <div class="row">

                                    <div class="col-md-4 col-lg-4 col-xl-4">

                                        <div class="cate_thumb">

                                            <a href="{{ route('detail_product', $p->slug_vi) }}">

                                                <img src="{{ asset($p->image) }}" alt="{{ $p->$get_name }}" class="img-fluid">

                                            </a>

                                        </div>

                                    </div>

                                    <div class="col-md-8 col-lg-8 col-xl-8">

                                        <div class="cate_title">

                                            <h4>

                                                <a href="{{ route('detail_product', $p->slug_vi) }}">{{ $p->$get_name }}</a>

                                            </h4>

                                            <p>{{ str_limit($p->$get_title, 100) }}</p>

                                        </div>

                                    </div>

                                </div>

                            </li>

                            @endforeach

                            {{ $product->links() }}

                            

                        </ul>

                    </div>

                </div>

                @include('frontend.partials.sidebar')

            </div>

        </div>

    </div>

@endsection

