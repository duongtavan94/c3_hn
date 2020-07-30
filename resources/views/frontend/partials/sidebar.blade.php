<div class="col-lg-4 col-xl-4">
    <div class="cate_right">
        <ul>
            @foreach ($cate_nangluc as $c)
                <li>
                    <a href="{{ route('productByCate', $c->slug_vi) }}">{{ $c->$get_name }}</a>
                </li>
            @endforeach
            
        </ul>
                         
        {{--                         <a class="qc d-none d-lg-block" href="https://www.scotsenglish.vn/tin-tuc/co-hoi-hoc-tieng-anh-chuan-quoc-te-cung-scots-uu-dai-len-den-15-trieu">
                                    <img src="https://www.scotsenglish.vn/uploadfile/source/Banner/GDN%20KINDY%20300X600.png" alt="br scots english" class="img-fluid">
                                </a> --}}
    </div>
</div>