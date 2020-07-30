@extends('frontend.partials.master')

@section('title', trans('home.chuongtrinhhoc'))

@section('content')

<div class="anhbanner">
        <img src="{{ asset($setting->anh3) }}" alt="">
    </div>

    <div class="detail_category2">

        <div class="container">

            <div class="tieude">
        <h2 class="tdh2">{{ trans('home.chuongtrinhhoc') }}</h2>
        <img src="{{ asset('images/giua.png') }}" alt="">
    </div>

            <div class="row">

                <div class="col-lg-12 col-xl-12">

                    

                </div>

            </div>

        </div>

    </div>









<div class="section-main">

    

    <div class="block-apaxer">

        

        <div class="">

            <div class="block-full-width">

                <div class="container">

                    <div class="row">

                        <div class="col-md-3 apaxer-menu">

                            <div class="apaxer-menu-parent">

                                <div class="apaxer-menu-child-wrap collapse in" id="cong-dan-toan-cau" aria-expanded="true" style="">

                                    @foreach ($detail as $key => $c)

                                        <div class="apaxer-menu-child @if ($key == 0)

                                            active

                                        @endif">

                                            <a href="#" data-toggle="tab{{$key}}" tab="3-{{$key}}">

                                                {{ $c->$get_name }}

                                            </a>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        </div>



                        <div class="col-md-9 news-item">

                            @foreach ($detail as $key => $d)

                                <div class="intro col-md-12 @if ($key == 0)

                                    active

                                @endif" id="tab{{$key}}">

                                    <div class="description">

                                        <p>{!! $d->$get_des !!}</p>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



@include('frontend.partials.form')



<!--end: main body-->



@endsection

@section('script')

<script type="text/javascript">

    $(document).on('click', '.apaxer-menu-child a', function (e) {

        e.preventDefault();

        var tab_id = $(this).attr('data-toggle');

        $('.apaxer-menu-child').removeClass('active');

        $(this).parent().addClass('active');

        $('.intro').hide();

        $('#' + tab_id).show();

        var catId = '';

        if (catId == 3) {

            changTab($(this).attr('tab'));

        }

    });

    function changTab(tab) {

        var url = 'http://apaxenglish.com/';

        $('#show_banner').attr('src', url + 'public/images/banner/' + tab + '.png').show();

    }

</script>

@stop