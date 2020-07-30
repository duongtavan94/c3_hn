@extends('frontend.partials.master')

    @section('title', trans('home.gioithieu'))

    @section('content')

    
    <div class="anhbanner">
    	<img src="{{ asset($setting->anh1) }}" alt="">
    </div>

    <div class="container">

	  <div class="tieude">

	        <h2 class="tdh2">{{ trans('home.gioithieu') }}</h2>

	        <img src="{{ asset('images/giua.png') }}" alt="">

	    </div>

	    <div class="gtlm">

	    	{!! $intro->$get_title !!}

	    </div>



	    <div class="tdtab">

	    	<ul class="nav nav-tabs">

	    		<li class="active"><a data-toggle="tab" href="#home"><img src="{{ asset('images/icon.png') }}" height="16px" width="14px" alt=""> Về nhà trường</a></li>

	    		{{-- <li><a data-toggle="tab" href="#menu1"><img src="{{ asset('images/icon.png') }}" height="16px" width="14px" alt=""> {{ trans('home.chungnhan') }}</a></li> --}}
	    		<li><a data-toggle="tab" href="#menu3"><img src="{{ asset('images/icon.png') }}" height="16px" width="14px" alt=""> Mục tiêu</a></li>

	    		<li><a data-toggle="tab" href="#menu2"><img src="{{ asset('images/icon.png') }}" height="16px" width="14px" alt=""> Lịch sử phát triển</a></li>

	    		

	    	</ul>

	    </div>



	    <div class="ndtabgt">

	    	<div class="tab-content">

	    		<div id="home" class="tab-pane fade in active">

	    			{!! $intro->$get_des !!}

	    		</div>

	    		{{-- <div id="menu1" class="tab-pane fade">

	    			{!! $intro->$get_des2 !!}

	    		</div> --}}
	    		<div id="menu3" class="tab-pane fade">

	    			{!! $intro->$get_des4 !!}

	    		</div>

	    		<div id="menu2" class="tab-pane fade">

	    			{!! $intro->$get_des3 !!}

	    		</div>

	    		

	    	</div>

	    </div>

	</div>

    @endsection