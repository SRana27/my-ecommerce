<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('admin.category.add-category');
    }
    public function manageCategory(){
        return view('admin.category.manage-category',[
            'categories'=>Category::all()
        ]);
    }

    public function saveCategory( Request $request){
;
        Category::storeCategory($request);
        return back()->with('message','successfully add category');
    }
    public function editCategory($category_id){
        return view('admin.category.edit-category',[
            'category'=>Category::find($category_id)
        ]);
    }

    public function updateCategory (Request $request){
        Category::storeCategory ($request);
        return redirect('/category/manage')->with('message','update category successfully');

    }
    public function deleteCategory (Request $request){

       Category::deletecategory ($request);
        return redirect('/category/manage')->with('message','delete category successfully');
    }

    public function statusCategory($category_id){
        Category::updateStatus($category_id);
        return redirect('/category/manage')->with('message','status update successfully');
    }
}
