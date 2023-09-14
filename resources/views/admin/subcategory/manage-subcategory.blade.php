@extends('admin.master')
@section('title')
    manage Sub category
@endsection
@section('body')
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card ">
                <div class="card-body">
                    <h4 class="card-title text-center ">Sub Category Manage Table</h4>
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
                                <th>Category Name</th>
                                <th> SubCategory Name</th>
                                <th>SubCategory description</th>
                                <th>Image</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                 @php $i=1; @endphp
                              @foreach($subcategories as $subcategory)
                                  <tr>

                                     <td class="pt-5">{{$i++}}</td>
                                     <td class="pt-5">{{$subcategory->category->name}}</td>
                                     <td class="pt-5">{{$subcategory->name}}</td>
                                     <td class="pt-5">{{$subcategory->description}}</td>
                                     <td><img src="{{asset($subcategory->image)}}" alt="{{$subcategory->name}}" height="80px"></td>
                                     <td class="pt-5">{{$subcategory->status==1?'Published':'Upublished'}}</td>
                                     <td class="d-flex ">
                                        <a href="{{route('edit.subcategory',['subcategory_id'=>$subcategory->id])}}" class=" btn btn-success mx-2 my-4 ">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        @if($subcategory->status==1)
                                            <a href="{{route('status.subcategory',['subcategory_id'=>$subcategory->id])}}" class=" btn btn-success  my-4 ">
                                                <i class="ti-lock"></i>
                                            </a>
                                        @else
                                            <a href="{{route('status.subcategory',['subcategory_id'=>$subcategory->id])}}" class=" btn btn-danger  my-4 ">
                                                <i class="ti-unlock"></i>
                                            </a>
                                        @endif
                                        <form action="{{route('delete.subcategory')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="subcategory_id" value="{{$subcategory->id}}">
                                            <button onclick="return confirm('are you sure for delete this subcategory')" class=" btn btn-danger mx-2 my-4"><i class="ti-trash"></i></button>

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




