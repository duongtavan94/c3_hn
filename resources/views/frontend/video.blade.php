@extends('frontend.partials.master')



    @section('title', 'Video')



    @section('content')

<style type="text/css">
    @media (min-width: 769px){
        .fancybox-slide {
            /* left: 0; */
            /* right: auto; */
             width: 100%; 
        }
    }
</style>

 <div class="anhbanner">

        <img src="{{ asset($setting->anh5) }}" alt="">

    </div>



    <div class="container">



      <div class="tieude">



            <h2 class="tdh2">Video</h2>



            <img src="{{ asset('images/giua.png') }}" alt="">



        </div>



        <div class="mtcn video" style="padding-bottom: 50px">

            <div class="row">

                @foreach ($video as $key => $v)

                    <div class="col-md-4" @if ($key%3 == 0)

                        style="clear: both;" 

                    @endif>

                            {{-- <div class="itemvideo">

                                <div class="boxanh">

                                    <a data-fancybox href="{{ $v->link }}">

                                        <img src="{{ asset($v->image) }}" alt="">

                                    </a>

                                </div>

                                <a data-fancybox href="{{ $v->link }}"><p>{{ $v->name }}</p></a>

                            </div> --}}
                            <div class="videoxm" style="padding-bottom: 20px">
                                <iframe width="100%" height="250px" src="{{ $v->link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>

                    </div>

                @endforeach

            </div>

            <div class="phantrang">

                {{$video->links()}}

            </div>

        </div>



    



        </div>



    </div>



    @endsection