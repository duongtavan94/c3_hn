@extends('frontend.partials.master')

    @section('title', trans('home.chinhanhtoancau'))

    @section('content')

 <div class="anhbanner">
        <img src="{{ asset($setting->anh5) }}" alt="">
    </div>

    <div class="container">

      <div class="tieude">

            <h2 class="tdh2">{{ $intro->$get_name }}</h2>

            <img src="{{ asset('images/giua.png') }}" alt="">

        </div>

        <div class="mtcn">
            {!! $intro->$get_des !!}
        </div>

    

        </div>

    </div>

    @endsection