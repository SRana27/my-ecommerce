@extends('admin.master')
@section('title')
manage Category
@endsection
@section('body')
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card ">
                <div class="card-body">
                    <h4 class="card-title text-center ">Category Manage Table</h4>
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
                                <th>Category description</th>
                                <th>Image</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @php $i=1; @endphp
                                @foreach($categories as $category)
                                  <td class="pt-5">{{$i++}}</td>
                                  <td class="pt-5">{{$category->name}}</td>
                                  <td class="pt-5">{{$category->description}}</td>
                                   <td><img src="{{asset($category->image)}}" alt="" height="80px"></td>
                                     <td class="pt-5">{{$category->status ==1 ?'Published': 'Unpublished'}}</td>
                                   <td class="d-flex ">
                                      <a href="{{route('edit.category',['category_id'=>$category->id])}}" class=" btn btn-success mx-2 my-4 ">
                                        <i class="ti-pencil-alt"></i>
                                     </a>
                                    @if($category->status==1)
                                      <a href="{{route('status.category',['category_id'=>$category->id])}}" class=" btn btn-success  my-4 ">
                                      <i class="ti-lock"></i>
                                    </a>
                                   @else
                                        <a href="{{route('status.category',['category_id'=>$category->id])}}" class=" btn btn-danger  my-4 ">
                                            <i class="ti-unlock"></i>
                                        </a>
                                    @endif
                                   <form action="{{route('delete.category')}}" method="post">
                                       @csrf
                                       <input type="hidden" name="category_id" value="{{$category->id}}">
                                       <button onclick="return confirm('are you sure for delete this category')" class=" btn btn-danger mx-2 my-4"><i class="ti-trash"></i></button>
                                       </a>
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
