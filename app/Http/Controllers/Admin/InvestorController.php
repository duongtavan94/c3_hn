<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Investor;
use App\Models\Cate_investor;
use Image;
use Illuminate\Support\Facades\Validator;
use File;

class InvestorController extends Controller
{
    public function index()
    {
        $investor = Investor::all();
        $data = Cate_investor::select('id','name_vi','parent_id')->get()->toArray();

        return view('admin.investor.index', compact('investor', 'data'));
    }

    public function create()
    {
        $data=Cate_investor::select('id','name_vi','parent_id')->get()->toArray();
        if ($data != null) {

            return view('admin.investor.create', compact('data'));
        } else {

            return redirect()->route('admin.cate_investor.home')->with('error', 'Chưa có danh mục');
        }
    }

    public function postCreate(Request $req)
    {
        $investor               = new Investor;
        $investor->name_vi         = $req['name_vi'];
        $investor->name_en         = $req['name_en'];
        $investor->slug         = str_slug($req['name_vi']);
        $investor->cate_investor_id = $req['cate_investor_id'];
        $investor->position     = $req['position'];
        $investor->status       = (is_null($req['status']) ? '0' : '1');
        if ($req->hasFile('image')) {
            // $file = $req->filepdf;
            // dd($file);
            $file = $req->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('upload/tailieu',$filename);
            $investor->image = ('upload/tailieu/'.$filename);
        }

        $investor->save();

        return redirect()->route('admin.investor.index');
    }

    public function update($slug)
    {
        $data = Cate_investor::select('id','name_vi','parent_id')->get();
        $investor = Investor::where('slug', $slug)->first();

        return view('admin.investor.edit', compact('data', 'investor'));
    }

    public function postUpdate($slug, Request $req)
    {
        $investor               = Investor::where('slug', $slug)->first();
        $investor->name_vi         = $req['name_vi'];
        $investor->name_en         = $req['name_en'];
        $investor->slug         = $req['slug'];
        $investor->cate_investor_id = $req['cate_investor_id'];
        $investor->position     = $req['position'];
        $investor->status       = (is_null($req['status']) ? '0' : '1');

        if ($req->hasFile('image')) {
            if(file_exists($investor->image))
            {
                unlink($investor->image);
            }
            $file = $req->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('upload/tailieu',$filename);
            $investor->image = ('upload/tailieu/'.$filename);
        }

        $validatedData = $req->validate([
            'name_vi'     => 'required|unique:investors,name_vi,' .$investor->id,
        ]);
        $investor->save();

        return redirect()->route('admin.investor.index')->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        $result = Investor::findOrFail($id);
        if (file_exists($result->image)) {
            unlink($result->image);
        }
        $result->delete();

        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function search(Request $req)
    {
        $id_cate_investor = $req->cate_investor;
        if ($id_cate_investor == 0) {

            return redirect()->route('admin.investor.index');
        }
        session()->put('id',$id_cate_investor);
        $data = Cate_investor::select('id','name','parent_id')->get()->toArray();
        $investor = Investor::orderBy('position','ASC')->where(function($query)
        {
            $pro       = $query;
            $id        = session('id');
            $cate_investor = Cate_investor::find($id);
            $pro = $pro->orWhere('cate_investor_id',$cate_investor->id); // bài viết có id của danh muc cha cấp 1.
            $com = Cate_investor::where('parent_id',$cate_investor->id)->get();//danh mục cha cấp 2.
            foreach ($com as $dt) {
                $pro = $pro->orWhere('cate_investor_id',$dt->id);// bài viết có id của danh muc cha cấp 2.
            }
            session()->forget('id');//xóa session;
        })->get();

        return view('admin.investor.search', compact('investor', 'data', 'id_cate_investor'));
    }

    public function checkbox(Request $req)
    {
        $checkbox = $req->checkbox;
        if (!isset($req->checkbox)) {

            return back()->with('success', 'Chưa chọn bài');
        }
        if ($req->select_action == 1) {
            $checkbox = $req->checkbox;
            foreach ($checkbox as $c) {
                $result = Investor::findOrFail($c);
                if(file_exists($result->image)) {
                    unlink($result->image);
                }
                $result->delete();
            }

            return redirect()->back()->with('success', 'Xóa thành công');
        }
        if ($req->select_action == 2) {
            $checkbox = $req->checkbox;
            foreach ($checkbox as $c) {
                $result = Investor::where('id', $c)->first();
                $result->status = 1;
                $result->save();
            }

            return back()->with('success', 'Thao tác thành công');
        }

        if ($req->select_action == 3) {
            $checkbox = $req->checkbox;
            foreach ($checkbox as $c) {
                $result = Investor::where('id', $c)->first();
                $result->status = 0;
                $result->save();
            }

            return back()->with('success', 'Thao tác thành công');
        }
        if ($req->select_action == 0) {

            return back()->with('success', 'Chưa chọn thao tác');
        }
        if ($checkbox == NULL){

            return back()->with('success', 'Bạn chưa chọn cái nào');
        }
    }

    public function status(Request $req)
    {
        if ($req->ajax()) {
            $result = Investor::find($req->id);
            if ($result->status == 0) {
                $result->status = 1;
            } else {
                $result->status = 0;
            }
            $result->save();

            return response($result);
        }
    }

    public function is_home(Request $req)
    {
        if ($req->ajax()) {
            $result = Investor::find($req->id);
            if ($result->is_home == 0) {
                $result->is_home = 1;
            } else {
                $result->is_home = 0;
            }
            $result->save();

            return response($result);
        }
    }
}