<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use ShoppingCart;
use Session;

class CheckoutController extends Controller
{
    private $customer, $order, $orderDetail;

    public function index()
    {
        return view('website.checkout.index');
    }

    public function newCashOrder(Request $request)
    {
        $this->customer            = new Customer();
        $this->customer->name      =$request->name;
        $this->customer->email     =$request->email;
        $this->customer->mobile    =$request->mobile;
        $this->customer->password  =bcrypt($request->mobile);
        $this->customer->save();

        Session::put('customer_id',$this->customer->id );
        Session::put('customer_name',$this->customer->name);


        $this->order =new Order();
        $this->order->customer_id        = $this->customer->id;
        $this->order->order_date         = date('Y-m-d');
        $this->order->order_timestamp    = strtotime(date('Y-m-d'));
        $this->order->order_total        =Session::get('order_total');
        $this->order->tax_total          =Session::get('tax_total');
        $this->order->shipping_total     =Session::get('shipping_total');
        $this->order->delivery_address   =$request->delivery_address;
        $this->order->payment_type       = $request->payment_type;
        $this->order->save();

        foreach (ShoppingCart::all() as $item)
        {
            $this->orderDetail = new OrderDetail();
            $this->orderDetail->order_id            =$this->order->id;
            $this->orderDetail->product_id          =$item->id;
            $this->orderDetail->product_name        =$item->name;
            $this->orderDetail->product_price       =$item->price;
            $this->orderDetail->product_qty         =$item->qty;
            $this->orderDetail->save();

            ShoppingCart::remove($item->__raw_id);

        }

      return redirect('/complete-order')->with('message','Congratulation ........ your order placed');

    }
    public function completeOrder()
    {
      return view('website.checkout.complete-order') ;
    }


}

