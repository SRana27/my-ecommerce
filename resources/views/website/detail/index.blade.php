@extends('website.master')
@section('title')
    Product details
@endsection
@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Product details</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('product-category',['category_id'=>$product->category->id])}}">{{$product->category->name}}</a></li>
                        <li><a href="{{route('product-subcategory',['subcategory_id'=>$product->subcategory->id])}}">{{$product->subcategory->name}}</a></li>
                        <li><a href="{{route('product-brand',['brand_id'=>$product->brand->id])}}">{{$product->brand->name}}</a></li>
                        <li>{{$product->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="item-details section">
        <div class="container">
            <div class="top-area" id="detail_info">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12 col-12">
                        <div class="xzoom-container">
                            <img class="xzoom" id="xzoom-default" src="{{asset($product->image)}}" xoriginal="{{asset($product->image)}}"/>
                            <div class="xzoom-thumbs pt-2">
                                @foreach($product->otherImage as $otherImage)
                                    <a href="{{asset($otherImage->image)}}"><img class="xzoom-gallery" width="80" height="70" src="{{asset($otherImage->image)}}" xpreview="{{asset($otherImage->image)}}"></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{$product->name}}</h2>
                            <p class="category"><i class="lni lni-tag"></i> Category:<a href="">
                                    {{$product->category->name}}
                                </a></p>
                            <p class="category"><i class="lni lni-tag"></i> Brand:<a href="">
                                    {{$product->brand->name}}
                                </a></p>
                                <p class="category"> Model:
                                    {{$product->model}}
                                </p>
                                <p style="font-size:16px;">
                                     
                                @if($product->stock_amount>0)
                                 
                                    <label class="badge bg-success">In a stock</label>
                                 @else     
                                 <label class="badge bg-danger">Out of stock</label> 
                                 @endif                             
                                </p>
                            <h3 ><span style="color:#f85606; font-size: 30px; font-family:bold" >&#2547; {{$product->selling_price}}</span>&nbsp;
                                @if($product->regular_price!=null)
                                <del style="color:#808080; font-size: 25px; font-family:bold" >&#2547; {{$product->regular_price}}</del></h3>
                                @endif
                            <p class="info-text">{{$product->short_description}}</p>

                            {{-- <form action="{{route('add-to-cart',['product_id'=>$product->id])}}" method="post">
                                @csrf --}}
                                <input type="hidden" id="pId" value="{{$product->id}}">
                        
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group quantity">
                                            <label for="Qty">Quantity</label>
                                            <input class="input-group  form-control" id="inputQty" type="number" name="qty" min="1"
                                                   value="1">
                                        </div>
                                    </div>
                                </div>

                                <div class="bottom-content">
                                    <div class="row align-items-end">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="wish-button">
                                                @if($product->stock_amount>0)
                                                <button
                                                    class="btn"  id="addToCart" style="width: 100%;" ><i class="lni lni-cart" ></i> Add to
                                                    Cart
                                                </button>
                                                @else
                                                <button
                                                    class="btn"  id="addTo" style="width: 100%;" ><i class="lni lni-cart" ></i> Add to
                                                    Cart
                                                </button>
                                                @endif
                                               
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="wish-button">
                                                <button class="btn"><i class="lni lni-heart"></i> To Wishlist</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-12">
                            <div class="info-body custom-responsive-margin">
                                <h4>Details</h4>
                                <p>{!! $product->long_description !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="single-block give-review">
                                <h4>4.5 (Overall)</h4>
                                <ul>
                                    <li>
                                        <span>5 stars - 38</span>
                                        <i class="lni lni-star-filled"></i>
                                        <i class="lni lni-star-filled"></i>
                                        <i class="lni lni-star-filled"></i>
                                        <i class="lni lni-star-filled"></i>
                                        <i class="lni lni-star-filled"></i>
                                    </li>
                                    <li>
                                        <span>4 stars - 10</span>
                                        <i class="lni lni-star-filled"></i>
                                        <i class="lni lni-star-filled"></i>
                                        <i class="lni lni-star-filled"></i>
                                        <i class="lni lni-star-filled"></i>
                                        <i class="lni lni-star"></i>
                                    </li>
                                    <li>
                                        <span>3 stars - 3</span>
                                        <i class="lni lni-star-filled"></i>
                                        <i class="lni lni-star-filled"></i>
                                        <i class="lni lni-star-filled"></i>
                                        <i class="lni lni-star"></i>
                                        <i class="lni lni-star"></i>
                                    </li>
                                    <li>
                                        <span>2 stars - 1</span>
                                        <i class="lni lni-star-filled"></i>
                                        <i class="lni lni-star-filled"></i>
                                        <i class="lni lni-star"></i>
                                        <i class="lni lni-star"></i>
                                        <i class="lni lni-star"></i>
                                    </li>
                                    <li>
                                        <span>1 star - 0</span>
                                        <i class="lni lni-star-filled"></i>
                                        <i class="lni lni-star"></i>
                                        <i class="lni lni-star"></i>
                                        <i class="lni lni-star"></i>
                                        <i class="lni lni-star"></i>
                                    </li>
                                </ul>

                                <button type="button" class="btn review-btn" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                    Leave a Review
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="single-block">
                                <div class="reviews">
                                    <h4 class="title">Latest Reviews</h4>

                                    <div class="single-review">
                                        <img src="{{asset('/')}}website/assets/images/blog/comment1.jpg" alt="#">
                                        <div class="review-info">
                                            <h4>Awesome quality for the price
                                                <span>Jacob Hammond</span>
                                            </h4>
                                            <ul class="stars">
                                                <li><i class="lni lni-star-filled"></i></li>
                                                <li><i class="lni lni-star-filled"></i></li>
                                                <li><i class="lni lni-star-filled"></i></li>
                                                <li><i class="lni lni-star-filled"></i></li>
                                                <li><i class="lni lni-star-filled"></i></li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor...
                                            </p>
                                        </div>
                                    </div>
                                    <div class="single-review">
                                        <img src="{{asset('/')}}website/assets/images/blog/comment2.jpg" alt="#">
                                        <div class="review-info">
                                            <h4>My husband love his new...
                                                <span>Alex Jaza</span>
                                            </h4>
                                            <ul class="stars">
                                                <li><i class="lni lni-star-filled"></i></li>
                                                <li><i class="lni lni-star-filled"></i></li>
                                                <li><i class="lni lni-star-filled"></i></li>
                                                <li><i class="lni lni-star-filled"></i></li>
                                                <li><i class="lni lni-star"></i></li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor...
                                            </p>
                                        </div>
                                    </div>
                                    <div class="single-review">
                                        <img src="{{asset('/')}}website/assets/images/blog/comment3.jpg" alt="#">
                                        <div class="review-info">
                                            <h4>I love the built quality...
                                                <span>Jacob Hammond</span>
                                            </h4>
                                            <ul class="stars">
                                                <li><i class="lni lni-star-filled"></i></li>
                                                <li><i class="lni lni-star-filled"></i></li>
                                                <li><i class="lni lni-star-filled"></i></li>
                                                <li><i class="lni lni-star-filled"></i></li>
                                                <li><i class="lni lni-star-filled"></i></li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <section>
       <div class="modal fade review-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Leave a Review</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                  <div class="modal-body">
                       <div class="row">
                           <div class="col-sm-6">
                               <div class="form-group">
                                <label for="review-name">Your Name</label>
                               <input class="form-control" type="text" id="review-name" required>
                          </div>
                           </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="review-email">Your Email</label>
                                    <input class="form-control" type="email" id="review-email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="review-subject">Subject</label>
                                    <input class="form-control" type="text" id="review-subject" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="review-rating">Rating</label>
                                    <select class="form-control" id="review-rating">
                                        <option>5 Stars</option>
                                        <option>4 Stars</option>
                                        <option>3 Stars</option>
                                        <option>2 Stars</option>
                                        <option>1 Star</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="review-message">Review</label>
                            <textarea class="form-control" id="review-message" rows="8" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer button">
                        <button type="button" class="btn">Submit Review</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

