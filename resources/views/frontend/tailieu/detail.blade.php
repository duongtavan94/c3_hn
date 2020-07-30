@extends('frontend.partials.master')
@if($detail_product)
    @section('title', $detail_product->title_seo )
    @section('title_seo', $detail_product->title_seo)
    @section('meta_key', $detail_product->meta_key)
    @section('meta_des', $detail_product->meta_des)
    @section('content')
    <div class="chi-tiet-detail_product">
        <div class="container">
            <div class="title-bai">
                <h1>{{ $detail_product->name }}</h1>
            </div>
            <form action="{{ route('add-cart', $detail_product->id) }}" method="get">
                {{ csrf_field() }}
                <input type="number" name="quantity">
                <button>mua</button>
            </form>


        </div>
    </div>
    @endsection
@endif