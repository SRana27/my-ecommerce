<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   private $product;
    public function addProduct(){
        return view('admin.product.add-product',
            [   'categories'    =>Category::all(),
                'subcategories' =>SubCategory::all(),
                'brands'        =>Brand::all(),
                'units'         =>Unit::all()
        ]);


    }

    public function getSubcategoryByCategory(){

        return response()->json(SubCategory::where('category_id', $_GET['id'])->get());
    }


    public function manageProduct(){
        return view('admin.product.manage-product',[
            'products'=>Product::all()
        ]);
    }

    public function saveProduct( Request $request)
    {

       $this->product = Product::storeProduct($request);
        OtherImage::storeOtherImage($request->other_image, $this->product->id);
        return back()->with('message','successfully add product');
    }


    public function editProduct($product_id)
     {
        return view('admin.product.edit-product',[
            'categories'    =>Category::all(),
            'subcategories' =>SubCategory::all(),
            'brands'        =>Brand::all(),
            'units'         =>Unit::all(),
            'product'=>Product::find($product_id)
        ]);
     }

      public function detailProduct($product_id)
       {
           return view('admin.product.detail-product',[
               'categories'    =>Category::all(),
               'subcategories' =>SubCategory::all(),
               'brands'        =>Brand::all(),
               'units'         =>Unit::all(),
               'product'=>Product::find($product_id)
           ]);

       }

       public function updateProduct (Request $request)
        {
                Product::storeProduct ($request);

                if($request->other_image)
                {
                  OtherImage::updateOtherImage($request->other_image,$request->product_id);
                 }

           return redirect('/product/manage')->with('message','update product successfully');

        }


        public function deleteProduct (Request $request)
        {
             OtherImage::deleteOtherImage($request);
             Product::deleteProduct ($request);
          return redirect('/product/manage')->with('message','delete product successfully');
        }


     public function statusProduct($product_id)
     {
        Product::updateStatus($product_id);
        return redirect('/product/manage')->with('message','status update successfully');
     }
}
