<?php

namespace App\Http\Controllers;
use ShoppingCart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $product;
    public function index(Request $request ,$product_id){
        $this->product=Product::find($product_id);
          ShoppingCart::add($this->product->id, $this->product->name, $request->qty, $this->product->selling_price,
            ['image' => $this->product->image,'sub_category'=>$this->product->subcategory->name,'brand'=> $this->product->brand->name]);
      return redirect('/show-cart');
    }
       public function show(){
//    return ShoppingCart::all();
    return view('website.cart.index',['cart_products'=>ShoppingCart::all()]);

      }
     public function remove($rowId){

    ShoppingCart::remove($rowId);
    return redirect('/show-cart')->with('message','Cart product remove successfully');
    }
    public function remove_from_header($rowId){

        ShoppingCart::remove($rowId);
        return redirect('/')->with('message','Cart product remove successfully ');
    }


    public function update(Request $request, $rowId){
//      return $request;
        ShoppingCart::update($rowId,$request->qty);
        return redirect('/show-cart')->with('message','Cart update quantity');
    }
}


