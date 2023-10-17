<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index()
    {
        $product=Product::latest()->get();

        return response()->json($product);
    }

    public function show($id)
    {
        $product=Product::find($id);

        if(!$product)
        {
            return response()->json([
                'success'=>'false',
                'message'=> 'data not found',
            ]);
        }
        return response()->json([
            'success'=>'true',
            'data'=>$product,
        ]);

    }
      public function destroy($id)
      {
        $product=Product::find($id);

        if(!$product)
        {
            return response()->json([
                'success'=>'false',
                'message'=> 'data cannot deleted because data not found ',
            ]);
        }
         $product->delete();
        return response()->json([
            'success'=>'true',
            'message'=>'product delete successfully',
        ]);

    }
}
