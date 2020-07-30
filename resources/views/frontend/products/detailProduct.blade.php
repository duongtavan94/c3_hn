@extends('frontend.partials.master')

@if($detail_product)

    @section('title', $detail_product->$get_name )

    @section('title_seo', $detail_product->title_seo)

    @section('meta_key', $detail_product->meta_key)

    @section('meta_des', $detail_product->meta_des)

    @section('content')
<div class="anhbanner">
        <img src="{{ asset($setting->anh2) }}" alt="">
    </div>
        <div class="contact-page">

            <div class="container">

                <div class="contact-head">

                    <h1>

                        <span>{{ $cate_product->$get_name }}</span>

                    </h1>

                </div>

            </div>

        </div>

        

        <div class="detail_category">

            <div class="container">

                <div class="row">

                    

                    <div class="col-lg-8 col-xl-8">

                        <div class="contact-head">

                            <h2>

                                {{ $detail_product->$get_name }}

                            </h2>

                        </div>

                        <div class="ctnangluct">

                            {!! $detail_product->$get_des !!}

                        </div>
                        <div class="fbcc">
                            <div id="fb-root"></div>
                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3"></script>
                            <div class="fb-comments" data-href="{{ route('detail_product', $detail_product->slug_vi) }}" data-width="100%" data-numposts="5"></div>
                        </div>

                    </div>

                    @include('frontend.partials.sidebar')

                </div>

            </div>

        </div>

    @endsection

@endif