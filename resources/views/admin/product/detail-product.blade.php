
@extends('admin.master')
@section('title')
    Details product
@endsection
@section('body')
    <div class="row">
        <div class="col-12 mt-2 mx-auto">
            <div class="card ">
                <div class="card-body">
                    <h4 class="card-title text-center ">Product details</h4>
                     <hr>
                    <div class="table-responsive m-t-40 ">
                        <table class="table table-striped border ">
                            <tr>
                                <th class="col-3 " >Product Id :</th>
                                <td class="col-8" >{{$product->id}}</td>
                            </tr>

                            <tr>
                                <th class="col-3">Product Name :</th>
                                <td class="col-8" >{{$product->name}}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Category :</th>
                                <td class="col-8" > {{$product->category->name}}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Sub Category :</th>
                                <td class="col-8" >{{$product->subcategory->name}}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Brand :</th>
                                <td class="col-8" >{{$product->brand->name}}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Unit :</th>
                                <td class="col-8" >{{$product->unit->name}}</td>
                            </tr>
                            <tr >
                                <th class="col-3">Product Code :</th>
                                <td class="col-8" >{{$product->code}}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Product Model :</th>
                                <td class="col-8" >{{$product->model}}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Stock Amount :</th>
                                <td class="col-8" >{{$product->stock_amount}}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Product Regular Price :</th>
                                <td class="col-8" >{{$product->regular_price}}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Product Selling Price :</th>
                                <td class="col-8" >{{$product->selling_price}}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Product short Description  :</th>
                                <td class="col-8" >{{$product->short_description}}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Product long Description :</th>
                                <td class="col-8" class="col-8">{!! $product->long_description !!}</td>
{{--                                <td class="col-8" class="col-8">{{$product->long_description}}</td>--}}
                            </tr>

                            <tr>
                                <th class="col-3">Image :</th>
                                <td class="col-8" ><img src="{{asset($product->image)}}" alt="" title="product-{{$product->id}}-image" height="100" width="120"></td>
                            </tr>

                            <tr>
                                <th class="col-3"> Other Image :</th>
                                <td class="col-8" >
                                    @foreach($product->otherImage as $image)
                                    <img src="{{asset($image->image)}}" alt="" title="product-{{$product->id}}-other-image" height="100" width="120">
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th class="col-3">Hit Count :</th>
                                <td class="col-8" >{{$product->hit_count}}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Sales Count :</th>
                                <td class="col-8" >{{$product->sales_count}}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Feature Status:</th>
                                <td class="col-8" >{{$product->feature_status ==1 ? 'featured' : 'not featured'}}</td>
                            </tr>
                            <tr>
                                <th class="col-3">Publication Status :</th>
                                <td class="col-8" >{{$product->status ==1 ? 'published' : 'unpublished'}} </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
