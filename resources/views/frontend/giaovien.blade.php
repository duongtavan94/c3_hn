@extends('frontend.partials.master')



    @section('title', 'Đội ngũ giáo viên')



    @section('content')



 <div class="anhbanner">

        <img src="{{ asset($setting->anh5) }}" alt="">

    </div>



    <div class="container">



      <div class="tieude">



            <h2 class="tdh2">Đội ngũ giáo viên</h2>



            <img src="{{ asset('images/giua.png') }}" alt="">



        </div>



        <div class="mtcn giaovien">

            <div class="row">

                @foreach ($giaovien as $key => $v)

                    <div class="col-xs-6 col-sm-6 col-md-3" @if ($key%4 == 0)

                        style="clear: both;" 

                    @endif>

                            <div class="itemgiaovien">

                                <a data-fancybox="images" href="{{ $v->image2 }}">

                                    <div class="boxanhgv">

                                        <img src="{{ asset($v->image) }}" alt="">

                                        <figcaption style="display: none;">

                                            <h3 class="tengv">{{ $v->name }}</h1>

                                            <p class="mtgv">{!! $v->description !!}</p>

                                        </figcaption>

                                    </div>

                                        <p class="tenngoai">{{ $v->name }}</p>

                                </a>

                                

                            </div>

                    </div>

                @endforeach

            </div>

            <div class="phantrang">

                {{$giaovien->links()}}

            </div>

        </div>



    



        </div>



    </div>



    @endsection