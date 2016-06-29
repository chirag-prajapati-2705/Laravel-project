@extends('layouts.app')

@section('content')

    <style>
        .product-image{
            width:200px;
        }
    </style>
    <div class="container">
        <div class="row">
            <p>{{$products->name}}</p>
            <p>{{$products->price}}</p>
            <p>{{ Html::image($products->image->getImagePath($products->image->image_name), 'img', ['class'=>'product-image']) }}</p>
            <p><input type="submit" name="payment" value="Payment"></p>
        </div>
    </div>
@endsection
