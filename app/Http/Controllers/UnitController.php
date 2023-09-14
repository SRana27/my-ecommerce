<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function addUnit(){
        return view('admin.unit.add-unit');
    }

    public function saveUnit( Request $request){
        Unit::storeUnit($request);
        return back()->with('message','successfully add brand');
    }

    public function manageUnit(){
        return view('admin.unit.manage-unit',[
            'units'=>Unit::all()
        ]);
    }
    public function editUnit($unit_id){
        return view('admin.unit.edit-unit',[
            'unit'=> Unit::find($unit_id)
        ]);

    }

    public function updateUnit(Request $request){
        Unit::storeUnit($request);
        return redirect('/unit/manage')->with('message','unit update successfully');
    }

    public function deleteUnit(Request $request){
        Unit::deleteUnit($request);
        return redirect('/unit/manage')->with('message',' unit delete successfully');
    }

    public static function statusUnit($unit_id){
        Unit::updateStatus($unit_id);
        return redirect('/unit/manage')->with('message',' status update successfully');

    }
}
