<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;



class MyCommerceController extends Controller
{

    public function index()
    {
        $client = new GuzzleHttp\Client();
        $url ='https://fakestoreapi.com/products?limit=6';
        $products_request = $client->get($url);
        $product_response=json_decode( $products_request->getBody(),true);
        $api_products= $product_response;
        $categories = Category::all();
        $products =Product::orderBy('id', 'desc')->take('8')->get(['id', 'category_id', 'subcategory_id', 'name', 'selling_price', 'image']);
        return view('website.home.index',compact('api_products','categories','products'));
//            ,[
//            'categories' => Category::all(),
//        'subcategories'=>SubCategory::orderBy('id','desc')->take('6')->get(['id','subcategory_id']),
//            'products' => Product::orderBy('id', 'desc')->take('8')->get(['id', 'category_id', 'subcategory_id', 'name', 'selling_price', 'image'])
//       ]);

    }

    public function category($category_id)
    {
        return view('website.category.index', [
            'categories' => Category::all(),
            'brands'=>Brand::all(),
            'products' => Product::where('category_id', $category_id)->orderBy('id', 'desc')->paginate(3),
        ]);

    }


    public function sub_category($subcategory_id)
    {

        return view('website.subcategory.index', [
            'categories' => Category::all(),
            'brands'=>Brand::all(),
            'products' => Product::where('subcategory_id', $subcategory_id)->orderBy('id', 'desc')->paginate(1),
        ]);
    }
    public function brand($brand_id)
    {

        return view('website.brand.index', [
            'categories' => Category::all(),
            'brands'=>Brand::all(),
            'products' => Product::where('brand_id',$brand_id)->orderBy('id', 'desc')->paginate(1)
        ]);
    }

    public function detail($product_id)
    {
        return view('website.detail.index', [
            'product' => Product::find($product_id)
        ]);
    }

    public function contact()
    {
        return view('website.contact.contact_us');
    }

}
