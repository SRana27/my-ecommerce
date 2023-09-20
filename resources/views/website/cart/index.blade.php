@extends('website.master')
@section('title')
cart
@endsection
@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Cart</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="shopping-cart section">
       <div class="col-6 mx-auto">
           @if($message=Session::get('message'))

               <div class="alert alert-success alert-dismissible fade show text-center">
                   {{$message}}
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lebel="close"></button>
               </div>
           @endif
       </div>
        <div class="container">

            <div class="cart-list-head">

                <div class="cart-list-title">
                    <div class="row text-center">
                        <div class="col-lg-1 col-md-1 col-12">
                        </div>
                        <div class="col-lg-3 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Unit Price</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Subtotal</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Tax(5%)</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                @php($sum=0)
                @foreach($cart_products as $cart_product)
                <div class="cart-single-list">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href="{{route('product-detail',['product_id'=>$cart_product->id])}}"><img src="{{asset($cart_product->image)}}" alt="#"></a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-12">
                            <h5 class="product-name"><a href="{{route('product-detail',['product_id'=>$cart_product->id])}}">
                           {{$cart_product->name}}</a></h5>
                            <p class="product-des">
                                <span><em>Sub-category:</em> {{$cart_product->sub_category}}</span>
                                <span><em>brand:</em>{{$cart_product->brand}}</span>
                            </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <div class="text-center">
                                {{$cart_product->price}}
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <form action="{{route('update-cart-qty',['rowId'=>$cart_product->__raw_id])}}" method="post">
                                @csrf
                                <div class="input-group ">
                                    <input class="input-group form-control" min="1" value="{{$cart_product->qty}}" name="qty" required placeholder="quantity">
                                    <input class="btn btn-success" type="submit" value="update">
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p class="text-center">{{$cart_product->price * $cart_product->qty}}</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p class="text-center">{{($cart_product->price*5* $cart_product->qty)/100}}</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12 ">
                            <a class= "remove-item" onclick=" return confirm('are you sure remove this product')" href="{{route('remove-to-cart',['rowId'=>$cart_product->__raw_id])}}"><i class="lni lni-close"></i></a>
                        </div>
                    </div>
                </div>
                    @php($sum= $sum + ($cart_product->price * $cart_product->qty));
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">

                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>{{$sum}}</span></li>
                                        <li>Tax(5%)<span>{{$tax=($sum*5)/100}}</span></li>
                                        <li>Shipping<span>{{$shiping=100}}</span></li>
{{--                                        <li>You Save<span>$29.00</span></li>--}}
                                        <li class="last">Total Payable<span>{{$total=$sum+$tax+$shiping}}</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="{{route('checkout')}}" class="btn ">Checkout</a>
                                        <a href="{{route('home')}}" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
