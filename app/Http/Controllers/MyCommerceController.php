<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class MyCommerceController extends Controller
{
    private $catCount;
    public function index()
    {
        return view('website.home.index', [
//            'categories' => Category::all(),
//        'subcategories'=>SubCategory::orderBy('id','desc')->take('6')->get(['id','subcategory_id']),
            'products' => Product::orderBy('id', 'desc')->take('8')->get(['id', 'category_id', 'subcategory_id', 'name', 'selling_price', 'image'])
        ]);

    }

    public function category($category_id)
    {
        return view('website.category.index', [
            'categories' => Category::all(),
            'brands'=>Brand::all(),
            'products' => Product::where('category_id', $category_id)->orderBy('id', 'desc')->get()
        ]);

    }


    public function sub_category($subcategory_id)
    {

        return view('website.subcategory.index', [
            'categories' => Category::all(),
            'brands'=>Brand::all(),
            'products' => Product::where('subcategory_id', $subcategory_id)->orderBy('id', 'desc')->get()
        ]);
    }
    public function brand($brand_id)
    {

        return view('website.brand.index', [
            'categories' => Category::all(),
            'brands'=>Brand::all(),
            'products' => Product::where('brand_id',$brand_id)->orderBy('id', 'desc')->get()
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
