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
                        <a href="{{route('customer.profile')}}" class="list-group-item list-group-item-action">profile</a>
                        <a href="{{route('customer.all-order')}}" class="list-group-item list-group-item-action">all Order</a>
                        <a href="#" class="list-group-item list-group-item-action">Account</a>
                        <a href="#" class="list-group-item list-group-item-action disabled">Change Password</a>
                        <a href="{{route('customer.logout')}}" class="list-group-item list-group-item-action disabled">log out</a>
                    </div>
                </div>
                <div class="col-md-9">

                      <table class=" table table-bordered table-hover">
                          @php($i=1)

                          <tr class="text-center">
                              <th>Sl No</th>
                              <th>Order No</th>
                              <th>Order Date</th>
                              <th>Order Total</th>
                              <th>Order Status</th>
                              <th>Deliver Address</th>
                              <th>Action</th>
                          </tr>
                          @foreach($orders as $order)
                              <tr class="text-center">

                                    <td>{{$i++}}</td>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->order_total}} tk.</td>
                                    <td>{{$order->order_status}}</td>
                                    <td>{{$order->delivery_address}}</td>
                                    <td><a href="{{route('customer.all-order-detail',['order_id'=>$order->id])}}" class="btn btn-success">
                                          detail
                                      </a>
                                  </td>
                              </tr>
                          @endforeach
                      </table>
                </div>
            </div>
        </div>
    </section>
@endsection

