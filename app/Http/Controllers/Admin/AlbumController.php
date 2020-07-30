<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image, File;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\Anh;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index()
    {
        $album = Album::orderBy('id', 'DESC')->get();

        return view('admin.album.index', compact('album', 'data'));
    }

    public function create()
    {

        return view('admin.album.create', compact('data'));
    }

    public function postCreate(Request $req)
    {
        $album                  = new Album;
        $album->name            = $req['name'];
        $album->slug            = str_slug($req['name']);
        $album->position        = $req['position'];
        $album->status          = (is_null($req['status']) ? '0' : '1');
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/album/'.$filename));
            $album->image = ('upload/album/'.$filename);
        }
        $album->save();

        if ($req->hasFile('img')) {
            $img = $req->file('img');
            foreach ($img as $i) {
                $filename = date('Y_d_m_H_i_s').'-'. $i->getClientOriginalName();
                Image::make($i)->save(public_path('upload/detailalbum/'.$filename));
                $i = new Anh;
                $i->album_id = $album->id;
                $i->name = ('upload/detailalbum/'.$filename);
                $i->save();
            }
        }

        return redirect()->route('admin.album.index');
    }

    public function update($slug)
    {
        $album = Album::where('slug', $slug)->first();
        $img_detail = Anh::where('album_id', $album->id)->get();

        return view('admin.album.edit', compact('album', 'img_detail'));
    }

    public function postUpdate($slug, Request $req)
    {
        $album                  = Album::where('slug', $slug)->first();
        $album->name            = $req['name'];
        $album->slug            = str_slug($req['name']);
        $album->position        = $req['position'];
        $album->status          = (is_null($req['status']) ? '0' : '1');
        if ($req->hasFile('image')) {
            if(file_exists($album->image)) {
                unlink($album->image);
            }
            $image = $req->file('image');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/album/'.$filename));
            $album->image = ('upload/album/'.$filename);
        }
        $validatedData = $req->validate([
            'name'     => 'required|unique:albums,name,' .$album->id,
        ]);
        $album->save();
        if ($req->hasFile('img')) {
            $img = $req->file('img');
            foreach ($img as $key => $i) {
                $filename = date('Y_d_m_H_i_s').'-'. $i->getClientOriginalName();
                Image::make($i)->save(public_path('upload/detailalbum/'.$filename));
                $i = new Anh;
                $i->album_id = $album->id;
                $i->name = ('upload/detailalbum/'.$filename);
                $i->save();
            }
        }

        return redirect()->route('admin.album.index')->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        $result = Album::findOrFail($id);
        $img = Anh::where('album_id', $result->id)->get();
        if (file_exists($result->image)) {
            unlink($result->image);
        }
        foreach ($img as $key => $i) {
            if (File::exists($i->name)) {
                File::delete($i->name);
            }
        }
        $result->delete();

        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function delImage(Request $request)
    {
        $del = Anh::find($request->id);
        $path = $del->name;
        if(File::exists($path)) {
            File::delete($path);
        }
        $del->delete();
        echo "Xóa thành công";
    }

    public function checkbox(Request $req)
    {
        $checkbox = $req->checkbox;
        if(!isset($req->checkbox))
        {

            return back()->with('success', 'Chưa chọn sản phẩm');
        }
        if($req->select_action == 1)
        {
            $checkbox = $req->checkbox;
            foreach ($checkbox as $c) {
                $result = Album::findOrFail($c);
                if(file_exists($result->image))
                {
                    unlink($result->image);
                }
                $result->delete();
            }

            return redirect()->back()->with('success', 'Xóa thành công');
        }
        if($req->select_action == 2)
        {
            $checkbox = $req->checkbox;
            foreach ($checkbox as $c) {
                $result         = Album::where('id', $c)->first();
                $result->status = 1;
                $result->save();
            }

            return back()->with('success', 'Thao tác thành công');
        }
        if($req->select_action == 3)
        {
            $checkbox = $req->checkbox;
            foreach ($checkbox as $c) {
                $result         = Album::where('id', $c)->first();
                $result->status = 0;
                $result->save();
            }

            return back()->with('success', 'Thao tác thành công');
        }
        if($req->select_action == 0)
        {

            return back()->with('success', 'Chưa chọn thao tác');
        }
        if($checkbox == NULL){

            return back()->with('success', 'Bạn chưa chọn cái nào');
        }
    }

    public function status(Request $req)
    {
        if ($req->ajax())
        {
            $result = Album::find($req->id);
            if ($result->status == 0)
            {
                $result->status = 1;
            } else {
                $result->status = 0;
            }
            $result->save();

            return response($result);
        }
    }
}
