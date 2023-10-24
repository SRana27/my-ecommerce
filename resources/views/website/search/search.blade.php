@extends('website.master')
@section('title')
    Product category
@endsection
@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Search Product Result</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="product-grids section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">

                    <div class="product-sidebar">

                        <div class="single-widget search">
                            <h3>Search Product</h3>
                            <form action="{{route('search')}}" method="get">
                                <input type="text"  name="searchproduct" placeholder="Search Here..."  required value="{{request()->input('searchproduct')}}">
                                <button type="submit"><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div>
                        <div class="single-widget">
                            <h3 class="text-center">All Categories</h3>

                            @foreach($categories as $category)
                                @php
                                    $catProductCount=\App\Models\Product::catProductCount($category->id)
                                @endphp
                                <ul class="list">

                                    <li><a href="{{route('product-category',['category_id'=>$category->id])}}">{{$category->name}} <small>({{$catProductCount}})</small></a>

                                    </li>
                                </ul>

                            @endforeach
                        </div>


                        <div class="single-widget range">
                            <h3>Price Range</h3>
                            <input type="range" class="form-range" name="range" step="1" min="100" max="10000"
                                   value="10" onchange="rangePrimary.value=value">
                            <div class="range-inner">
                                <label>$</label>
                                <input type="text" id="rangePrimary" placeholder="100"/>
                            </div>
                        </div>


                        <div class="single-widget condition">
                            <h3>Filter by Price</h3>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                                <label class="form-check-label" for="flexCheckDefault1">
                                    $50 - $100L (208)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                                <label class="form-check-label" for="flexCheckDefault2">
                                    $100L - $500 (311)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                <label class="form-check-label" for="flexCheckDefault3">
                                    $500 - $1,000 (485)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                                <label class="form-check-label" for="flexCheckDefault4">
                                    $1,000 - $5,000 (213)
                                </label>
                            </div>
                        </div>

                        <div class="single-widget condition">
                            <h3>Filter by Brand</h3>
                            @foreach($brands as $brand)
                                @php
                                    $brandProductCount=\App\Models\Product::brandProductCount($brand->id)
                                @endphp
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
                                    <label class="form-check-label" for="flexCheckDefault11">
                                        <ul class="list">

                                            <li><a href="{{route('product-brand',['brand_id'=>$brand->id])}}">{{$brand->name}}<small> ({{$brandProductCount}})</small></a>

                                            </li>
                                        </ul>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-8 col-12">
                                    <div class="product-sorting">
                                        <label for="sorting">Sort by:</label>
                                        <select class="form-control" id="sorting">
                                            <option>Popularity</option>
                                            <option>Low - High Price</option>
                                            <option>High - Low Price</option>
                                            <option>Average Rating</option>
                                            <option>A - Z Order</option>
                                            <option>Z - A Order</option>
                                        </select>
                                        <h3 class="total-show-product">Showing: <span>{{count($products)}} items</span></h3>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-4 col-12">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-grid" type="button" role="tab"
                                                    aria-controls="nav-grid" aria-selected="true"><i
                                                    class="lni lni-grid-alt"></i></button>
                                            <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-list" type="button" role="tab"
                                                    aria-controls="nav-list" aria-selected="false"><i
                                                    class="lni lni-list"></i></button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                                 aria-labelledby="nav-grid-tab">
                                <div class="row">
                                    @if(count($products)>0)
                                        @foreach($products as $product)
                                            <div class="col-lg-4 col-md-6 col-12">

                                                <div class="single-product">
                                                    <div class="product-image">
                                                        <img src="{{asset($product->image)}}" alt="" height="180"
                                                             width="150">
                                                        <div class="button">
                                                            <a href="{{route('product-detail',['product_id'=>$product->id])}}"
                                                               class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <span class="category">{{$product->category->name}}</span>
                                                        <div class="title" style="height: 70px;">
                                                            <a href="{{route('product-detail',['product_id'=>$product->id])}}">{{$product->name}}</a>
                                                        </div>
                                                        <div class="" style="height: 20px;">
                                                            <ul class="review">
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star"></i></li>
                                                                <li><span>4.0 Review(s)</span></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price">
                                                            <span>BDT. {{$product->selling_price}}</span>
                                                        </div>
                                                        <div class="pt-2">
                                                            <a href="{{route('product-detail',['product_id'=>$product->id])}}"
                                                               class="btn btn-info col-md-12 hover">Buy now </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="mt-5 text-center">Sorry ! product not found </p>
                                    @endif
                                </div>
                                <div class="row ">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">   {{$products->links()}}</div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        @if(count($products)>0)
                                            @foreach($products as $product)
                                                <div class="single-product">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-4 col-md-4 col-12">
                                                            <div class="product-image">
                                                                <img src="{{asset($product->image)}}" alt=""
                                                                     height="180"
                                                                     width="150">
                                                                <div class="button">
                                                                    <a href="{{route('product-detail',['product_id'=>$product->id])}}"
                                                                       class="btn"><i
                                                                            class="lni lni-cart"></i> Add to
                                                                        Cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-12">
                                                            <div class="product-info">
                                                                <span
                                                                    class="category">{{$product->category->name}}</span>
                                                                <h4 class="title">
                                                                    <a href="{{route('product-detail',['product_id'=>$product->id])}}">{{$product->name}}</a>
                                                                </h4>
                                                                <ul class="review">
                                                                    <li><i class="lni lni-star-filled"></i></li>
                                                                    <li><i class="lni lni-star-filled"></i></li>
                                                                    <li><i class="lni lni-star-filled"></i></li>
                                                                    <li><i class="lni lni-star-filled"></i></li>
                                                                    <li><i class="lni lni-star"></i></li>
                                                                    <li><span>4.0 Review(s)</span></li>
                                                                </ul>
                                                                <div class="price">
                                                                    <span>BDT. {{$product->selling_price}}</span>
                                                                </div>
                                                                <div class="pt-2">
                                                                    <a href="{{route('product-detail',['product_id'=>$product->id])}}"
                                                                       class="btn btn-info col-md-12 hover">Buy now </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="mt-5 text-center">Sorry ! product not found</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">   {{$products->links()}}</div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
