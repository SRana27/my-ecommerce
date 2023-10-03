<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Session;

class CustomerOrderController extends Controller
{
    private $orders,$orderDetails;

    public function allOrder()
    {
        $this->orders =Order::where('customer_id',Session::get('customer_id'))->get();
        return view('customer.all-order',['orders'=>$this->orders

        ]);
    }

    public function allOrderDetail($order_id)

    {
        $this->orderDetails = OrderDetail::where('order_id',$order_id)->get();

        return view('customer.detail-order',['orderDetails'=>$this->orderDetails,
            'order'=> Order::find($order_id) ]);
    }
}
