@extends('admin.master')
@section('title')
    add subcategory
@endsection
@section('body')
    <div class="container-fluid">
        <div class="col-md-12 m-auto mt-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Add Sub-Category</h4>
                    <hr>
                    @if($message=Session::get('message'))

                        <div class="alert alert-success alert-dismissible fade show text-center">
                            {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lebel="close"></button>
                        </div>
                    @endif
                    <form class="form-horizontal p-t-20" method="post" action="{{route('update.subcategory')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="subcategory_id" value="{{$subcategory->id}}">
                        <div class="form-group row">
                            <label for="exampleInputuname2" class="col-sm-3 control-label">Category Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                {{--                                <input type="text" class="form-control" id="exampleInputuname3" name="name" placeholder="category name">--}}
                                <select name="category_id" class="form-control" id="exampleInputuname2">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $subcategory->category_id ? 'selected': ''}}>{{$category->name}} </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Sub-category Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputuname3" value="{{$subcategory->name}}" name="name" placeholder="Sub category name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Sub-Category Description<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleInputEmail3" name="description" placeholder="Sub Category description" cols="10" rows="5">{{$subcategory->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Category Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now"   class="dropify" name="image" />
                                <img src="{{asset($subcategory->image)}}" height="80px">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Publication status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio"  name="status" value="1" {{$subcategory->status==1?'checked':''}}> Published </label>
                                <label><input type="radio"  name="status" value="2"{{$subcategory->status==2?'checked':''}}> Unpublished </label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">update SubCategory</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
