
@extends('admin.master')
@section('title')
  Edit product
@endsection
@section('body')
    <div class="container-fluid">
        <div class="col-md-12 m-auto mt-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Edit  Product</h4>
                    <hr>
                    @if($message=Session::get('message'))

                        <div class="alert alert-success alert-dismissible fade show text-center">
                            {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lebel="close"></button>
                        </div>
                    @endif
                    <form class="form-horizontal p-t-20" method="post" action="{{route('update.product',['product_id'=>$product->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Category Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">

                                <select name="category_id" class="form-control" id="categoryId">
                                    <option value=" "disabled selected>--select category name--</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"{{$category->id==$product->category_id ? 'selected':''}}>{{$category->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for=" " class="col-sm-3 control-label">Sub Category Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">

                                <select name="subcategory_id" class="form-control" id="subCategoryId">
                                    <option value=" "disabled selected>--select sub category name--</option>
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}"{{$subcategory->id==$product->subcategory_id ? 'selected':''}}>{{$subcategory->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname2" class="col-sm-3 control-label">Brand Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">

                                <select name="brand_id" class="form-control" id="exampleInputuname2">
                                    <option value=" "disabled selected>--select brand name--</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}"{{$brand->id==$product->brand_id ? 'selected':''}}>{{$brand->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname2" class="col-sm-3 control-label">unit Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">

                                <select name="unit_id" class="form-control" id="exampleInputuname2">
                                    <option value=" "disabled selected>--select unit--</option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}"{{$unit->id==$product->unit_id ? 'selected':''}}>{{$unit->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ProductName" class="col-sm-3 control-label">Product Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ProductName" value="{{$product->name}}"  name="name" placeholder="product name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ProductCode" class="col-sm-3 control-label">Product Code <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ProductCode" value="{{$product->code}}"  name="code" placeholder="product code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Product Model <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputuname3" value="{{$product->model}}"  name="model" placeholder="product model">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ProductAmount" class="col-sm-3 control-label">Product Stock Amount <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ProductAmount" name="stock_amount" value="{{$product->stock_amount}}"  placeholder=" stock amount">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Product Price <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" value="{{$product->regular_price}}" name="regular_price" placeholder=" product regular price">
                                    <input type="number" class="form-control"  value="{{$product->selling_price}}" name="selling_price" placeholder=" product selling price">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Short Description<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleInputEmail3" name="short_description" placeholder="Product Short Description" cols="10" rows="5">{{$product->short_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail34" class="col-sm-3 control-label">Long Description<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control summernote " id="exampleInputEmail34" name="long_description" placeholder="Product long Description">{{$product->long_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Feature Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now"  class="dropify" name="image" accept="image/*"/>
                                <img src="{{asset($product->image)}}" alt="" height="100" width="120">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Other Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now"  class="dropify" name="other_image[]" multiple  accept="image/*"/>
                                @foreach($product->otherImage as $otherImage)
                                <img src="{{asset($otherImage->image)}}" alt="" height="100" width="120">
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Publication status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio"  name="status"  value="1" {{$product->status==1 ? 'checked':''}} checked> Published </label>
                                <label><input type="radio"  name="status" value="2"{{$product->status==2 ? 'checked':''}}> Unpublished </label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
