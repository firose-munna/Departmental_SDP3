<?php
use App\Models\Product;

?>

@extends('frontend.master')
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Categories</h3>
                        <div >
                            @foreach($categories as $category)
                                @php
                                    $catProductCount=Product::catProductCount($category->id);
                                @endphp
                                <div >

                                    <label for="category-1">
                                        <span></span>
                                        <li>
                                            <a href="{{url('product-by-cat/'.$category->id)}}">
                                                {{$category->name}}
                                            </a>
                                        </li>

                                        <small>({{$catProductCount}})</small>
                                    </label>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- /aside Widget -->



                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Brand</h3>
                        <div >
                            @foreach($brands as $brand)
                                @php
                                    $brandCount=Product::brandCount($brand->id);
                                @endphp
                                <div >
                                    <label for="brand-1">
                                        <span></span>
                                        <li>
                                            <a href="{{url('product-by-brand/'.$brand->id)}}">
                                                {{$brand->name}}
                                            </a>
                                        </li>

                                        <small>({{$brandCount}})</small>
                                    </label>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- /aside Widget -->


{{--                    <!-- /aside Widget -->--}}
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">


                    <!-- store products -->

                    <div class="row">
                        <!-- product -->
                        @foreach($products as $product)
                            @php
                                $product['image']= explode('|', $product->image);
                                $images= $product->image[0];
                            @endphp
                            <div class="col-md-4 col-xs-6">
                                <div class="product"><a href="{{url('/view-product/'.$product->id)}}">
                                        <div class="product-img">
                                            <img src="{{asset('/image/'.$images)}}" style="height: 256px; width: 256px;">
                                            <div class="product-label">
                                                <span class="new">NEW</span>
                                            </div> </a>
                                </div>
                                    <div class="product-body">
                                        <p class="product-category"><a href="{{url('/view-product/'.$product->id)}}"></a>{{$product->category->name}}</p>
                                        <h3 class="product-name"><a href="{{url('/view-product/'.$product->id)}}">{{$product->name}}</a></h3>
                                        <h4 class="product-price"><a href="{{url('/view-product/'.$product->id)}}">&#2547;{{$product->price}}<del class="product-old-price">&#2547;{{$product->price}}</del></a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>

                                    </div>
                                    <form action="{{url('/add-to-cart')}}" method="post">
                                        @csrf
                                        <div class="add-to-cart">
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="id" value="{{$product->id}}">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                                cart
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                        <!-- /product -->



                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <span class="store-qty">Showing 20-100 products</span>
                        <ul class="store-pagination">
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
