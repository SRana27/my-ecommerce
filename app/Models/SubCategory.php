<?php
namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    use HasFactory;

    private static $subcategory, $image, $imageName, $imageUrl, $directory, $status;

    public static function storeSubCategory($request)
    {
        if ($request->subcategory_id) {
            self::$subcategory = SubCategory::find($request->subcategory_id);
        } else {
            self::$subcategory = new SubCategory();
        }
        self::$subcategory->category_id = $request->category_id;
        self::$subcategory->name = $request->name;
        self::$subcategory->description = $request->description;
        if ($request->image) {
            if (file_exists(self::$subcategory->image)) {
                unlink(self::$subcategory->image);
            }

            self::$subcategory->image = self::saveImg($request);
        }

        self::$subcategory->status = $request->status;
        self::$subcategory->save();

    }

    private static function saveImg($request)
    {
        self::$image = $request->file('image');
        self::$imageName = 'subcategory-' . rand() . self::$image->getClientOriginalName();
        self::$directory = 'upload/subcategory-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;


    }

    public static function deleteSubcategory($request)
    {
        self::$subcategory = SubCategory::find($request->subcategory_id);
        if (self::$subcategory->image) {
            if (file_exists(self::$subcategory->image)) {
                unlink(self::$subcategory->image);
            }

        }
        self::$subcategory->delete();
    }

    public static function updateStatus($subcategory_id)
    {
        self::$status = SubCategory::find($subcategory_id);
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
