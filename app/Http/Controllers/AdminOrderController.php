<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function adminOrder()
    {
        return view('admin.order.manage',['orders' =>Order::orderBy('id','desc')->get()]);
    }

    public function detail($order_id)
    {
        return view('admin.order.detail-order',['order'=>Order::find($order_id)]);
    }
}
