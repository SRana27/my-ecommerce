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
                        <h1 class="page-title">Order details</h1>
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
                <div class="col-md-3 pt-4">
                    <div class="list-group">
                        <a href="{{route('customer.dashboard')}}" class="list-group-item list-group-item-action">dashboard</a>
                        <a href="{{route('customer.profile')}}" class="list-group-item list-group-item-action">profile</a>
                        <a href="{{route('customer.all-order')}}" class="list-group-item list-group-item-action">all Order</a>
                        <a href="#" class="list-group-item list-group-item-action">Account</a>
                        <a href="#" class="list-group-item list-group-item-action disabled">Change Password</a>
                        <a href="{{route('customer.logout')}}" class="list-group-item list-group-item-action disabled">log out</a>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-8 ">
                    <h4 class="text-center"> Order Details</h4>


                    <div class="table-responsive m-t-40 pt-3 ">
                        <table class="table table-striped border ">
                            <tr>
                                <th class="col-4 " >Order No :</th>
                                <td class="col-8" >{{$order->id}}</td>
                            </tr>

                            <tr>
                                <th class="col-4">Order Date :</th>
                                <td class="col-8" >{{$order->order_date}}</td>
                            </tr>
                            <tr>
                                <th class="col-4">Order Total :</th>
                                <td class="col-8" > {{$order->order_total}} .Tk</td>
                            </tr>
                            <tr>
                                <th class="col-4">Tax Total :</th>
                                <td class="col-8" >{{$order->tax_total}} .Tk</td>
                            </tr>
                            <tr>
                                <th class="col-4">Shipping Total:</th>
                                <td class="col-8" >{{$order->shipping_total}} .Tk</td>
                            </tr>
                            <tr>
                                <th class="col-4">Delivery address:</th>
                                <td class="col-8" >{{$order->delivery_address}}</td>
                            </tr>
                            <tr >
                                <th class="col-4">Payment type :</th>
                                <td class="col-8" >{{$order->payment_type==2? 'Online' :'Cash on delivery'}}</td>
                            </tr>
                            <tr>
                                <th class="col-4">Payment status :</th>
                                <td class="col-8" >{{$order->payment_status}}</td>
                            </tr>
                        </table>
                    </div>
                    <h4 class="text-center mt-4">Product Info</h4>
                    <table class=" table table-bordered table-hover mt-4">

                        @php($i=1)

                        <tr class="text-center">
                            <th>Sl</th>
                            <th>product name</th>
                            <th>product price</th>
                            <th>product quantity</th>
                            <th>total amount</th>


                        </tr>
                        @foreach($orderDetails as $orderDetail)
                            <tr class="text-center">

                                <td>{{$i++}}</td>
                                <td> <a href="{{route('product.info',['product_id'=>$orderDetail->product_id])}}"> {{$orderDetail->product_name}}</a></td>
                                <td>{{$orderDetail->product_price}} tk.</td>
                                <td>{{$orderDetail->product_qty}}</td>
                                <td class="text-end">{{$orderDetail->product_price*$orderDetail->product_qty}} .Tk</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="text-center" Colspan="4">Tax (5%)</td>
                            <td class="text-end">{{$order->tax_total}} .Tk </td>
                        </tr>
                        <tr>
                            <td class="text-center" Colspan="4">Shipping Cost</td>
                            <td class="text-end">{{$order->shipping_total}} .Tk </td>
                        </tr>
                        <tr>
                            <td class="text-center" Colspan="4">Total Cost</td>
                            <td class="text-end">{{$order->order_total}} .Tk </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

