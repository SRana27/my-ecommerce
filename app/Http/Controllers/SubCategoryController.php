<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;


class SubCategoryController extends Controller
{
    public function addSubCategory(){
        return view('admin.subcategory.add-subcategory',['categories'=>Category::all()]);
    }
    public function manageSubCategory(){
        return view('admin.subcategory.manage-subcategory',[
            'subcategories'=>SubCategory::all()
        ]);
    }

    public function saveSubCategory( Request $request){
        SubCategory::storeSubCategory($request);
        return back()->with('message','successfully add subcategory');
    }
    public function editSubCategory($subcategory_id){
        return view('admin.subcategory.edit-subcategory',[
            'categories'=>Category::all(),
            'subcategory'=>SubCategory::find($subcategory_id)
        ]);
    }

    public function updateSubCategory (Request $request){
        SubCategory::storeSubCategory ($request);
        return redirect('/subcategory/manage')->with('message','update subcategory successfully');

    }
    public function deleteSubCategory (Request $request){

        SubCategory::deleteSubcategory ($request);
        return redirect('/subcategory/manage')->with('message','delete subcategory successfully');
    }

    public function statusSubCategory($subcategory_id){
        SubCategory::updateStatus($subcategory_id);
        return redirect('/subcategory/manage')->with('message','status update successfully');
    }
}
