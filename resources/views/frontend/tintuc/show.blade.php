@extends('frontend.partials.master')

@section('title', trans('home.tintuc'))

{{-- @section('title_seo', $setting->title_seo)

@section('meta_key', $setting->meta_key)

@section('meta_des', $setting->meta_des) --}}

@section('content')

<div class="anhbanner">
        <img src="{{ asset($setting->anh6) }}" alt="">
    </div>

<div class="lmiach">

    <div class="container">

        <div class="row">
            <div class="col-md-9">
                <div class="tieudecac">
                
                    <h4 class="tdh2">{{ $detail->$get_name }}</h4>
                
                    <p><span><i class="far fa-clock"></i> {{ $detail->ngay }}/{{ $detail->thang }}/2019</span></p>
                
                </div>
                
                <div class="ctlmsak">
                
                    {!! $detail->$get_des !!}
                
                </div>
            </div>
            <div class="col-md-3">
                @php
                    $tinmoi = DB::table('banners')->where('status', 1)->orderBy('id', 'DESC')->take(5)->get();
                @endphp
                <div class="sidebarmoi">
                    @foreach ($tinmoi as $t)
                        <div class="itemsbm">
                            <a href="{{ route('showtintuc', $t->slug) }}"><div class="anh">
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

</div>

@endsection

@section('script')



@endsection