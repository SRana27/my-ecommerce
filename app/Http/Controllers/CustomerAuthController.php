<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;
use ShoppingCart;
use function Illuminate\Validation\passes;

class CustomerAuthController extends Controller
{
     private $customer;
    public function index()
    {
        return view('customer.index');
    }

    public function login(Request $request)
    {
        $this->customer = Customer::where('email', $request->email)->first();

        if ($this->customer) {
            if (password_verify($request->password,$this->customer->password))
            {
                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);
                 if(count(ShoppingCart::all())>0){
                     return redirect('/checkout');
                 }
                 else{
                     return redirect('/customer-dashboard');
                 }

            } else {
                return back()->with('message', 'invalid password');
            }
        } else {
            return back()->with('message', 'invalid email address');
        }

    }

    public function register(Request $request)
    {

        $this->validate ($request,[
            'email'=>'email|regex:/(.+)@(.+)\.(.+)/i|unique:customers,email',
            'mobile'=>'unique:customers,mobile',
        ]);
        Customer::newCustomer($request);
      return redirect('/customer-login')->with('message-1','registration successful you can login now');

    }

    public function success()
    {
      return redirect('/');
    }
    public function dashboard()
    {
      return view('customer.dashboard');
    }

    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');
        return redirect('/');
    }


    public function profile()
    {
        return view('customer.profile');
    }

    public function productInfo($product_id)
    {
        return view('website.detail.index',[
            'product'=>Product::find($product_id)]);
    }

}
