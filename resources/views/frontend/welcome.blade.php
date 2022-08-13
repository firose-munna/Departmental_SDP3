@extends('frontend.master')
@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                @foreach($categories as $category)
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{asset('/storage/'.$category->image)}}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>{{$category->name}}<br>Collection</h3>
                            <a href="{{url('/product-by-cat/'.$category->id)}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- /shop -->



            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">


                                @foreach($categories as $category)
                                <li><a  href="{{url('/product-by-cat/'.$category->id)}}">{{$category->name}}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>

                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    @foreach($products as $product)
                                        @php
                                            $product['image']= explode('|', $product->image);
                                            $images= $product->image[0];
                                        @endphp
                                    <div class="product"><a href="{{url('/view-product/'.$product->id)}}">
                                        <div class="product-img">
                                            <img src="{{asset('/image/'.$images)}}" style="height: 256px; width: 256px;">
                                            <div class="product-label">
                                                <span class="new">NEW</span>
                                            </div> </a>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><a href="{{url('/view-product/'.$product->id)}}">{{$product->category->name}}</a></p>
                                            <h3 class="product-name"><a href="{{url('/view-product/'.$product->id)}}">{{$product->name}}</a></h3>
                                            <h4 class="product-price"><a href="{{url('/view-product/'.$product->id)}}">&#2547;{{$product->price}}<del class="product-old-price">&#2547;{{$product->price}}</del></a>
                                            </h4>
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
                                    <!-- /product -->
                                    @endforeach


                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


    


    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Top selling</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">

                                @foreach($categories as $category)
                                    <li><a  href="{{url('/product-by-cat/'.$category->id)}}">{{$category->name}}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    <!-- product -->
                                    @foreach($topProducts as $topProduct)
                                        @php
                                            $topProduct['image']= explode('|', $topProduct->image);
                                            $images= $topProduct->image[0];
                                        @endphp
                                        <div class="product"><a href="{{url('/view-product/'.$topProduct->id)}}">
                                                <div class="product-img">
                                                    <img src="{{asset('/image/'.$images)}}" style="height: 256px; width: 256px;"></a>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><a href="{{url('/view-product/'.$topProduct->id)}}">{{$topProduct->category->name}}</a></p>
                                            <h3 class="product-name"><a href="{{url('/view-product/'.$topProduct->id)}}">{{$topProduct->name}}</a></h3>
                                            <h4 class="product-price"><a href="{{url('/view-product/'.$topProduct->id)}}">&#2547;{{$topProduct->price}}<del class="product-old-price">&#2547;{{$topProduct->price}}</del></a>
                                            </h4>

                                        </div>
                                        <form action="{{url('/add-to-cart')}}" method="post">
                                            @csrf
                                            <div class="add-to-cart">
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="id" value="{{$topProduct->id}}">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                                    cart
                                                </button>
                                            </div>
                                        </form>
                                </div>
                                <!-- /product -->
                                @endforeach



                            </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


@endsection
