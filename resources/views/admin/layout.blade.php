<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Greyb | Admin - @yield('page_title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin_assets/images/greyb.png')}}">

    <!-- Plugins css-->
    <link href="{{asset('admin_assets\libs\datatables\dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin_assets\libs\datatables\buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin_assets\libs\datatables\responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin_assets\libs\datatables\select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- App css -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/custom.css')}}">
    <link href="{{asset('admin_assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
    <link href="{{asset('admin_assets\css\icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin_assets\css\app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">

</head>
<body class="">
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-email-outline noti-icon"></i>
                        <span class="badge badge-purple rounded-circle noti-icon-badge">3</span>
                    </a>
                    {{-- <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="font-16 m-0">
                                <span class="float-right">
                                    <a href="" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                </span>Chat
                            </h5>
                        </div>

                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 314px;">
                            <div class="slimscroll noti-scroll" style="overflow: hidden; width: auto; height: 314px;">

                                <div class="inbox-widget">
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{asset('admin_assets\images\users\avatar-1.jpg')}}" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Cristina Pride</p>
                                            <p class="inbox-item-text text-truncate">Hi, How are you? What about our
                                                next meeting</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{asset('admin_assets\images\users\avatar-2.jpg')}}" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Sam Garret</p>
                                            <p class="inbox-item-text text-truncate">Yeah everything is fine</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{asset('admin_assets\images\users\avatar-3.jpg')}}" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Karen Robinson</p>
                                            <p class="inbox-item-text text-truncate">Wow that's great</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{asset('admin_assets\images\users\avatar-4.jpg')}}" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Sherry Marshall</p>
                                            <p class="inbox-item-text text-truncate">Hi, How are you? What about our
                                                next meeting</p>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="{{asset('admin_assets\images\users\avatar-5.jpg')}}" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Shawn Millard</p>
                                            <p class="inbox-item-text text-truncate">Yeah everything is fine</p>

                                        </div>
                                    </a>
                                </div> <!-- end inbox-widget -->

                            </div>
                            <div class="slimScrollBar" style="background: rgb(158, 165, 171); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px;">
                            </div>
                            <div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                            </div>
                        </div>
                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                            View all
                            <i class="fi-arrow-right"></i>
                        </a>

                    </div> --}}
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-bell-outline noti-icon"></i>
                        <span class="badge badge-pink rounded-circle noti-icon-badge">4</span>
                    </a>
                    {{-- <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="font-16 m-0">
                                <span class="float-right">
                                    <a href="" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                </span>Notification
                            </h5>
                        </div>

                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 314px;">
                            <div class="slimscroll noti-scroll" style="overflow: hidden; width: auto; height: 314px;">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <i class="mdi mdi-comment-account-outline text-info"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="noti-time">1 min ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon text-success">
                                        <i class="mdi mdi-account-plus text-primary"></i>
                                    </div>
                                    <p class="notify-details">New user registered.
                                        <small class="noti-time">5 hours ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon text-danger">
                                        <i class="mdi mdi-heart text-danger"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked
                                        <small class="noti-time">3 days ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon text-warning">
                                        <i class="mdi mdi-comment-account-outline text-primary"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admi
                                        <small class="noti-time">4 days ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon text-purple">
                                        <i class="mdi mdi-account-plus text-danger"></i>
                                    </div>
                                    <p class="notify-details">New user registered.
                                        <small class="noti-time">7 days ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon text-danger">
                                        <i class="mdi mdi-heart text-danger"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked <b>Admin</b>.
                                        <small class="noti-time">Carlos Crouch liked</small>
                                    </p>
                                </a>
                            </div>
                            <div class="slimScrollBar" style="background: rgb(158, 165, 171); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px;">
                            </div>
                            <div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                            </div>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center notify-item notify-all">
                            See all notifications
                        </a>

                    </div> --}}
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{asset('admin_assets\images\Thanh.png')}}" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                           {{session('ADMIN_NAME')}} <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                        <a href="profile.html" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-outline"></i>
                            <span>Account</span>
                        </a>
                        <!-- item-->
                        <!-- item-->
                        <a href="{{url('admin/logout')}}" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="dashboard" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <div class="logo-name">
                            <img src="{{asset('admin_assets/images/logo.png')}}" alt="" width="50">
                            <h3 class="name-store">GreyB</h3>
                        </div>
                    </span>
                    <span class="logo-sm">
                        <img src="{{asset('admin_assets/images/greyb.png')}}" alt="" height="22">
                    </span>
                </a>
            </div>
            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
            </ul>
            <!-- LOGO -->
        </div>
        <!-- end Topbar -->
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 310px;">
                <div class="slimscroll-menu" style="overflow: hidden; width: auto; height: 310px;">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="mm-active">
                        <ul class="metismenu mm-show" id="side-menu">
                            <li class="menu-title">Navigation</li>
                            <li class="">
                                <a href="{{url('admin/dashboard')}}" class="waves-effect" aria-expanded="false">
                                    <i class="ion-md-speedometer"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            <li class="">
                                <a href="javascript: void(0);" class="waves-effect" aria-expanded="false">
                                    <i class="ion-md-basket"></i>
                                    <span> Orders </span>
                                    {{-- <span class="badge badge-danger badge-pill float-right"> 8 </span> --}}
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level mm-collapse" aria-expanded="false" style="height: 0px;">
                                    <li><a href="orders.html">Chờ Duyệt <span class="badge badge-danger badge-pill float-right"> 8 </span></a></li>
                                    <li><a href="orders.html">Thành Công</a></li>
                                    <li><a href="orders.html">Thất Bại</a></li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="javascript: void(0);" class="waves-effect" aria-expanded="false">
                                    <i class="ion-ios-list"></i>
                                    <span> Product Management</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level mm-collapse" aria-expanded="false" style="height: 0px;">
                                    <li><a href="{{url('admin/product')}}">Product</a></li>
                                    <li><a href="{{url('admin/category')}}">Category</a></li>
                                    <li><a href="{{url('admin/coupon')}}">Coupon</a></li>
                                    <li><a href="{{url('admin/size')}}">Size</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- End Sidebar -->
                    <div class="clearfix"></div>
                </div>
                <div class="slimScrollBar" style="background: rgb(158, 165, 171); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 310px;">
                </div>
                <div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                </div>
            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">

            @section('container')
            @show    

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            GROUP4 - WD06 <a href="https://vtc.edu.vn/">- VTC Academy</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Vendor js -->
    <script src="{{asset('admin_assets\js\vendor.min.js')}}"></script>
    <script src="{{asset('admin_assets\js\app.min.js')}}"></script>
    <!-- App js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js"></script>
    <script src="{{asset('admin_assets/js/charts.js')}}"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <!-- Required datatable js -->
    <script src="{{asset('admin_assets\libs\datatables\jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin_assets\libs\datatables\dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{asset('admin_assets\libs\datatables\dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin_assets\libs\datatables\buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin_assets\libs\datatables\buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin_assets\libs\datatables\buttons.print.min.js')}}"></script>

    <!-- Responsive examples -->
    <script src="{{asset('admin_assets\libs\datatables\dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin_assets\libs\datatables\responsive.bootstrap4.min.js')}}"></script>

    <script src="{{asset('admin_assets\libs\datatables\dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('admin_assets\libs\datatables\dataTables.select.min.js')}}"></script>

    <!-- Datatables init -->
    <script src="{{asset('admin_assets\js\pages\datatables.init.js')}}"></script>

    <!-- Toastr init -->
    <script src="{{asset('admin_assets/libs/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/pages/toastr.init.js')}}"></script>
    <script src="{{asset('admin_assets/js/main.js')}}"></script>    
    
    @if(Session::has('message'))
        <script>
            toastr.success("{!!Session::get('message')!!}");
        </script>
    @endif

    @if(Session::has('error'))
        <script>
            toastr.error("{!!Session::get('error')!!}");
        </script>
    @endif

    @error('category_slug')
        <script>
            toastr.error("The cateogry slug already exists");
        </script>
    @enderror

    @error('attr_image.*')
        <script>
            toastr.error("The image must be a file of type: jpeg, jpg, png");
        </script>
    @enderror

    @error('code')
        <script>
            toastr.error("The Code already exists");
        </script>
    @enderror

    @error('size')
        <script>
            toastr.error("The Size already exists");
        </script>
    @enderror

</body>

</html>