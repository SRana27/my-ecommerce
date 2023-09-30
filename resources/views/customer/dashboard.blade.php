@extends('website.master')
@section('title')
  Customer dashboard
@endsection
@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">dashboard</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('home')}}">Shop</a></li>
                        <li>dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-3">
                  <div class="list-group">
                      <a href="{{route('customer.dashboard')}}" class="list-group-item list-group-item-action">dashboard</a>
                      <a href="#" class="list-group-item list-group-item-action">profile</a>
                      <a href="{{route('customer.all-order')}}" class="list-group-item list-group-item-action">all Order</a>
                      <a href="#" class="list-group-item list-group-item-action">Account</a>
                      <a href="#" class="list-group-item list-group-item-action disabled">Change Password</a>
                  </div>
              </div>
                <div class="col-md-9">
                  <h2 class="text-center">dashboard</h2>
                </div>
            </div>
        </div>
    </section>
@endsection
