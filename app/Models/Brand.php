<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\String\s;

class Brand extends Model
{
    use HasFactory;

    private static $brand, $image, $imageName, $imageUrl, $directory, $status;

    public static function storeBrand($request)


    {
        if ($request->brand_id) {
            self::$brand = Brand::find($request->brand_id);//update
        } else {

            self::$brand = new Brand();

        }

        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        if ($request->image) {
            if (file_exists(self::$brand->image)) {
                unlink(self::$brand->image);
            }
            self::$brand->image = self::saveImage($request);
        }
        self::$brand->status = $request->status;
        self::$brand->save();

    }

    private static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageName = 'brand-' . rand() . self::$image->getClientOriginalName();
        self::$directory = 'upload/brand-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;

    }

    public static function deletebrand($request)
    {
        self::$brand = Brand::find($request->brand_id);
        if(self::$brand->image){
            if(file_exists(self::$brand->image)){
              unlink(self::$brand->image) ;
            }
        }
        self::$brand->delete();
    }

    public static function updateStatus($brand_id){
        self::$status =Brand::find($brand_id);
        if (self::$status->status==1){
            self::$status->status=2;

        }
        else{
            self::$status->status=1;
        }
        self::$status->save();
    }

}
