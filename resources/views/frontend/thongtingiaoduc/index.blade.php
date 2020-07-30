@extends('frontend.partials.master')

@section('title', trans('home.thongtingiaoduc'))

{{-- @section('title_seo', $setting->title_seo)

@section('meta_key', $setting->meta_key)

@section('meta_des', $setting->meta_des) --}}

@section('content')

<div class="bannergd">

    <div class="anhbanner">
      <img src="{{ asset($setting->anh6) }}" alt="">
    </div>
    

</div>
<div class="tieude">
        <h2 class="tdh2">{{ trans('home.thongtingiaoduc') }}</h2>
        <img src="{{ asset('images/giua.png') }}" alt="">
    </div>

<div class="contengd">

    <div class="container">

        <div class="row">

            <div class="pc">@foreach ($list as $key => $c)
              
                  @if ($key == 0)
              
                      <div class="col-md-6 lomc" style="padding-left: 15px">
              
                          <div class="gdto">
              
                              <a href="{{ route('showgiaoduc', $c->slug) }}"><img src="{{ asset($c->image) }}" alt=""></a>
              
                              <div class="mtgd1">
              
                                      
              
                                          <a href="{{ route('showgiaoduc', $c->slug) }}"><h3>{{ $c->$get_name }}</h3></a>
              
                                  
              
                              </div>
              
                              <div class="mtgd2">
              
                                  <a href="{{ route('showgiaoduc', $c->slug) }}"><h3>{{ $c->$get_name }}</h3></a>
              
                                  <p style="clear: both;"><span class="date">
                                    <i class="far fa-clock"></i>
                                     {{date_format (new DateTime($c->ngay), 'd-m-Y')}}

                                   </span></p>

              
                                  <p>{!! $c->$get_title !!}</p>
              
                              </div>
              
                          </div>
              
                          {{-- <div class="view view-first">
              
                               <img src="{{ asset($c->image) }}" />
              
                               <div class="km">
              
                                   <div class="mask">
              
                                       <h2>Title</h2>
              
                                       <p>Your Text</p>
              
                                           <a href="#" class="info">Read More</a>
              
                                   </div>
              
                                   <div class="ml">ccccccc</div>
              
                               </div>
              
                          </div> --}}
              
                      </div>
              
                  @elseif ($key == 1)
              
                      <div class="col-md-3 poc">
              
                          <div class="gdto2">
              
                              <a href="{{ route('showgiaoduc', $c->slug) }}"><img src="{{ asset($c->image) }}" alt=""></a>
              
                              <div class="mtgd12">
              
                                      
              
                                          <a href="{{ route('showgiaoduc', $c->slug) }}"><h3>{{ $c->$get_name }}</h3></a>
              
                                          <p style="clear: both;"><span class="date"><i class="far fa-clock"></i> {{date_format (new DateTime($c->ngay), 'd-m-Y')}}</span></p>
              
                                  
              
                              </div>
              
                              <div class="mtgd22">
              
                                  <a href="{{ route('showgiaoduc', $c->slug) }}"><h3>{{ $c->$get_name }}</h3></a>
              
                                  <p style="clear: both;"><span class="date"><i class="far fa-clock"></i> {{date_format (new DateTime($c->ngay), 'd-m-Y')}}</span></p>
              
                                  <p>{!! str_limit($c->$get_title, 250, '...') !!}</p>
              
                              </div>
              
                          </div>
              
                      </div>
              
                  @elseif ($key == 2)
              
                      <div class="col-md-3 poc" style="padding-right: 15px">
              
                          <div class="gdto2 mkc">
              
                              
              
                              <div class="mtgd12 mcla">
              
                                      
              
                                          <a href="{{ route('showgiaoduc', $c->slug) }}"><h3>{{ $c->$get_name }}</h3></a>
              
                                          <p style="clear: both;"><span class="date"><i class="far fa-clock"></i> {{date_format (new DateTime($c->ngay), 'd-m-Y')}}</span></p>
              
                                  
              
                              </div>
              
                              <div class="mtgd22 plco">
              
                                  <a href="{{ route('showgiaoduc', $c->slug) }}"><h3>{{ $c->$get_name }}</h3></a>
              
                                  <p style="clear: both;"><span class="date"><i class="far fa-clock"></i> {{date_format (new DateTime($c->ngay), 'd-m-Y')}}</span></p>
              
                                  <p>{!! str_limit($c->$get_title, 250, '...') !!}</p>
              
                              </div>
              
                              <a href="{{ route('showgiaoduc', $c->slug) }}"><img src="{{ asset($c->image) }}" alt=""></a>
              
                          </div>
              
                      </div>
              
                  @else
              
                      <div class="col-md-3">
              
                          <div class="itemchinh">
              
                              <div class="anh">
              
                                  <a href="{{ route('showgiaoduc', $c->slug) }}"><img src="{{ asset($c->image) }}" alt="{{ $c->$get_name }}" class="img-hover" title="{{ $c->$get_name }}"></a>
              
                              </div>
              
                              <a href="{{ route('showgiaoduc', $c->slug) }}"><h4>{{ $c->$get_name }}</h4></a>
              
                              <p>{!! str_limit($c->$get_title, 100, '...') !!}</p>
              
                              <a href="{{ route('showgiaoduc', $c->slug) }}" class="xemtheml">{{ trans('home.xemthem') }}</a>
              
                               <span class="kcilo"><i class="far fa-clock svl"></i> {{date_format (new DateTime($c->ngay), 'd-m-Y')}}</span>
              
                          </div>
              
                      </div>
              
                  @endif
              
              
              
              @endforeach</div>
            <div class="mobile" style="display: none;">
              @foreach($list as $c)
              <div class="col-xs-12">

                        <div class="itemchinh">

                            <div class="anh">

                                <a href="{{ route('showgiaoduc', $c->slug) }}"><img src="{{ asset($c->image) }}" alt="{{ $c->$get_name }}" class="img-hover" title="{{ $c->$get_name }}"></a>

                            </div>

                            <a href="{{ route('showgiaoduc', $c->slug) }}"><h4>{{ $c->$get_name }}</h4></a>

                            <p>{!! str_limit($c->$get_title, 100, '...') !!}</p>

                            <a href="{{ route('showgiaoduc', $c->slug) }}" class="xemtheml">{{ trans('home.xemthem') }}</a>

                             <span class="kcilo"><i class="far fa-clock svl"></i> {{date_format (new DateTime($c->ngay), 'd-m-Y')}}</span>

                        </div>

                    </div>
              @endforeach
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