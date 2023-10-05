
@extends('admin.master')
@section('title')
    Details order
@endsection
@section('body')
    <div class="row">
        <div class="col-12 mt-2 mx-auto">
            <div class="card ">
                <div class="card-body">
                    <h4 class="card-title text-center ">Order details</h4>
                    <hr>
                    <div class="table-responsive m-t-40 ">
                        <table class="table table-striped border ">
                            <tr>
                                <th class="col-5 " >Order Id: </th>
                                <td class="col-7" >{{$order->id}}</td>
                            </tr>
                            <tr>
                                <th class="col-5">Order date :</th>
                                <td class="col-7" >{{$order->order_date}}</td>
                            </tr>
                            <tr>
                                <th class="col-5">Order Total :</th>
                                <td class="col-7" > {{$order->order_total}}</td>
                            </tr>
                            <tr>
                                <th class="col-5">Tax Total :</th>
                                <td class="col-7" >{{$order->tax_total}}</td>
                            </tr>
                            <tr>
                                <th class="col-5">Shipping Total :</th>
                                <td class="col-7" >{{$order-> shipping_total }}</td>
                            </tr>
                            <tr>
                                <th class="col-5">Delivery Address :</th>
                                <td class="col-7" >{{$order->delivery_address}}</td>
                            </tr>
                            <tr>
                                <th class="col-5">Delivery Status :</th>
                                <td class="col-7" >{{$order->delivery_status}}</td>
                            </tr>
                            <tr>
                                <th class="col-5">Order Status :</th>
                                <td class="col-7" >{{$order->order_status}}</td>
                            </tr>

                            <tr>
                                <th class="col-5">Payment Type :</th>
                                <td class="col-7" >{{$order->payment_type==1 ?'cash on delivery':'online'}}</td>
                            </tr>
                            <tr >
                                <th class="col-5">Payment Status :</th>
                                <td class="col-7" >{{$order->payment_status}}</td>
                            </tr>

                            <tr>
                                <th class="col-5">Currency :</th>
                                <td class="col-7" >{{$order->currency}}</td>
                            </tr>
                            <tr>
                                <th class="col-5">Transaction Id :</th>
                                <td class="col-7" >{{$order->transaction_id}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center"> Customer Information</h4>
                    <hr >
                    <div class="table-responsive">
                        <table class="table table-striped border">
                            <thead class="text-center">
                            <th>Customer Name</th>
                            <th>Customer Phone No</th>
                            <th>Customer Email</th>
                            <th>Customer Address</th>
                            </thead>
                            <tbody class="text-center">
                            <td>{{$order->customer->name}}</td>
                            <td>{{$order->customer->mobile}}</td>
                            <td>{{$order->customer->email}}</td>
                            <td>{{$order->customer->address}}</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center"> Customer Information</h4>
                    <hr >
                    <div class="table-responsive">
                        <table class="table table-striped border">
                            <thead class="text-center">
                            <th>Sl</th>
                            <th>Product id</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Amount</th>
                            </thead>
                            @php($i=1)
                            @foreach($order->orderDetails as $orderDetail)

                            <tbody class="text-center">
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$orderDetail->product_id}}</td>
                                <td>{{$orderDetail->product_name}}</td>
                                <td>{{$orderDetail->product_price}}</td>
                                <td>{{$orderDetail->product_qty}}</td>
                                <td>{{$orderDetail->product_price*$orderDetail->product_qty}}</td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
