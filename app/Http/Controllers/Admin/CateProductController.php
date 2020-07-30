<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate_product;
use App\Http\Requests\Cate_productRequest;
use App\Http\Requests\UpdateCate_productRequest;
use Image;

class CateProductController extends Controller
{
    public function index()
    {
    	$cate_product = Cate_product::all();

    	return view('admin/cate_product/index', compact('cate_product'));
    }

    public function create()
    {
    	$data = Cate_product::select('id','name_vi','parent_id')->get()->toArray();

    	return view('admin/cate_product/create', compact('data'));
    }

    public function postCreate(Cate_productRequest $req)
    {
        $cate_product                 = new Cate_product;
        $cate_product->name_vi        = $req['name_vi'];
        $cate_product->name_en        = $req['name_en'];
        $cate_product->parent_id      = $req->parent_id;
        $cate_product->slug_vi        = str_slug($cate_product->name_vi);
        $cate_product->slug_en        = str_slug($cate_product->name_en);
        $cate_product->description_vi = $req['description_vi'];
        $cate_product->description_en = $req['description_en'];
        $cate_product->position       = $req['position'];
        $cate_product->status         = (is_null($req['status']) ? '0' : '1');
    	if($req->hasFile('image')){
            $image    = $req->file('image');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/cateproduct'.$filename));
            $cate_product->image = ('upload/cateproduct'.$filename);
        }
    	$cate_product->save();

    	return redirect()->route('admin.cate_product.home')->with('success','Thêm thành công');
    }

    public function update($id)
    {
        $data         = Cate_product::select('id','name_vi','parent_id')->get()->toArray();
        $cate_product = Cate_product::findOrFail($id);

    	return view('admin.cate_product.edit', compact('cate_product', 'data'));
    }

    public function postUpdate($id, Request $req)
    {
        $cate_product                 = Cate_product::findOrFail($id);
        $cate_product->name_vi        = $req['name_vi'];
        $cate_product->name_en        = $req['name_en'];
        $cate_product->parent_id      = $req->parent_id;
        $cate_product->slug_vi        = str_slug($cate_product->name_vi);
        $cate_product->slug_en        = str_slug($cate_product->name_en);
        $cate_product->description_vi = $req['description_vi'];
        $cate_product->description_en = $req['description_en'];
        $cate_product->position       = $req['position'];
        $cate_product->status         = (is_null($req['status']) ? '0' : '1');
    	if($req->hasFile('image'))
        {
            if(file_exists($cate_product->image))
            {
                unlink($cate_product->image);
            }
            $image    = $req->file('image');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/cateproduct'.$filename));
            $cate_product->image = ('upload/cateproduct'.$filename);

        }
        $validatedData = $req->validate([
            'name_vi'  => 'required|unique:cate_products,name_vi,' .$cate_product->id,
        ]);
    	$cate_product->save();

    	return redirect()->route('admin.cate_product.home')->with('success','Sửa thành công');
    }

    public function destroy($id)
    {
        $result  = Cate_product::findOrFail($id);
        $result2 = Cate_product::where('parent_id', $id)->first();
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
            $result = Cate_product::find($req->id);
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
