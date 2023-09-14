<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyCommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',[MyCommerceController::class,'index'])->name('home');
Route::get('/contact-us',[MyCommerceController::class,'contact'])->name('contact-us');
Route::get('/product-category',[MyCommerceController::class,'category'])->name('product-category');
Route::get('/product-detail',[MyCommerceController::class,'detail'])->name('product-detail');
Route::get('/cart',[CartController::class,'index'])->name('shop-cart');
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/category/add',[CategoryController::class,'addCategory'])->name('add.category');
    Route::get('/category/manage',[CategoryController::class,'manageCategory'])->name('manage.category');
    Route::post('/category/new',[CategoryController::class,'saveCategory'])->name('new.category');
    Route::get('/category/edit/{category_id}',[CategoryController::class,'editCategory'])->name('edit.category');
    Route::post('/category/update',[CategoryController::class,'updateCategory'])->name('update.category');
    Route::post('/category/delete',[CategoryController::class,'deleteCategory'])->name('delete.category');
    Route::get('/category/status/{category_id}',[CategoryController::class,'statusCategory'])->name('status.category');

    Route::get('/subcategory/add',[SubCategoryController::class,'addSubcategory'])->name('add.subcategory');
    Route::get('/subcategory/manage',[SubCategoryController::class,'manageSubcategory'])->name('manage.subcategory');
    Route::post('/subcategory/new',[SubCategoryController::class,'saveSubCategory'])->name('new.subcategory');
    Route::get('/subcategory/edit/{subcategory_id}',[SubCategoryController::class,'editSubCategory'])->name('edit.subcategory');
    Route::post('/subcategory/update',[SubCategoryController::class,'updateSubCategory'])->name('update.subcategory');
    Route::post('/subcategory/delete',[SubCategoryController::class,'deleteSubCategory'])->name('delete.subcategory');
    Route::get('/subcategory/status/{subcategory_id}',[SubCategoryController::class,'statusSubCategory'])->name('status.subcategory');

    Route::get('/brand/add',[BrandController::class,'addBrand'])->name('add.brand');
    Route::get('/brand/manage',[BrandController::class,'manageBrand'])->name('manage.brand');
    Route::post('/brand/new',[BrandController::class,'saveBrand'])->name('new.brand');
    Route::get('/brand/edit/{brand_id}',[BrandController::class,'editBrand'])->name('edit.brand');
    Route::post('/brand/update',[BrandController::class,'updateBrand'])->name('update.brand');
    Route::post('/brand/delete',[BrandController::class,'deleteBrand'])->name('delete.brand');
    Route::get('/brand/status/{brand_id}',[BrandController::class,'statusBrand'])->name('status.brand');

    Route::get('/unit/add',[UnitController::class,'addUnit'])->name('add.unit');
    Route::get('/unit/manage',[UnitController::class,'manageUnit'])->name('manage.unit');
    Route::post('/unit/new',[UnitController::class,'saveUnit'])->name('new.unit');
    Route::get('/unit/edit/{unit_id}',[UnitController::class,'editUnit'])->name('edit.unit');
    Route::post('/unit/update',[UnitController::class,'updateUnit'])->name('update.unit');
    Route::post('/unit/delete',[UnitController::class,'deleteUnit'])->name('delete.unit');
    Route::get('/unit/status/{unit_id}',[UnitController::class,'statusUnit'])->name('status.unit');


    Route::get('/product/add',[ProductController::class,'addProduct'])->name('add.product');
    Route::get('/product/get-subcategory-by-category',[ProductController::class,'getSubcategoryByCategory'])->name('get-subcategory-by-category.product');
    Route::get('/product/manage',[ProductController::class,'manageProduct'])->name('manage.product');
    Route::post('/product/new',[ProductController::class,'saveProduct'])->name('new.product');
    Route::get('/product/edit/{product_id}',[ProductController::class,'editProduct'])->name('edit.product');
    Route::post('/product/update',[ProductController::class,'updateProduct'])->name('update.product');
    Route::post('/product/delete',[ProductController::class,'deleteProduct'])->name('delete.product');
    Route::get('/product/status/{product_id}',[ProductController::class,'statusProduct'])->name('status.product');
});

