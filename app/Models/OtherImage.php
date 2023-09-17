<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;
    private static $otherImage,$otherImages, $image, $imageName, $imageUrl, $directory,$imageExtension;




    private static function saveOtherImg($image)
    {
        self::$imageName = 'product-other-image-' . rand(). $image->getClientOriginalName() ;
        self::$directory = 'upload/product-other-images/';
         $image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }

    public static function storeOtherImage($images, $id)
    {
        foreach ($images as $image)
        {
            self::$otherImage                  = new OtherImage();
            self::$otherImage->product_id      =$id;
            self::$otherImage->image           =self::saveOtherImg($image);
            self::$otherImage-> save();

        }


    }
    public static function updateOtherImage($images,$id)
    {
        self::$otherImages =OtherImage::where('product_id',$id)->get();
        foreach (self::$otherImages as $image)
        {
            if (file_exists($image->image ))
            {
                unlink($image->image);
            }
            $image->delete();
            }
        self::storeOtherImage($images,$id);

    }




    public static function deleteOtherImage($request)
    {
        self::$otherImages = OtherImage::where('product_id',$request->product_id)->get();
        foreach (self::$otherImages as $image){
            if (file_exists($image->image)) {
                unlink($image->image);
            }
            $image->delete();
        }


    }



}
