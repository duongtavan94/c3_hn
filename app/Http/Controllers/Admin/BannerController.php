<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests\BannerRequest;
use Image;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::paginate(10);

        return view('admin.banner.index', compact('banner'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function postCreate(BannerRequest $req)
    {
        $banner = new Banner;
        $banner->name_vi        = $req['name_vi'];
        $banner->name_en        = $req['name_en'];
        $banner->ngay        = $req['ngay'];
        $banner->thang        = $req['thang'];
        $banner->position        = $req['position'];
        $banner->slug        = str_slug($req['name_vi']);
        $banner->status      = (is_null($req['status']) ? '0' : '1');
        $banner->description_vi = $req['description_vi'];
        $banner->description_en = $req['description_en'];
        $banner->title_vi = $req['title_vi'];
        $banner->title_en = $req['title_en'];
        
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/product/'.$filename));
            $banner->image = ('upload/product/'.$filename);
        }
        $banner->save();

        return redirect()->route('admin.banner.index');
    }

    public function update($id)
    {
        $banner = Banner::where('id', $id)->first();

        return view('admin.banner.edit', compact('banner'));
    }

    public function postUpdate($id, Request $req)
    {
        $banner = Banner::where('id', $id)->first();
        $banner->name_vi        = $req['name_vi'];
        $banner->name_en        = $req['name_en'];
        $banner->ngay        = $req['ngay'];
        $banner->thang        = $req['thang'];
        $banner->position        = $req['position'];
        $banner->slug        = str_slug($req['name_vi']);
        $banner->status      = (is_null($req['status']) ? '0' : '1');
        $banner->description_vi = $req['description_vi'];
        $banner->description_en = $req['description_en'];
        $banner->title_vi = $req['title_vi'];
        $banner->title_en = $req['title_en'];
        
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/product/'.$filename));
            $banner->image = ('upload/product/'.$filename);
        }
        $banner->save();

        return redirect()->route('admin.banner.index')->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        $result = Banner::findOrFail($id);
        if(file_exists($result->image))
        {
            unlink($result->image);
        }
        $result->delete();

        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function open($id)
    {
        $result = Banner::where('id', $id)->first();
        $result->status = 1;
        $result->save();

        return back();
    }

    public function close($id)
    {
        $result = Banner::where('id', $id)->first();
        $result->status = 0;
        $result->save();
        return back();
    }

    public function status(Request $req)
    {
        if ($req->ajax())
        {
            $result = Banner::find($req->id);
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
