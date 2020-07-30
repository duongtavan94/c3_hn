<div id="slide">
    <?php

                $slide = DB::table('slides')->where('status', 1)->where('dislay', 1)->orderBy('position', 'ASC')->get();

            ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2800">
        <ol class="carousel-indicators">
            @foreach($slide as $key => $c)
                <li data-target="#myCarousel" data-slide-to="{{$key}}" class="@if($key==0) active @endif"></li>
            @endforeach

          </ol>

        <div class="carousel-inner" role="listbox" id="slide1">

            

            @foreach($slide as $key => $c)
                <div class="item @if ($key == 0)

                    active

                @endif">

                    <a href="{{ $c->link }}">
                        <img src="{{ asset($c->image) }}" alt="imgSlide" title="" id="wows1_0"

                        class="img-responsive img100 " style="width:100%;" />

                    </a>
                </div>

            @endforeach

        </div>

    </div>
    <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>

</div>