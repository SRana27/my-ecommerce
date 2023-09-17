@extends('admin.master')
@section('title')
    manage product
@endsection
@section('body')
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card ">
                <div class="card-body">
                    <h4 class="card-title text-center ">product Manage Table</h4>
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

                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Code</th>
                                <th>Amount Stock</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @php $i=1; @endphp
                                @foreach($products as $product)
                                    <td class="pt-5">{{$i++}}</td>
                                    <td class="pt-5">{{$product->name}}</td>
                                    <td class="pt-5">{{$product->category->name}}</td>
                                    <td class="pt-5">{{$product->code}}</td>
                                    <td class="pt-5">{{$product->stock_amount}}</td>

                                    <td><img src="{{asset($product->image)}}" alt="{{$product->name}}" height="80px"></td>
                                    <td class="pt-5">{{$product->status ==1 ?'Published': 'Unpublished'}}</td>
                                    <td class="d-flex ">
                                        <a href="{{route('detail.product',['product_id'=>$product->id])}}" class=" btn btn-success my-4 ">
                                            <i class="ti-eye"></i>
                                        </a>

                                        <a href="{{route('edit.product',['product_id'=>$product->id])}}" class=" btn btn-success mx-2 my-4 ">
                                            <i class="ti-pencil-alt"></i>
                                        </a>

                                        @if($product->status==1)
                                            <a href="{{route('status.product',['product_id'=>$product->id])}}" class=" btn btn-success  my-4 ">
                                                <i class="ti-lock"></i>
                                            </a>
                                        @else
                                            <a href="{{route('status.product',['product_id'=>$product->id])}}" class=" btn btn-danger  my-4 ">
                                                <i class="ti-unlock"></i>
                                            </a>
                                        @endif
                                        <form action="{{route('delete.product')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <button onclick="return confirm('are you sure for delete this product')" class=" btn btn-danger mx-2 my-4"><i class="ti-trash"></i></button>
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
