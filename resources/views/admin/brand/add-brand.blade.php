@extends('admin.master')
@section('title')
    add Brand
@endsection
@section('body')
    <div class="container-fluid">
        <div class="col-md-12 m-auto mt-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Add Brand</h4>
                    <hr>
                    @if($message=Session::get('message'))

                        <div class="alert alert-success alert-dismissible fade show text-center">
                            {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lebel="close"></button>
                        </div>
                    @endif
                    <form class="form-horizontal p-t-20" method="post" action="{{route('new.brand')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Brand Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputuname3" required name="name" placeholder="brand name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Brand Description<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleInputEmail3" required name="description" placeholder=" brand description" cols="10" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Brand Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now"  class="dropify" required name="image" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Publication status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio"  name="status" value="1" checked> Published </label>
                                <label><input type="radio"  name="status" value="2"> Unpublished </label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create New Brand</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
