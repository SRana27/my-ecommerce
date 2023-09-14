@extends('admin.master')
@section('title')
  edit brand
@endsection
@section('body')
    <div class="container-fluid">
        <div class="col-md-12 m-auto mt-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Add Brand</h4>
                    <hr>
                    <form class="form-horizontal p-t-20" method="post" action="{{route('update.brand')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="brand_id" value="{{$brand->id}}">
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputuname3" name="name" value="{{$brand->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Category Description<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleInputEmail3" name="description"  cols="10" rows="5">{{$brand->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Brand Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now"  class="dropify" name="image" />
                                <img src="{{asset($brand->image)}}" alt="{{$brand->name}}" height="80">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Publication status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio"  name="status" value="1"{{$brand->status==1?'checked':''}}> Published </label>
                                <label><input type="radio"  name="status" value="2"{{$brand->status==2?'checked':''}}> Unpublished </label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">update Brand</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
