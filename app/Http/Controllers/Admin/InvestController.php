<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Illuminate\Support\Facades\Validator;
use App\Models\Invest;

class InvestController extends Controller
{
    public function index()
    {
        $invest = Invest::paginate(10);

        return view('admin.invest.index', compact('invest'));
    }

    public function create()
    {
        return view('admin.invest.create');
    }

    public function postCreate(Request $req)
    {
        $invest               = new Invest;
        $invest->name         = $req['name'];
        $invest->slug         = str_slug($req['name']);
        $invest->description  = $req['description'];
        $invest->link         = $req['link'];
        $invest->position     = $req['position'];
        $invest->dislay       = $req['dislay'];
        $invest->location     = $req['location'];
        $invest->stage        = $req['stage'];
        $invest->construction = $req['construction'];
        $invest->title_seo    = $req['title_seo'];
        $invest->meta_key     = $req['meta_key'];
        $invest->meta_des     = $req['meta_des'];
        $invest->status       = (is_null($req['status']) ? '0' : '1');
        if($req->hasFile('image')){
            $image    = $req->file('image');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/invest/'.$filename));
            $invest->image = ('upload/invest/'.$filename);
        }if($req->hasFile('image2')){
            $image2    = $req->file('image2');
            $filename = date('Y_d_m_H_i_s').'-'. $image2->getClientOriginalName();
            Image::make($image2)->save(public_path('upload/invest/'.$filename));
            $invest->image2 = ('upload/invest/'.$filename);
        }
        $invest->save();

        return redirect()->route('admin.invest.index');
    }

    public function update($id)
    {
        $invest = Invest::where('id', $id)->first();

        return view('admin.invest.edit', compact('invest'));
    }

    public function postUpdate($id, Request $req)
    {
        $invest               = Invest::where('id', $id)->first();
        $invest->name         = $req['name'];
        $invest->slug         = str_slug($req['name']);
        $invest->description  = $req['description'];
        $invest->link         = $req['link'];
        $invest->position     = $req['position'];
        $invest->dislay       = $req['dislay'];
        $invest->location     = $req['location'];
        $invest->stage        = $req['stage'];
        $invest->construction = $req['construction'];
        $invest->title_seo    = $req['title_seo'];
        $invest->meta_key     = $req['meta_key'];
        $invest->meta_des     = $req['meta_des'];
        $invest->status       = (is_null($req['status']) ? '0' : '1');
        if($req->hasFile('image'))
        {
            if(file_exists($invest->image))
            {
                unlink($invest->image);
            }
            $image    = $req->file('image');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/invest/'.$filename));
            $invest->image = ('upload/invest/'.$filename);
        }if($req->hasFile('image2'))
        {
            if(file_exists($invest->image2))
            {
                unlink($invest->image2);
            }
            $image2    = $req->file('image2');
            $filename = date('Y_d_m_H_i_s').'-'. $image2->getClientOriginalName();
            Image::make($image2)->save(public_path('upload/invest/'.$filename));
            $invest->image2 = ('upload/invest/'.$filename);
        }

        $invest->save();

        return redirect()->route('admin.invest.index')->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        $result = Invest::findOrFail($id);
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
            $result = Invest::find($req->id);
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
