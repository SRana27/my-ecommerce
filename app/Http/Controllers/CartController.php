<?php

namespace App\Http\Controllers;
use ShoppingCart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $product;
    public function index(Request $request){
      $product_id=$request->input('product_id');
      $qty=$request->input('qty');

        $this->product=Product::find($product_id);
          ShoppingCart::add($this->product->id, $this->product->name, $qty, $this->product->selling_price,
            ['image' => $this->product->image,'sub_category'=>$this->product->subcategory->name,'brand'=> $this->product->brand->name]);
      // return redirect('/show-cart');
    }
       public function show(){
    return view('website.cart.index',['cart_products'=>ShoppingCart::all()]);

      }
     public function remove($rowId){

    ShoppingCart::remove($rowId);
    if(count(ShoppingCart::all())!=0){
        return back()->with('message','Cart product remove successfully');
    }
    else{

        return redirect('/');
    }

    }


    public function update(Request $request, $rowId){
        ShoppingCart::update($rowId,$request->qty);

        if($request->qty)
        return redirect('/show-cart')->with('message','update quantity in cart');
    }
}


