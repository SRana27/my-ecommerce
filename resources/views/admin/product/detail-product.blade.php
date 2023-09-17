
@extends('admin.master')
@section('title')
    details product
@endsection
@section('body')
    <div class="row">
        <div class="col-12 mt-2 mx-auto">
            <div class="card ">
                <div class="card-body">
                    <h4 class="card-title text-center ">product details</h4>
                    <hr>

                    <div class="table-responsive m-t-40 ">
                        <table class="table table-striped border ">
                            <tr>
                                <th >Product Id :</th>

                                <td class="text-center">{{$product->id}}</td>
                            </tr>

                            <tr>
                                <th>Product Name:</th>

                                <td class="text-center">{{$product->name}}</td>
                            </tr>
                            <tr>
                                <th>Category :</th>
                                <td class="text-center"> {{$product->category->name}}</td>
                            </tr>
                            <tr>
                                <th>Sub Category :</th>
                                <td class="text-center">{{$product->subcategory->name}}</td>
                            </tr>
                            <tr>
                                <th>Brand :</th>
                                <td class="text-center">{{$product->brand->name}}</td>
                            </tr>
                            <tr>
                                <th>Unit :</th>
                                <td class="text-center">{{$product->unit->name}}</td>
                            </tr>
                            <tr >
                                <th>Product Code :</th>
                                <td class="text-center">{{$product->code}}</td>
                            </tr>
                            <tr>
                                <th>Product Model:</th>
                                <td class="text-center">{{$product->model}}</td>
                            </tr>
                            <tr>
                                <th>Stock Amount :</th>
                                <td class="text-center">{{$product->stock_amount}}</td>
                            </tr>
                            <tr>
                                <th>Product Regular Price :</th>
                                <td class="text-center">{{$product->regular_price}}</td>
                            </tr>
                            <tr>
                                <th>Product Selling Price :</th>
                                <td class="text-center">{{$product->selling_price}}</td>
                            </tr>
                            <tr>
                                <th>Product short Description:</th>
                                <td class="text-center">{{$product->short_description}}</td>
                            </tr>
                            <tr>
                                <th>Product long Description :</th>
                                <td >{{$product->long_description}}</td>
                            </tr>

                            <tr>
                                <th>Image :</th>
                                <td class="text-center"><img src="{{asset($product->image)}}" alt="" title="product-{{$product->id}}-image" height="100" width="120"></td>
                            </tr>

                            <tr>
                                <th> Other Image :</th>
                                <td class="text-center">
                                    @foreach($product->otherImage as $image)
                                    <img src="{{asset($image->image)}}" alt="" title="product-{{$product->id}}-other-image" height="100" width="120">
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Hit Count :</th>
                                <td class="text-center">{{$product->hit_count}}</td>
                            </tr>
                            <tr>
                                <th>Sales Count :</th>
                                <td class="text-center">{{$product->sales_count}}</td>
                            </tr>
                            <tr>
                                <th>Feature Status:</th>
                                <td class="text-center">{{$product->feature_status ==1 ? 'featured' : 'not featured'}}</td>
                            </tr>
                            <tr>
                                <th>Publication Status :</th>
                                <td class="text-center">{{$product->status ==1 ? 'published' : 'unpublished'}} </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
