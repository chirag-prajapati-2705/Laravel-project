@extends('layouts.app')

@section('content')

    <style>
        .product-image{
            width:200px;
        }
    </style>
    <div class="container">

        <div class="row">
            <p>{{$products[0]->name}}</p>
            <p>{{$products[0]->price}}</p>
            {{ dd($products)}}
            <p><input type="submit" name="payment" value="Payment"></p>
        </div>
    </div>
@endsection
