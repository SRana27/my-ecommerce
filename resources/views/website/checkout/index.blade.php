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
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="cash">
                                <form action="{{route('new-cash-order')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label for="Fullname"> Full Name</label>
                                                <div class="row">
                                                    <div class="col-md-12 form-input form">
                                                        @if(isset($customer->id))
                                                            <input type="text" placeholder="Full Name" id="Fullname"
                                                                   value="{{$customer->name}}" readonly name="name">
                                                        @else
                                                            <input type="text" placeholder="Full Name" id="Fullname"
                                                                   name="name" required>
                                                            {{--                                                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name'): ' '}}</span>--}}

                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label for="useremail">Email Address</label>
                                                <div class="form-input form">
                                                    @if(isset($customer->id))
                                                        <input type="email" placeholder="Email Address" id="useremail"
                                                               value="{{$customer->email}}" readonly name="email">
                                                    @else
                                                        <input type="email" placeholder="Email Address" id="useremail"
                                                               name="email" required>
                                                        <span
                                                            class="text-danger">{{$errors->has('email') ? $errors->first('email'): ' '}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label for="phnumber">Phone Number</label>
                                                <div class="form-input form">
                                                    @if(isset($customer->id))
                                                        <input type="number" placeholder="Phone Number" id="phnumber"
                                                               value="{{$customer->mobile}}" readonly name="mobile">
                                                    @else
                                                        <input type="number" placeholder="Phone Number" id="phnumber"
                                                               name="mobile" required>
                                                        <span
                                                            class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile'): ' '}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label for="deAddress">Delivery Address</label>
                                                <div class="form-input form">
                                                    <textarea type="text" placeholder="delivery address"
                                                              style="padding-top: 10px;height: 100px" id="deAddress"
                                                              name="delivery_address" required></textarea>
                                                    {{--                                                        <span class="text-danger" > {{$errors->has('delivery_address') ? $errors->first('delivery_address'): ' '}}</span>--}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Payment Type </label>
                                                <div class="">
                                                    <label><input type="radio" checked name="payment_type" value="1">
                                                        Cash On delivery</label>
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
                                                        aria-controls="collapseFour"> Confrim Order
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade show px-3" id="online">
                                <br>
                                <h4 class="mb-3">Billing address</h4>
                                <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token"/>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            @if(isset($customer->id))
                                              <label for="firstName">Full name</label>
                                              <input type="text" name="name" class="form-control" id="customer_name" placeholder="Your name" value="{{$customer->name}}" required>
                                            @else
                                                <input type="text" name="name" class="form-control" id="customer_name" placeholder="Your name"  required>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <label for="mobile">Mobile</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">+88</span>
                                            </div>
                                            @if(isset($customer->id))
                                             <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile" value="{{$customer->mobile}}" required>
                                            @else
                                                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile" required>
                                            @endif
                                            <div class="invalid-feedback" style="width: 100%;">
                                                Your Mobile number is required.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email">Email </label>
                                        @if(isset($customer->id))
                                            <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" value="{{$customer->email}}" required>
                                        @else
                                            <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" value="" required>
                                        @endif
                                        <div class="invalid-feedback">
                                            Please enter a valid email address for shipping updates.
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="address">Address</label>
                                        <textarea type="text" class="form-control" id="address" placeholder="delivery address" name="delivery_address" required></textarea>
                                        <div class="invalid-feedback">
                                            Please enter your shipping address.
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="country">Country</label>
                                            <select class="custom-select d-block w-100 form-control" id="country" required>
                                                <option value="">Choose...</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid country.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="state">State</label>
                                            <select class="custom-select d-block w-100  form-control" id="state"
                                                    required>
                                                <option value="">Choose...</option>
                                                <option value="Dhaka">Dhaka</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please provide a valid state.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="zip">Zip</label>
                                            <input type="text" class=" form-control" id="zip" placeholder="" required>
                                            <div class="invalid-feedback">
                                                Zip code required.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Payment Type </label>
                                            <div class="">
                                                <label><input type="radio" checked name="payment_type" value="2">
                                                    Online</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-checkbox checkbox-style-3 ">
                                            <input type="checkbox" id="checkbox-33" checked>
                                            <label for="checkbox-33"><span></span></label>
                                            <p>I accept all terms & condition.</p>
                                        </div>
                                    </div>
                                     <br>
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Order Confirm
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title text-center">Shopping summery</h5>
                            <div class="sub-total-price">
                                @php($subtotal=0)
                                @foreach(ShoppingCart::all() as $item)
                                    <div class="total-price">
                                        <p>{{$item->name}} ->
                                            (<span style="font-size: 20px"> &#2547;</span> {{$item->price}} X {{$item->qty}})</p>
                                        <p class="price"><span style="font-size: 15px; font-family:bold"> &#2547;</span> {{$item->price*$item->qty}}</p>
                                    </div>
                                    @php($subtotal= $subtotal+($item->price*$item->qty))

                                @endforeach
                            </div>
                            @php($tax= round($subtotal*5/100))
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price"><span style="font-size: 15px; font-family:bold"> &#2547</span> {{$subtotal}}</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Tax(5%):</p>
                                    <p class="price"><span style="font-size: 15px; font-family:bold"> &#2547</span> {{$tax}}</p>
                                </div>
                                @php($shipping=0)
                                <div class="payable-price">
                                    <p class="value">Shipping Fee:</p>
                                    <p class="price"><span style="font-size: 15px; font-family:bold"> &#2547
                                        @if(count(ShoppingCart::all())>0)
                                                {{$shipping=100}}
                                            @else
                                                {{$shipping=0}} 
                                            </span>
                                        @endif
                                    </p>
                                </div>

                                <hr>
                                @php($total=($subtotal+$shipping+$tax))
                                <div class="payable-price">
                                    <p class="value">Total payable:</p>
                                    <p class="price"><span style="font-size: 15px; font-family:bold">&#2547</span> {{$total}}</p>
                                </div>
                                <?php Session::put('order_total', $total);
                                Session::put('tax_total', $tax);
                                Session::put('shipping_total', $shipping);
                                ?>
                            </div>
                            <div class="price-table-btn button text-center">
                                <a href="{{route('show-cart')}}" class="btn btn-alt">View Cart</a>
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
