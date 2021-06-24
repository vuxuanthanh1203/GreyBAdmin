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
               </li>
               <li class="dropdown notification-list">
                  <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                  <i class="mdi mdi-bell-outline noti-icon"></i>
                  <span class="badge badge-pink rounded-circle noti-icon-badge">4</span>
                  </a>
               </li>
               <li class="dropdown notification-list">
                  <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                  <img src="{{asset('storage/media/Users/'.session('ADMIN_AVT'))}}" alt="user-image" class="rounded-circle">
                  <span class="pro-user-name ml-1">
                  {{session('ADMIN_NAME')}} <i class="mdi mdi-chevron-down"></i>
                  </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                     <a href="{{url('admin/profile/manage_profile')}}/{{session('ADMIN_ID')}}" class="dropdown-item notify-item">
                     <i class="mdi mdi-account-outline"></i>
                     <span>Account</span>
                     </a>
                     <!-- item-->
                     <a href="{{url('admin/change_password')}}/{{session('ADMIN_ID')}}" class="dropdown-item notify-item">
                        <i class="mdi mdi-lock-outline"></i>
                        <span>Change Password</span>
                        </a>
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
               <a href="{{url('admin/dashboard')}}" class="logo text-center logo-light">
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
                  <div id="sidebar-menu">
                     <ul class="metismenu" id="side-menu">
                        <li class="menu-title">Navigation</li>
                        <li>
                           <a href="{{url('admin/dashboard')}}" class="waves-effect" aria-expanded="false">
                           <i class="ion-md-speedometer"></i>
                           <span> Dashboard </span>
                           </a>
                        </li>
                        <li>
                           <a href="{{url('admin/order')}}" class="waves-effect">
                              <i class="fas fa-shopping-cart"></i>
                           <span> Order </span>
                           </a>
                        </li>
                        <li>
                           <a href="javascript: void(0);" class="waves-effect">
                           <i class="fab fa-product-hunt"></i>
                           <span> Product</span>
                           <span class="menu-arrow"></span>
                           </a>
                           <ul class="nav-second-level" aria-expanded="false">
                              <li><a href="{{url('admin/product')}}">Product List</a></li>
                              <li><a href="{{url('admin/product/manage_product')}}">Add New Product</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="javascript: void(0);" class="waves-effect">
                           <i class="fas fa-bold"></i>
                           <span> Brand</span>
                           <span class="menu-arrow"></span>
                           </a>
                           <ul class="nav-second-level" aria-expanded="false">
                              <li><a href="{{url('admin/brand')}}">Brand List</a></li>
                              <li><a href="{{url('admin/brand/manage_brand')}}">Add New Brand</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="javascript: void(0);" class="waves-effect">
                           <i class="fas fa-list"></i>
                           <span> Category</span>
                           <span class="menu-arrow"></span>
                           </a>
                           <ul class="nav-second-level" aria-expanded="false">
                              <li><a href="{{url('admin/category')}}">Category List</a></li>
                              <li><a href="{{url('admin/category/manage_category')}}">Add New Category</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="javascript: void(0);" class="waves-effect">
                              <i class="fas fa-tags"></i>
                           <span> Coupon</span>
                           <span class="menu-arrow"></span>
                           </a>
                           <ul class="nav-second-level" aria-expanded="false">
                              <li><a href="{{url('admin/category')}}">Coupon List</a></li>
                              <li><a href="{{url('admin/coupon/manage_coupon')}}">Add New Coupon</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="javascript: void(0);" class="waves-effect">
                           <i class="fas fa-window-maximize"></i>
                           <span> Size</span>
                           <span class="menu-arrow"></span>
                           </a>
                           <ul class="nav-second-level" aria-expanded="false">
                              <li><a href="{{url('admin/size')}}">Size List</a></li>
                              <li><a href="{{url('admin/size/manage_size')}}">Add New Size</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="{{url('admin/customer')}}" class="waves-effect">
                           <i class="fas fa-users"></i>
                           <span> Customer </span>
                           </a>
                        </li>
                        <li>
                           <a href="{{url('admin/website')}}" class="waves-effect">
                           <i class="fas fa-pager"></i>
                           <span> Website </span>
                           </a>
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
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
      @if(Session::has('change'))
      <script>
         toastr.success("{!!Session::get('change')!!}");
      </script>
      @endif
      @error('category_slug')
      <script>
         toastr.error("The cateogry slug already exists");
      </script>
      @enderror
      @error('address')
      <script>
         toastr.error("The address already exists");
      </script>
      @enderror
      @error('attr_image.*')
      <script>
         toastr.error("The image must be a file of type: jpeg, jpg, png");
      </script>
      @enderror
      @error('images.*')
      <script>
         toastr.error("The image must be a file of type: jpeg, jpg, png");
      </script>
      @enderror
      @error('image')
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
      @error('name')
      <script>
         toastr.error("The Brand already exists");
      </script>
      @enderror
   </body>
</html>