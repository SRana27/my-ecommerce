<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    private static $unit, $status;

    public static function storeUnit($request)

    {
        if ($request->unit_id) {
            self::$unit = Unit::find($request->unit_id);//update
        } else {

            self::$unit = new unit();
        }

        self::$unit->name = $request->name;
        self::$unit->code =$request->code;
        self::$unit->description = $request->description;
        self::$unit->status = $request->status;
        self::$unit->save();

    }


    public static function deleteUnit($request)
    {
        self::$unit = Unit::find($request->unit_id);
        self::$unit->delete();
    }

    public static function updateStatus($unit_id){
        self::$status =Unit::find($unit_id);
        if (self::$status->status==1){
            self::$status->status=2;

        }
        else{
            self::$status->status=1;
        }
        self::$status->save();
    }
}
