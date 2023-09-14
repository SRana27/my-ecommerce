<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category, $image, $imageName, $imageUrl, $directory, $status;

    public static function storeCategory($request)
    {
        if ($request->category_id) {
            self::$category = Category::find($request->category_id);
        } else {
            self::$category = new Category();
        }
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        if ($request->image) {
            if (file_exists(self::$category->image)) {
                unlink(self::$category->image);
            }

            self::$category->image = self::saveImg($request);
        }

        self::$category->status = $request->status;
        self::$category->save();

    }

    private static function saveImg($request)
    {
        self::$image = $request->file('image');
        self::$imageName = 'category-' . rand() . self::$image->getClientOriginalName();
        self::$directory = 'upload/category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;


    }

    public static function deletecategory($request)
    {
        self::$category = Category::find($request->category_id);
        if (self::$category->image) {
            if (file_exists(self::$category->image)) {
                unlink(self::$category->image);
            }

        }
        self::$category->delete();
    }

    public static function updateStatus($category_id){
        self::$status =Category::find($category_id);
        if (self::$status->status==1){
            self::$status->status=2;

        }
        else{
            self::$status->status=1;
        }
        self::$status->save();
    }
}
