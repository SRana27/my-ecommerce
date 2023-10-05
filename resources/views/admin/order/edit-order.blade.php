@extends('admin.master')
@section('title')
    Edit Order
@endsection
@section('body')
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card ">
                <div class="card-body">
                    <h4 class="card-title text-center "> Edit Order Table</h4>
                    <hr>
                    @if($message=Session::get('message'))

                        <div class="alert alert-success alert-dismissible fade show text-center">
                            {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lebel="close"></button>
                        </div>
                    @endif
                    <form action="{{route('update.admin.order',['order_id'=>$order->id])}}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-md-3">Customer Info</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control"  value="{{$order->customer->name .' '.'(Mobile No -'.' ' .$order->customer->mobile.')'}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Order Id</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" readonly value="{{$order->id}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Order Total (TK)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="order_total" readonly  value="{{$order->order_total}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Order Status</label>
                            <div class="col-md-9">
                                <select class="form-control" name="order_status">
                                    <option value="Pending"{{$order->order_status== 'Pending' ?'selected':' '}}>Pending</option>
                                    <option value="Processing"{{$order->order_status== 'Processing' ?'selected':' '}}>Processing</option>
                                    <option value="Complete"{{$order->order_status== 'Complete' ?'selected':' '}}>Complete</option>
                                    <option value="Cancel"{{$order->order_status== 'Cancel' ?'selected':' '}}>Cancel</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Delivery Address</label>
                            <div class="col-md-9">
                                <textarea type="text" class="form-control" name="delivery_address">{{$order->delivery_address}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3 ">
                            <div class=" col-md-3"></div>
                            <div class=" col-md-9">
                                <input type="submit" class="btn btn-success w-50" value="update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
