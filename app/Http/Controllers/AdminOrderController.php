<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use PDF;
class AdminOrderController extends Controller
{
     private $order,$orderDetail;
    public function adminOrder()
    {
        return view('admin.order.manage',['orders' =>Order::orderBy('id','desc')->get()]);
    }

    public function detail($order_id)
    {
        return view('admin.order.detail-order',['order'=>Order::find($order_id)]);
    }

    public function edit($order_id)
    {
        return view('admin.order.edit-order',['order'=>Order::find($order_id)]);
    }

    public function update(Request $request)
    {
        $this->order=Order::find($request->order_id);

        if($request->order_status =='Pending')
        {
            $this->order->order_status = $request->order_status;
            $this->order->delivery_address = $request->delivery_address;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
            $this->order->save();
        }
        if($request->order_status=='Processing') {

            $this->order->order_status = $request->order_status;
            $this->order->delivery_address = $request->delivery_address;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
            $this->order->save();
        }
        if($request->order_status=='Complete') {
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
            $this->order->save();
        }

        if($request->order_status=='Cancel') {
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
            $this->order->save();

        }
        return redirect('/admin/order')->with('message', 'order status info update successfully');
    }

    public function viewInvoice($order_id)
    {
        return view('admin.order.invoice',[
            'order'=>Order::find($order_id)
        ]);
    }
    public function printInvoice($order_id)
    {
        $pdf= PDF::loadview('admin.order.print-invoice',['order'=>Order::find($order_id)]);
        return $pdf->stream($order_id.'-order.pdf');
    }

      public function delete(Request $request)
      {   $this->order =Order::find($request->order_id);

      if($this->order->order_status=='Cancel')
        {
          $this->order=Order::find($request->order_id);
          $this->order->delete();
          OrderDetail::deleteOrder($request);
          return back()->with('message','order delete successfully');
        }
        return back()->with('message','Sorry order can not be delete ');
      }
}
