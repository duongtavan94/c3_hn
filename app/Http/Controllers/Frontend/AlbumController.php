<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Anh;

class AlbumController extends Controller
{
    public function allAlbum()
    {
        $allAlbum = Album::where('status', 1)->paginate('16');

        return view('frontend.album.index', compact('allAlbum'));
    }

    public function detailAlbum($slug)
    {
        $detail = Album::where('slug', $slug)->first();
        $img = Anh::where('album_id', $detail->id)->get();

        return view('frontend.album.detail', compact('detail', 'img'));
    }
}
