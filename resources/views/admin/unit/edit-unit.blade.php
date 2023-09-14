@extends('admin.master')
@section('title')
    edit Unit
@endsection
@section('body')
    <div class="container-fluid">
        <div class="col-md-12 m-auto mt-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Edit Unit</h4>
                    <hr>
                    <form class="form-horizontal p-t-20" method="post" action="{{route('update.unit',['unit_id'=>$unit->id])}}" enctype="multipart/form-data">
                        @csrf
{{--                        <input type="hidden" name="unit_id" value="{{$unit->id}}">--}}
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Unit Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputuname3" name="name" value="{{$unit->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Unit Code <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputuname3" name="code" value="{{$unit->code}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Unit Description<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleInputEmail3" name="description"  cols="10" rows="5">{{$unit->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Publication status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio"  name="status" value="1"{{$unit->status==1?'checked':''}}> Published </label>
                                <label><input type="radio"  name="status" value="2"{{$unit->status==2?'checked':''}}> Unpublished </label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">update Unit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
