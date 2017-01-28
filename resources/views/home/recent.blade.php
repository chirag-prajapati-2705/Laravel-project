<?php
/**
 * Created by PhpStorm.
 * User: Chirag-Chiku
 * Date: 1/27/2017
 * Time: 10:22 PM
 */
?>
<!--content-->
<div class="content">
    <div class="container">
        <div class="content-top">
            <h1>Recent Products</h1>

            <div class="content-top1">
                @foreach($products as $product)
                    <div class="col-md-3 col-md2">
                        <div class="col-md1 simpleCart_shelfItem">
                            <a href="single.html">
                                <img class="img-responsive"
                                     src="{{ URL::asset('uploads/'.$product->image->image_name)}}" alt=""/>
                            </a>

                            <h3><a href="single.html">{{$product->name}}</a></h3>

                            <div class="price">
                                <h5 class="item_price">${{$product->price}}</h5>
                                <a href="#" class="item_add">Add To Cart</a>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!--//content-->