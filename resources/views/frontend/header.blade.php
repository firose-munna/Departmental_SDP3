<div id="top-header">
    <div class="container">
        <ul class="header-links pull-left">
            <li><a href="#"><i class="fa fa-phone"></i> +880 1717367522</a></li>
            <li><a href="#"><i class="fa fa-envelope-o"></i> dangerzone@gmail.com</a></li>
            <li><a href="#"><i class="fa fa-map-marker"></i> Mirpur 2</a></li>
        </ul>
        <ul class="header-links pull-right">
            <li><a href="#"><i class="fa fa-taka"></i>BDT</a></li>
            @php
                $customer_id=Session::get('id');
            @endphp
            @if($customer_id != Null)
                <li><a href="{{url('/cus-logout')}}"><i class="fa fa-user-o"></i> Logout</a></li>
            @else
                <li><a href="{{url('/login-check')}}"><i class="fa fa-user-o"></i> Login</a></li>

            @endif
        </ul>
    </div>
</div>
<!-- /TOP HEADER -->

<!-- MAIN HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class="col-md-3">
                <div class="header-logo">
                    <a href="{{url('/')}}" class="logo">
                        <img src="./img/logo.png" alt="">
                    </a>
                </div>
            </div>
            <!-- /LOGO -->

            <!-- SEARCH BAR -->
            <div class="col-md-6">
                <div class="header-search">
                    <form action="{{url('/search')}}" method="GET">
                        <select class="input-select" name="category">
                            <option value="ALL" {{request('category') == 'ALL' ? 'selected':''}}>All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{request('category') == $category->id ? 'selected':''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        <input class="input" name="product" placeholder="Search here" value="{{request('product')}}" style="width: 290px;">
                        <button class="search-btn">Search</button>
                    </form>
                </div>
            </div>
            <!-- /SEARCH BAR -->

            <!-- ACCOUNT -->
            <div class="col-md-3 clearfix">
                <div class="header-ctn">

                    <!-- Cart -->
                    @php
                        $cartArray=cardArray();
                    @endphp
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Your Cart</span>
                            <div class="qty"><?=count($cartArray)?></div>
                        </a>
                        <div class="cart-dropdown">
                            <div class="cart-list">
                                @foreach($cartArray as $infoCart)
{{--                                    @php--}}
{{--                                        $images= $infoCart['attributes']['0'];--}}
{{--                                        $images= explode('|', $images);--}}
{{--                                        $images = $images[0];--}}
{{--                                    @endphp--}}
                                <div class="product-widget">
{{--                                    <div class="product-img">--}}
{{--                                        <img src="{{asset('/image/'.$images)}}">--}}
{{--                                    </div>--}}
                                    <div class="product-body">
                                        <h3 class="product-name"><a href="#">{{$infoCart['name']}}</a></h3>
                                        <h4 class="product-price"><span class="qty">{{$infoCart['quantity']}}x</span>&#2547;{{$infoCart['price']}}</h4>
                                    </div>
                                    <a class="delete" href="{{url('/delete-cart/'.$infoCart['id'])}}"><i class="fa fa-close"></i></a>
                                </div>
                                @endforeach


                            </div>
                            <div class="cart-summary">
                                <small><?=count($cartArray)?> Item(s) selected</small>
                                <h5>SUBTOTAL: &#2547;{{Cart::getTotal()}}</h5>
                            </div>
                            <div class="cart-btns">
                                @php
                                    $customer_id=Session::get('id');
                                @endphp

                                @if($customer_id != Null)
                                    <a href="#">View Cart</a>
                                    <a href="{{url('/checkout')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                @else
                                    <a href="#">View Cart</a>
                                    <a href="{{url('/login-check')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /Cart -->

                    <!-- Menu Toogle -->
                    <div class="menu-toggle">
                        <a href="#">
                            <i class="fa fa-bars"></i>
                            <span>Menu</span>
                        </a>
                    </div>
                    <!-- /Menu Toogle -->
                </div>
            </div>
            <!-- /ACCOUNT -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</div>
