<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Guzzlehttp;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class MyCommerceController extends Controller
{
    public function index()
    {
//        $client = new \GuzzleHttp\Client();
//        $url ='https://fakestoreapi.com/products?limit=6';
//        $products_request = $client->get($url);
//        $product_response=json_decode( $products_request->getBody(),true);
//        $api_products= $product_response;
        $categories = Category::all();
        $brands= Brand::all();
        $products =Product::orderBy('id', 'desc')->take('8')->get(['id', 'category_id', 'subcategory_id', 'name', 'selling_price','regular_price', 'image']);
        return view('website.home.index',compact('categories','products','brands'));//'api_products'
    }

    public function category($category_id)
    {
        return view('website.category.index', [
            'categories' => Category::all(),
            'brands'=>Brand::all(),
            'products' => Product::where('category_id', $category_id)->orderBy('id', 'desc')->paginate(3),
            'category'=>Category::find( $category_id),
        ]);

    }


    public function sub_category($subcategory_id)
    {

        return view('website.subcategory.index', [
            'categories' => Category::all(),
            'brands'=>Brand::all(),
            'subcategory'=>SubCategory::find($subcategory_id),
            'products' => Product::where('subcategory_id', $subcategory_id)->orderBy('id', 'desc')->paginate(3),
        ]);
    }
    public function brand($brand_id)
    {

        return view('website.brand.index', [
            'categories' => Category::all(),
            'brands'=>Brand::all(),
            'brand'=>Brand::find($brand_id),
            'products' => Product::where('brand_id',$brand_id)->orderBy('id', 'desc')->paginate(3)
        ]);
    }

    public function detail($product_id)
    {
        return view('website.detail.index', [
            'product' => Product::find($product_id),
        ]);
    }

    public function contact()
    {
        return view('website.contact.contact_us');
    }


    public function search(Request $request)

    {
        if($request->searchproduct)
        {

          $products =Product::where('name','LIKE','%'.$request->searchproduct.'%')->orderBy('id','desc')->paginate(3)->withQueryString();


       }else
          {
           if($request->subcategory != 0){
            $products=Product::where('subcategory_id',$request->subcategory)->where('name','LIKE','%'.$request->product.'%');
            $products=$products->orderBy('id','desc')->paginate(1)->withQueryString();

            }
             else{

                $products=Product::where('name','LIKE','%'.$request->product.'%')->orderBy('id','desc')->paginate(3)->withQueryString();
            }

            }

            if($request->subcategory !=0 && $request->product!=''){

                $related_Products=Product::where('subcategory_id',$request->subcategory)->orderBy('id','asc')->take('3')->get();
            }else{
                $related_Products=[];

            }
        return view('website.search.search', [
            'categories' => Category::all(),
            'brands'=>Brand::all(),
            'products'=> $products,
            'related_Products'=> $related_Products,
        ]);


    }

    public function productList()
    {
        $products= Product::select('name')->get();

        $data=[];

        foreach($products as $product){
            $data[]=$product['name'];
        }

     return $data;
    }


    public function subcategoryWiseProductList()
    {
              if($_GET['id']==0) {

                  $products=Product::select('name')->where('status',1)->get() ;
              } else{

                  $products=Product::where('subcategory_id',$_GET['id'])->select('name')->where('status', 1)->get();
              }

        $data =[];
        foreach ($products as $product)
        {
            $data[]=$product['name'];
        }

        return $data;


    }

}
