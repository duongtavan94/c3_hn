<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Illuminate\Support\Facades\Validator;
use App\Models\Vin;

class VinController extends Controller
{
    public function index()
    {
        $vin = Vin::paginate(10);

        return view('admin.vin.index', compact('vin'));
    }

    public function create()
    {
        return view('admin.vin.create');
    }

    public function postCreate(Request $req)
    {
        $vin               = new Vin;
        $vin->name         = $req['name'];
        $vin->slug         = str_slug($req['name']);
        $vin->description  = $req['description'];
        $vin->link         = $req['link'];
        $vin->position     = $req['position'];
        $vin->dislay       = $req['dislay'];
        $vin->location     = $req['location'];
        $vin->stage        = $req['stage'];
        $vin->construction = $req['construction'];
        $vin->title_seo    = $req['title_seo'];
        $vin->meta_key     = $req['meta_key'];
        $vin->meta_des     = $req['meta_des'];
        $vin->status       = (is_null($req['status']) ? '0' : '1');
        if($req->hasFile('image')){
            $image    = $req->file('image');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/vin/'.$filename));
            $vin->image = ('upload/vin/'.$filename);
        }
        $vin->save();

        return redirect()->route('admin.vin.index');
    }

    public function update($id)
    {
        $vin = Vin::where('id', $id)->first();

        return view('admin.vin.edit', compact('vin'));
    }

    public function postUpdate($id, Request $req)
    {
        $vin               = Vin::where('id', $id)->first();
        $vin->name         = $req['name'];
        $vin->slug         = str_slug($req['name']);
        $vin->description  = $req['description'];
        $vin->link         = $req['link'];
        $vin->position     = $req['position'];
        $vin->dislay       = $req['dislay'];
        $vin->location     = $req['location'];
        $vin->stage        = $req['stage'];
        $vin->construction = $req['construction'];
        $vin->title_seo    = $req['title_seo'];
        $vin->meta_key     = $req['meta_key'];
        $vin->meta_des     = $req['meta_des'];
        $vin->status       = (is_null($req['status']) ? '0' : '1');
        if($req->hasFile('image'))
        {
            if(file_exists($vin->image))
            {
                unlink($vin->image);
            }
            $image    = $req->file('image');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/vin/'.$filename));
            $vin->image = ('upload/vin/'.$filename);
        }
        $validatedData = $req->validate([
            'position' => 'numeric|nullable|min:0|unique:vins,position,' .$vin->id,
        ]);
        $vin->save();

        return redirect()->route('admin.vin.index')->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        $result = Vin::findOrFail($id);
        if(file_exists($result->image))
        {
            unlink($result->image);
        }
        $result->delete();

        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function status(Request $req)
    {
        if ($req->ajax())
        {
            $result = Vin::find($req->id);
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
