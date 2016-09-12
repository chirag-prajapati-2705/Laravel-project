@extends('layouts.app')

@section('content')

    <style>
        .product-image {
            width: 200px;
        }
    </style>
    <div class="container">
        <div class="row">
            {{Form::open(array('url' => 'getCheckout')) }}
            <p>{{$products->name}}</p>
            <input type="hidden" name="product_name" value="{{$products->name}}">
            <p>{{ $products->getPrice($products->price) }}</p>
            <input type="hidden" name="product_price" value="{{$products->getPrice($products->price,false)}}">
            <p>{{ Html::image($products->image->getImagePath($products->image->image_name), 'img', ['class'=>'product-image']) }}</p>

            <p><input type="submit" name="payment" value="Payment"></p>
            {{Form::close()}}
        </div>
    </div>
@endsection
