@extends('frontend.partials.master')

@section('title', trans('home.thongtingiaoduc'))

{{-- @section('title_seo', $setting->title_seo)

@section('meta_key', $setting->meta_key)

@section('meta_des', $setting->meta_des) --}}

@section('content')

<div class="anhbanner">
        <img src="{{ asset($setting->anh6) }}" alt="">
    </div>

<div class="lmiach">

    <div class="container">

            
       <div class="col-xs-12 col-sm-9">
        <div class="tieudecac">

                <h4 class="tdh2">{{ $detail->$get_name }}</h4>

                <p><span><i class="far fa-clock"></i> {{ $detail->ngay }}/{{ $detail->ngay }}/2019</span></p>

            </div>

            <div class="ctlmsak">

                {!! $detail->$get_des !!}

            </div>
            <div class="fbcc">
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3"></script>
                <div class="fb-comments" data-href="{{ route('showgiaoduc', $detail->slug) }}" data-width="100%" data-numposts="5"></div>
            </div>
       </div>
        @php
                    $tinmoi = DB::table('intros')->where('status', 1)->orderBy('id', 'DESC')->take(5)->get();
                @endphp
                <div class="col-md-3">

                    <div class="sidebarmoi">
                        <h3 style="text-align: center;">TIN MỚI</h3>
                        @foreach ($tinmoi as $t)
                            <div class="itemsbm">
                                <a href="{{ route('showgiaoduc', $t->slug) }}"><div class="anh">
                                        <img src="{{ asset($t->image) }}" alt="" class="img-hover">
                                    </div>
                                    <h4>{{ $t->$get_name }}</h4></a>
                                <div class="ngaythang"><i class="fas fa-clock"></i> {{$t->ngay}}/{{$t->thang}}/2019</div>
                                <p>{!! $t->$get_title !!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

    </div>

</div>

@endsection

@section('script')



@endsection