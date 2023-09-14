@extends('admin.master')
@section('title')
    manage brand
@endsection
@section('body')
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card ">
                <div class="card-body">
                    <h4 class="card-title text-center ">Brand Manage Table</h4>
                    <hr>
                    @if($message=Session::get('message'))

                        <div class="alert alert-success alert-dismissible fade show text-center">
                            {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lebel="close"></button>
                        </div>
                    @endif
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr class="text-center">
                                <th>sl</th>
                                <th>Brand Name</th>
                                <th>Brand description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i=1; @endphp
                            @foreach($brands as $brand)
                                 <tr>

                                    <td class="pt-5">{{$i++}}</td>
                                    <td class="pt-5">{{$brand->name}}</td>
                                    <td class="pt-5">{{$brand->description}}</td>
                                    <td><img src="{{asset($brand->image)}}" alt="{{$brand->name}}" height="80px"></td>
                                    <td class="pt-5">{{$brand->status ==1 ?'Published': 'Unpublished'}}</td>
                                    <td class="d-flex ">
                                        <a href="{{route('edit.brand',['brand_id'=>$brand->id])}}" class=" btn btn-success mx-2 my-4 ">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        @if($brand->status==1)
                                            <a href="{{route('status.brand',['brand_id'=>$brand->id])}}" class=" btn btn-success  my-4 ">
                                                <i class="ti-lock"></i>
                                            </a>
                                        @else
                                            <a href="{{route('status.brand',['brand_id'=>$brand->id])}}" class=" btn btn-danger  my-4 ">
                                                <i class="ti-unlock"></i>
                                            </a>
                                        @endif
                                        <form action="{{route('delete.brand')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="brand_id" value="{{$brand->id}}">
                                            <button onclick="return confirm('are you sure for delete this category')" class=" btn btn-danger mx-2 my-4"><i class="ti-trash"></i></button>
                                        </form>
                                    </td>
                                 </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
