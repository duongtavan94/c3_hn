@extends('frontend.partials.master')

@section('title', trans('home.tintuc'))

{{-- @section('title_seo', $setting->title_seo)

@section('meta_key', $setting->meta_key)

@section('meta_des', $setting->meta_des) --}}

@section('content')

<div class="anhbanner">
        <img src="{{ asset($setting->anh5) }}" alt="">
    </div>

<div class="contengdcs">

    <div class="container">

        <div class="tieude">

            <h2 class="tdh2">{{ trans('home.tintuc') }}</h2>
            <img src="{{ asset('images/giua.png') }}" alt="">

        </div>
        

        <div class="row">

            @foreach ($list as $key => $c)



                    <div ng-repeat="listing in listings | orderBy:sort.value | filter:filterListing" ng-show=" $index<12" class="listing-single ng-scope">

                    <div class="col-md-4 col-sm-6 equal" style="">

                        <div class="row">

                            <div class="col-xs-12 favorite">

                                <div class="kmcian">

                                    <figure class="effect-chico"><a href="{{ route('showtintuc', $c->slug) }}"><img ng-src="{{ asset($c->image) }}" alt=" " src="{{ asset($c->image) }}"></a>

                                    

                                        <div class="center">

                                            <a class="btn btn-primary btn-outline text-uppercase" href="{{ route('showtintuc', $c->slug) }}" title="Find out more">{{ trans('home.docthem') }}</a>

                                        </div>

                                    

                                    </figure>

                                    <div class="tgkm">

                                    <p class="d1">{{$c->ngay}}</p>

                                    <p class="d2">{{$c->thang}}</p>

                                    <!-- <p class="d3">{{$c->created_at->format('h:i A')}}</p> -->

                                </div>

                                </div>

                                <div class="mncak">

                                    <a href="{{ route('showtintuc', $c->slug) }}"><h4>{{ $c->$get_name }}</h4></a>

                                    <p>{!! str_limit($c->$get_title, 100, '...') !!}</p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

            <div class="phantrang">

                {{$list->links()}}

            </div>

        </div>

    </div>

</div>

@endsection

@section('script')

<script type="text/javascript">

    $(".gdto").hover(

  function () {

    $(this).addClass('hoverroi');

  }, 

  function () {

    $(this).removeClass('hoverroi');

  }

  );

</script>

<script type="text/javascript">

    $(".gdto2").hover(

  function () {

    $(this).addClass('hoverroi');

  }, 

  function () {

    $(this).removeClass('hoverroi');

  }

  );

</script>

@endsection