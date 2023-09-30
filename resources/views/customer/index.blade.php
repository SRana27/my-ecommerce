@extends('website.master')
@section('title')
 Login & register
@endsection
@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Login & Register</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('home')}}">Shop</a></li>
                        <li>Login & Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            @if($message=Session::get('message-1'))

                <div class="alert alert-success alert-dismissible fade show text-center">
                    {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lebel="close"></button>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Login Form</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-danger text-center">{{Session('message')}}</p>
                            <form action="{{route('customer.login')}}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-md-3">Email Address:</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Password:</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-success" value="login">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>




                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Registration  Form</h3>
                        </div>
                        <div class="card-body">

                            <form action="{{route('customer.register')}}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-md-3">Full Name :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Email Address :</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email" required>
                                        <span class="text-danger">{{$errors->has('email') ? $errors->first('email'): ' '}}</span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Password :</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Phone Number :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="mobile" required>
                                        <span class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile'): ' '}}</span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Address : </label>
                                    <div class="col-md-9">
                                        <textarea type="text" class="form-control" name="address"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-success" value="register" >
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
