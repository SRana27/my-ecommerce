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
    private $customer, $order;

    public function index()

    {
        if(Session::get('customer_id'))
        {
        $this->customer=Customer::find(Session::get('customer_id'));
        }
        else
            {
            $this->customer='';
           }

        return view('website.checkout.index',['customer'=>$this->customer]);
    }

    public function newCashOrder(Request $request)
    {
        if(Session::get('customer_id'))
        {
            $this->customer=Customer::find(Session::get('customer_id'));
        }
        else
        {
            $this->validate ($request,[
                'email'=>'unique:customers,email',
                'mobile'=>'unique:customers,mobile',
            ]);
            $this->customer =Customer::newCustomer($request);
            Session::put('customer_id',$this->customer->id );
            Session::put('customer_name',$this->customer->name);
        }

        $this->order=Order::newOrder($request,$this->customer->id );
        OrderDetail::newOrderDetail( $this->order->id);
        return redirect('/complete-order')->with('message','Congratulation ........ your order placed');

    }
    public function completeOrder()
    {
      return view('website.checkout.complete-order') ;
    }


}

