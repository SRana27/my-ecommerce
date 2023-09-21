@extends('website.master')
@section('title')
    Checkout
@endsection
@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('home')}}">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="checkout-steps-form-style-1">
                        <ul class="nav nav-pills">
                            <li><a class="nav-link active" href="" data-bs-target="#cash" data-bs-toggle="pill">Cash On
                                    delivery</a></li>
                            <li><a class="nav-link" href="" data-bs-target="#online" data-bs-toggle="pill">Online </a>
                            </li>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="cash">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>User Name</label>
                                                <div class="row">
                                                    <div class="col-md-12 form-input form">
                                                        <input type="text" placeholder="Full Name">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Email Address</label>
                                                <div class="form-input form">
                                                    <input type="email" placeholder="Email Address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Phone Number</label>
                                                <div class="form-input form">
                                                    <input type="number" placeholder="Phone Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Mailing Address</label>
                                                <div class="form-input form">
                                                    <textarea type="text" placeholder="Delivery Address"> </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-checkbox checkbox-style-3 ">
                                                <input type="checkbox" id="checkbox-3" checked>
                                                <label for="checkbox-3"><span></span></label>
                                                <p>I accept all terms & condition.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form button">
                                                <button class="btn" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFour" aria-expanded="false"
                                                        aria-controls="collapseFour">next
                                                    step
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="online"></div>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title text-center" >Shopping summery</h5>
                            <div class="sub-total-price">
                                @php($subtotal=0)
                                @foreach(ShoppingCart::all() as $item)
                                    <div class="total-price">
                                        <p>{{$item->name}}
                                           ({{$item->price}} tk. X {{$item->qty}})</p>
                                        <p class="price">{{$item->price*$item->qty}} tk.</p>
                                    </div>
                                    @php($subtotal= $subtotal+($item->price*$item->qty))

                                @endforeach
                            </div>
                            @php($tax= round($subtotal*5/100))
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">{{$subtotal}} tk.</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Tax(5%):</p>
                                    <p class="price">{{$tax}} tk.</p>
                                </div>
                                @php($shipping=100)
                                <div class="payable-price">
                                    <p class="value">Shipping Fee:</p>
                                    <p class="price">
                                        @if(count(ShoppingCart::all())>0)
                                            {{$shiping=100}} tk.

                                        @else
                                            {{$shiping=0}} tk.

                                            </span>
                                        @endif
                                        </p>
                                </div>
                                <hr>

                                @php($total=($subtotal+$shipping+$tax))
                                <div class="payable-price">
                                    <p class="value">Total payable:</p>
                                    <p class="price">{{$total}} tk.</p>
                                </div>
                            </div>
                            <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="{{asset('/')}}website/assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
