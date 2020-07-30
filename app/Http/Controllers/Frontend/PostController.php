<?php



namespace App\Http\Controllers\Frontend;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Post;

use App\Models\Cate_post;
use App\Models\Banner;

use Illuminate\Support\Collection;



class PostController extends Controller

{

    public function listPost()

    {

        $cate_post = Post::where('status', 1)->orderBy('position', 'ASC')->get();

        



        return view('frontend.posts.list', compact('cate_post'));

    }



    public function detail()

    {




        $detail = Post::where('status', 1)->orderBy('position', 'ASC')->get();



        return view('frontend.posts.detail', compact('detail', 'cate_post'));

    }



    public function postSearch(Request $req)

    {

        $input  = $req->search;

        $search = Banner::where('name_vi', 'LIKE',"%$input%")->where('status', 1)->paginate(6);



        return view('frontend.search', compact('search', 'input'));

    }

}

