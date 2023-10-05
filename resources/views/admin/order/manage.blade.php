@extends('admin.master')
@section('title')
    manage Order
@endsection
@section('body')
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card ">
                <div class="card-body">
                    <h4 class="card-title text-center ">Order Manage Table</h4>
                    <hr>
                    @if($message=Session::get('message'))

                        <div class="alert alert-success alert-dismissible fade show text-center">
                            {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lebel="close"></button>
                        </div>
                    @endif
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr class="text-center">
                                <th>Sl No</th>
                                <th>Order No</th>
                                <th>Order Date</th>
                                <th>Customer Info</th>
                                <th>Order Status</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1; @endphp
                            @foreach($orders as $order)

                                <tr>
                                    <td class="pt-5">{{$i++}}</td>
                                    <td class="pt-5">{{$order->id}}</td>
                                    <td class="pt-5">{{$order->order_date}}</td>
                                    <td class="pt-5">{{$order->customer->name .'('.$order->customer->mobile.')'}}</td>
                                    <td class="pt-5">{{$order->order_status}}</td>
                                    <td class="pt-5">{{$order->payment_status}}</td>
                                    <td class="d-flex ">
                                        <a href="{{route('detail.admin.order',['order_id'=>$order->id])}}"
                                           class=" btn btn-info my-4" title="View Order Detail">
                                            <i class="ti-eye"></i>
                                        </a>
                                        <a href="{{route('edit.admin.order',['order_id'=>$order->id])}}"
                                           class=" btn btn-primary  mx-2 my-4" title="Edit Order">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        <a href="{{route('viewInvoice.admin.order',['order_id'=>$order->id])}}"
                                           class=" btn btn-success my-4" title="View Order Invoice">
                                            <i class="ti-write"></i>
                                        </a>
                                        <a href="{{route('printInvoice.admin.order',['order_id'=>$order->id])}}" target="_blank"
                                           class=" btn btn-success mx-2 my-4" title="Print Order Invoice">
                                            <i class="ti-printer"></i>
                                        </a>
                                        <form action="{{route('delete.admin.order')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="order_id" value="{{$order->id}}">
                                            <button onclick="return confirm('are you sure for delete this category')"
                                                    class=" btn btn-danger my-4" title="Delete Order">
                                                <i class="ti-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
