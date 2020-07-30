<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\Cate_product;
use Image, File;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\Images;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('id', 'DESC')->get();
        $data    = Cate_product::select('id','name_vi','parent_id')->get()->toArray();

        return view('admin.product.index', compact('product', 'data'));
    }

    public function create()
    {
        $data = Cate_product::select('id','name_vi','parent_id')->get()->toArray();
        if ($data != null) {

            return view('admin.product.create', compact('data'));
        } else {

            return redirect()->route('admin.cate_product.home')->with('error', 'Chưa có danh mục');
        }

    }

    public function postCreate(ProductRequest $req)
    {
        $product                  = new Product;
        $product->name_vi         = $req['name_vi'];
        $product->name_en         = $req['name_en'];
        $product->slug_vi         = str_slug($req['name_vi']);
        $product->slug_en         = str_slug($req['name_en']);
        $product->price           = $req['price'];
        $product->cate_product_id = $req['cate_product_id'];
        $product->position        = $req['position'];
        $product->status          = (is_null($req['status']) ? '0' : '1');
        $product->is_home         = (is_null($req['is_home']) ? '0' : '1');
        $product->title_vi        = $req['title_vi'];
        $product->title_en        = $req['title_en'];
        $product->description_vi  = $req['description_vi'];
        $product->description_en  = $req['description_en'];
        $product->title_seo_vi    = $req['title_seo_vi'];
        $product->title_seo_en    = $req['title_seo_en'];
        $product->meta_key_vi     = $req['meta_key_vi'];
        $product->meta_key_en     = $req['meta_key_en'];
        $product->meta_des_vi     = $req['meta_des_vi'];
        $product->meta_des_en     = $req['meta_des_en'];
        $product->ngay            = $req['ngay'];
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/product/'.$filename));
            $product->image = ('upload/product/'.$filename);
        }
        $product->save();

        if ($req->hasFile('img')) {
            $img = $req->file('img');
            foreach ($img as $i) {
                $filename = date('Y_d_m_H_i_s').'-'. $i->getClientOriginalName();
                Image::make($i)->save(public_path('upload/detailproduct/'.$filename));
                $i = new Images;
                $i->product_id = $product->id;
                $i->name = ('upload/detailproduct/'.$filename);
                $i->save();
            }
        }

        return redirect()->route('admin.product.index');
    }

    public function update($id)
    {
        $data    = Cate_product::select('id','name_vi','parent_id')->get();
        $product = Product::findOrFail($id);
        $img_detail = Images::where('product_id', $product->id)->get();

        return view('admin.product.edit', compact('data', 'product', 'img_detail'));
    }

    public function postUpdate($id, Request $req)
    {
        $product                  = Product::findOrFail($id);
        $product->name_vi         = $req['name_vi'];
        $product->name_en         = $req['name_en'];
        $product->slug_vi         = str_slug($req['name_vi']);
        $product->slug_en         = str_slug($req['name_en']);
        $product->price           = $req['price'];
        $product->cate_product_id = $req['cate_product_id'];
        $product->position        = $req['position'];
        $product->status          = (is_null($req['status']) ? '0' : '1');
        $product->is_home         = (is_null($req['is_home']) ? '0' : '1');
        $product->title_vi        = $req['title_vi'];
        $product->title_en        = $req['title_en'];
        $product->description_vi  = $req['description_vi'];
        $product->description_en  = $req['description_en'];
        $product->title_seo_vi    = $req['title_seo_vi'];
        $product->title_seo_en    = $req['title_seo_en'];
        $product->meta_key_vi     = $req['meta_key_vi'];
        $product->meta_key_en     = $req['meta_key_en'];
        $product->meta_des_vi     = $req['meta_des_vi'];
        $product->meta_des_en     = $req['meta_des_en'];
        if ($req['ngay'] != null) {
            $product->ngay            = $req['ngay'];
        }
        if ($req->hasFile('image')) {
            if(file_exists($product->image)) {
                unlink($product->image);
            }
            $image = $req->file('image');
            $filename = date('Y_d_m_H_i_s').'-'. $image->getClientOriginalName();
            Image::make($image)->save(public_path('upload/product/'.$filename));
            $product->image = ('upload/product/'.$filename);
        }
        $validatedData = $req->validate([
            'name_vi'     => 'required|unique:products,name_vi,' .$product->id,
        ]);
        $product->save();
        if ($req->hasFile('img')) {
            $img = $req->file('img');
            foreach ($img as $key => $i) {
                $filename = date('Y_d_m_H_i_s').'-'. $i->getClientOriginalName();
                Image::make($i)->save(public_path('upload/detailproduct/'.$filename));
                $i = new Images;
                $i->product_id = $product->id;
                $i->name = ('upload/detailproduct/'.$filename);
                $i->save();
            }
        }

        return redirect()->route('admin.product.index')->with('success', 'Sửa thành công');
    }

    public function destroy($id)
    {
        $result = Product::findOrFail($id);
        $img = Images::where('product_id', $result->id)->get();
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
        $del = Images::find($request->id);
        $path = $del->name;
        if(File::exists($path)) {
            File::delete($path);
        }
        $del->delete();
        echo "Xóa thành công";
    }

    public function search(Request $req)
    {
        $id_cate_product = $req->cate_product;
        if($id_cate_product == 0){
            return redirect()->route('admin.product.index');
        }
        session()->put('id',$id_cate_product);
        $data    = Cate_product::select('id','name','parent_id')->get()->toArray();
        $product = Product::orderBy('position','ASC')->where(function($query)
        {
            $pro = $query;
            $id  = session('id');
            $cate_product = Cate_product::find($id);
            $pro = $pro->orWhere('cate_product_id',$cate_product->id); // bài viết có id của danh muc cha cấp 1.
            $com = Cate_product::where('parent_id',$cate_product->id)->get();//danh mục cha cấp 2.

            foreach ($com as $dt) {
                $pro = $pro->orWhere('cate_product_id',$dt->id);// bài viết có id của danh muc cha cấp 2.
            }
            session()->forget('id');//xóa session;
        })->get();

        return view('admin.product.search', compact('product', 'data', 'id_cate_product'));
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
                $result = Product::findOrFail($c);
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
                $result         = Product::where('id', $c)->first();
                $result->status = 1;
                $result->save();
            }

            return back()->with('success', 'Thao tác thành công');
        }
        if($req->select_action == 3)
        {
            $checkbox = $req->checkbox;
            foreach ($checkbox as $c) {
                $result         = Product::where('id', $c)->first();
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
            $result = Product::find($req->id);
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

    public function is_home(Request $req)
    {
        if ($req->ajax())
        {
            $result = Product::find($req->id);
            if ($result->is_home == 0)
            {
                $result->is_home = 1;
            } else {
                $result->is_home = 0;
            }
            $result->save();

            return response($result);
        }
    }
}
