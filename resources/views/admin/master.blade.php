<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
@include('admin.includes.style')
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>

<![endif]-->
</head>

<body class="skin-blue fixed-layout">

<!-- Preloader - style you can find in spinners.css -->

<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Elite admin</p>
    </div>
</div>

<!-- Main wrapper - style you can find in pages.scss -->

<div id="main-wrapper">
    <!-- Topbar header - style you can find in pages.scss -->
    <header class="topbar">
     @include('admin.includes.header')
    </header>
    <!-- End Topbar header -->

    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
      @include('admin.includes.sidebar')
        <!-- End Sidebar scroll-->
    </aside>
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->

    <!-- Page wrapper  -->
    <div class="page-wrapper">

        <!-- Container fluid  -->

        <div class="container-fluid">

            <!-- Bread crumb and right sidebar toggle -->
             @yield('body')
        <!-- Right sidebar -->
            <!-- .right-sidebar -->
{{--            <div class="right-sidebar">--}}
{{--                <div class="slimscrollright">--}}
{{--                    <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>--}}
{{--                    <div class="r-panel-body">--}}
{{--                        <ul id="themecolors" class="m-t-20">--}}
{{--                            <li><b>With Light sidebar</b></li>--}}
{{--                            <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>--}}
{{--                            <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>--}}
{{--                            <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>--}}
{{--                            <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>--}}
{{--                            <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>--}}
{{--                            <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>--}}
{{--                            <li class="d-block m-t-30"><b>With Dark sidebar</b></li>--}}
{{--                            <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>--}}
{{--                            <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>--}}
{{--                            <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>--}}
{{--                            <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>--}}
{{--                            <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>--}}
{{--                            <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>--}}
{{--                        </ul>--}}
{{--                        <ul class="m-t-20 chatonline">--}}
{{--                            <li><b>Chat option</b></li>--}}
{{--                            <li>--}}
{{--                                <a href="javascript:void(0)"><img src="{{asset('/')}}admin/assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="javascript:void(0)"><img src="{{asset('/')}}admin/assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="javascript:void(0)"><img src="{{asset('/')}}admin/assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="javascript:void(0)"><img src="{{asset('/')}}admin/assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="javascript:void(0)"><img src="{{asset('/')}}admin/assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="javascript:void(0)"><img src="{{asset('/')}}admin/assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="javascript:void(0)"><img src="{{asset('/')}}admin/assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="javascript:void(0)"><img src="{{asset('/')}}admin/assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <!-- End Right sidebar -->

        </div>

        <!-- End Container fluid  -->

    </div>

    <!-- End Page wrapper  -->


    <!-- footer -->
 <div class="" align="center">
    <footer class="footer">
        ©  2023 Design & Developed by
        <a href="https://www.egclbd.com/">gcl technology</a>
    </footer>
 </div>

    <!-- End footer -->

</div>

<!-- End Wrapper -->

@include('admin.includes.script')
</body>
</html>
