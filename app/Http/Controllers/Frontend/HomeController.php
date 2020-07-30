<?php



namespace App\Http\Controllers\Frontend;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Cate_Slide;

use App\Models\Slide;

use App\Models\Cate_post;

use App\Models\Cate_product;
use App\Models\Bill;

use App\Models\Product;

use App\Models\Intro;
use App\Models\Post;
use App\Models\Vin;
use App\Models\Invest;

use App\Models\Banner;

use Session;

use Carbon\Carbon;



class HomeController extends Controller

{

    public function index()

    {

        $product = Product::where('status', 1)->orderBy('position', 'ASC')->get();

        $top     = Slide::where('status', 1)->where('dislay', 2)->get();
        $conso     = Slide::where('status', 1)->where('dislay', 3)->get();
        $hang     = Slide::where('status', 1)->where('dislay', 4)->orderBy('position', 'ASC')->get();
        $baihay     = Slide::where('status', 1)->where('dislay', 5)->first();

        $cate_post = Post::where('status', 1)->orderBy('position', 'ASC')->get();

        $giaoduc = Intro::where('status', 1)->where('cc', 1)->orderBy('position', 'ASC')->take(3)->get();

        $tintuc = Product::where('status', 1)->where('is_home', 1)->orderBy('position', 'ASC')->take(6)->get();

        return view('frontend.index', compact('product', 'top', 'cate_post', 'tintuc', 'giaoduc', 'conso', 'hang', 'baihay'));

    }



    public function changeLanguage($locale)

    {

        Session::put('locale',$locale);

        return redirect()->back();

    }



    public function thongtingiaoduc()

    {

        $list = Intro::where('status', 1)->orderBy('position', 'ASC')->get();



        return view('frontend.thongtingiaoduc.index', compact('list'));

    }



    public function tintuc()

    {

        $list = Banner::where('status', 1)->orderBy('position', 'ASC')->paginate(6);





        return view('frontend.tintuc.index', compact('list'));

    }

    public function showtintuc($slug)

    {

        $detail = Banner::where('slug', $slug)->first();





        return view('frontend.tintuc.show', compact('detail'));

    }



    public function showgiaoduc($slug)

    {

        $detail = Intro::where('slug', $slug)->first();





        return view('frontend.thongtingiaoduc.show', compact('detail'));

    }



    public function lydochon()

    {

        $top     = Slide::where('status', 1)->where('dislay', 2)->get();



        return view('frontend.lydochon', compact('top'));

    }

    public function chinhanh()

    {

        $intro = Bill::where('id', 2)->first();

        return view('frontend.chinhanh', compact('intro'));

    }

    public function video()

    {

        $video = Vin::orderBy('position', 'ASC')->paginate(15);

        return view('frontend.video', compact('video'));

    }
    public function giaovien()

    {

        $giaovien = Invest::orderBy('position', 'ASC')->paginate(16);

        return view('frontend.giaovien', compact('giaovien'));

    }

}

