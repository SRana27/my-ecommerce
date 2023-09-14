<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use function Nette\Utils\data;

class BrandController extends Controller
{
    public function addBrand(){
        return view('admin.brand.add-brand');
    }

    public function saveBrand( Request $request){

        Brand::storeBrand($request);
        return back()->with('message','successfully add brand');
    }

    public function manageBrand(){
        return view('admin.brand.manage-brand',[
            'brands'=>Brand::all()
        ]);
    }
    public function editBrand($brand_id){
        return view('admin.brand.edit-brand',[
            'brand'=> Brand::find($brand_id)
        ]);

    }

    public function updateBrand(Request $request){
        Brand::storeBrand($request);
        return redirect('/brand/manage')->with('message','brand update successfully');
    }

    public function deleteBrand(Request $request){
        Brand::deletebrand($request);
        return redirect('/brand/manage')->with('message',' brand delete successfully');
    }

    public static function statusBrand($brand_id){
        Brand::updateStatus($brand_id);
        return redirect('/brand/manage')->with('message',' status update successfully');

    }
}
