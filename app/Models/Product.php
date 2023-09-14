<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $product, $image, $imageName, $imageUrl, $directory, $status;

    public static function storeProduct($request)
    {
        if ($request->product_id) {
            self::$product = Product::find($request->product_id);
        } else {
            self::$product = new Product();
        }
        self::$product->category_id           = $request->category_id;
        self::$product->subcategory_id        = $request->subcategory_id;
        self::$product->brand_id              = $request->brand_id;
        self::$product->unit_id               = $request->unit_id;
        self::$product->name                  = $request->name;
        self::$product->code                  = $request->code;
        self::$product->model                 = $request->model;
        self::$product->stock_amount          = $request->stock_amount;
        self::$product->regular_price         = $request->regular_price;
        self::$product->selling_price         = $request->selling_price;
        self::$product->short_description     = $request->short_description;
        self::$product->long_description      = $request->long_description;
        if ($request->image) {
            if (file_exists(self::$product->image)) {
                unlink(self::$product->image);
            }
            self::$product->image = self::saveImg($request);
        }
        self::$product->status = $request->status;
        self::$product->save();
        return self::$product;

    }

    private static function saveImg($request)
    {
        self::$image = $request->file('image');
        self::$imageName = 'product-' . rand() . self::$image->getClientOriginalName();
        self::$directory = 'upload/product-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;


    }

    public static function deleteSubcategory($request)
    {
        self::$product = Product::find($request->product_id);
        if (self::$product->image) {
            if (file_exists(self::$product->image)) {
                unlink(self::$product->image);
            }

        }
        self::$product->delete();
    }

    public static function updateStatus($product_id)
    {
        self::$status = Product::find($product_id);
        if (self::$status->status == 1) {
            self::$status->status = 2;

        } else {
            self::$status->status = 1;
        }
        self::$status->save();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
