<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate_product;
use App\Models\Cate_post;
use App\Models\Post;
use App\Models\Product;

class ProductController extends Controller
{
    public function allProduct()
    {
        $product = Product::where('status', 1)->paginate(5);

        return view('frontend.products.allProduct', compact('product'));
    }

    public function productByCate($slug)
    {
        $cate_product = Cate_product::where('slug_vi', $slug)->where('status', 1)->first();
        $product      = Product::where('status', 1)->where('cate_product_id', $cate_product->id)->paginate(5);

        return view('frontend.products.productByCate', compact('cate_product', 'product'));
    }

    public function detailProduct($slug)
    {
        $detail_product = Product::where('status', 1)->where('slug_vi', $slug)->first();
        $cate_product = Cate_product::where('id', $detail_product->cate_product_id)->first();

        return view('frontend.products.detailProduct', compact('detail_product', 'cate_product'));
    }
}
