<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate_investor;
use Image;
use File;

class CateInvestorController extends Controller
{
    public function index()
    {
        $cate_investor = Cate_investor::all();

        return view('admin/cate_investor/index', compact('cate_investor'));
    }

    public function create()
    {
        $data=Cate_investor::select('id','name_vi','parent_id')->get()->toArray();

        return view('admin/cate_investor/create', compact('data'));
    }

    public function postCreate(Request $req)
    {
        $cate_investor              = new Cate_investor;
        $cate_investor->name_en        = $req['name_en'];
        $cate_investor->name_vi        = $req['name_vi'];
        $cate_investor->slug        = str_slug($cate_investor->name_vi);
        $cate_investor->position    = $req['position'];
        $cate_investor->status      = (is_null($req['status']) ? '0' : '1');
         $cate_investor->save();

        return redirect()->route('admin.cate_investor.home')->with('success','Thêm thành công');
    }

    public function update($slug)
    {
        $cate_investor = Cate_investor::where('slug', $slug)->first();

        return view('admin.cate_investor.edit', compact('cate_investor', 'data'));
    }

    public function postUpdate($slug, Request $req)
    {
        // $cate_product        = Cate_product::findOrFail($slug);
        $cate_investor              = Cate_investor::where('slug', $slug)->first();
        $cate_investor->name_vi        = $req['name_vi'];
        $cate_investor->name_en        = $req['name_en'];
        $cate_investor->slug        = str_slug($cate_investor->name_vi);
        $cate_investor->position    = $req['position'];
        $cate_investor->status      = (is_null($req['status']) ? '0' : '1');

        $validatedData = $req->validate([
            'name_vi'     => 'required|unique:cate_investors,name_vi,' .$cate_investor->id,
        ]);
        $cate_investor->save();

        return redirect()->route('admin.cate_investor.home')->with('success','Sửa thành công');
    }

    public function destroy($id)
    {
        $result = Cate_investor::findOrFail($id);
        $result2 = Cate_investor::where('parent_id', $id)->first();
        if(file_exists($result->image))
        {
            unlink($result->image);
        }
        if(isset($result2))
        {
            if(file_exists($result2->image))
            {
                unlink($result2->image);
            }
            $result2->delete();
        }
        $result->delete();

        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function status(Request $req)
    {
        if ($req->ajax())
        {
            $result = Cate_investor::find($req->id);
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
