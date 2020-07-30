<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Investor;
use App\Models\Cate_investor;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class TailieuController extends Controller
{
    public function index()
    {
        $tailieu = Investor::all();
        return view('frontend.tailieu.index', compact('tailieu'));
    }

    public function show($slug)
    {
        $cate_investor = Cate_investor::where('slug', $slug)->where('status',1)->first();
        $tailieu = Investor::where('status', 1)->where('cate_investor_id', $cate_investor->id)->orderBy('id', 'DESC')->get();
        return view('frontend.tailieu.show', compact('cate_investor', 'tailieu'));
    }

    public function detail($id)
    {
        $cc = Investor::findOrFail($id);
        $pathToFile = public_path($cc->image);

        if (Auth::check()) {
            # code...
            return response()->download($pathToFile);
        }else{
            return redirect()->route('login');
        }
    }

    public function vbpq()
    {
        $vbpq = Bill::paginate(12);

        return view('frontend.tailieu.vbpq', compact('vbpq'));
    }

    public function searchTL(Request $req)
    {
        $loai = $req->loai;
        $sohieu = $req->sohieu;
        $trichyeu = $req->trichyeu;
        // $post = Post::where('name', 'LIKE',"%$input%")->where('status', 1)->paginate(8);
        if ($loai == null && $sohieu == null && $trichyeu == null) {
            $search_pro = Bill::paginate(12);
        }
        if ($loai == null && $sohieu == null && $trichyeu != null) {
            $search_pro = Bill::where('trichyeu_vi', 'LIKE',"%$trichyeu%")->paginate(12);
        }
        if ($loai == null && $trichyeu == null && $sohieu != null) {
            $search_pro = Bill::where('sohieu', 'LIKE',"%$sohieu%")->paginate(12);
        }
        if ($loai == null && $trichyeu != null && $sohieu != null) {
            $search_pro = Bill::where('trichyeu_vi', 'LIKE',"%$trichyeu%")->where('sohieu', 'LIKE',"%$sohieu%")->paginate(12);
        }
        if ($loai != null && $trichyeu == null && $sohieu == null) {
            $search_pro = Bill::where('loai_vi', 'LIKE',"%$loai%")->paginate(12);
        }
        if ($loai != null && $trichyeu != null && $sohieu == null) {
            $search_pro = Bill::where('trichyeu_vi', 'LIKE',"%$trichyeu%")->where('loai_vi', 'LIKE',"%$loai%")->paginate(12);
        }
        if ($loai != null && $trichyeu == null && $sohieu != null) {
            $search_pro = Bill::where('sohieu', 'LIKE',"%$sohieu%")->where('loai_vi', 'LIKE',"%$loai%")->paginate(12);
        }
        if ($loai != null && $trichyeu != null && $sohieu != null) {
            $search_pro = Bill::where('trichyeu_vi', 'LIKE',"%$trichyeu%")
            ->where('sohieu', 'LIKE',"%$sohieu%")
            ->where('loai_vi', 'LIKE',"%$loai%")
            ->paginate(12);
        }
        // dd($search_pro);

        return view('frontend.tailieu.search', compact('search_pro'));
    }
}
