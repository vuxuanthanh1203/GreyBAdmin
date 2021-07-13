<!DOCTYPE html>
<html lang="zxx">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>GREY.B - @yield('page_title')</title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="{{asset('admin_assets/images/greyb.png')}}">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/jquery-ui.min.css')}}">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/venobox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/jquery.lineProgressbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/aos.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}">
    

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/sass/style.css')}}">

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/plugins.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('assets/css/nouislider.css')}}"> --}}
    
</head>

<body class="productPage">
    <!-- Start Header Area -->
    <header class="header-section d-none d-xl-block">
        <div class="header-wrapper">
            <div class="header-bottom header-bottom-color--golden section-fluid sticky-header sticky-color--golden">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <!-- Start Header Logo -->
                            <div class="header-logo">
                                <div class="logo">
                                    <a href="{{url('/')}}"><img src="{{asset('assets/images/logo/logo.png')}}" alt=""></a>
                                </div>
                            </div>
                            <!-- End Header Logo -->

                            <!-- Start Header Main Menu -->
                            <div class="main-menu menu-color--black menu-hover-color--golden">
                                <nav>
                                    <ul>
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li class="has-dropdown">
                                            <a href="{{url('category/sneakers')}}" class="desktop-link">Sneakers <i class="fa fa-angle-down"></i></a>
                                            <!-- Sub Menu -->
                                            <ul class="sub-menu">
                                                <li><a href="{{url('brand/converse')}}">Converse</a></li>
                                                <li><a href="{{url('brand/vans')}}">Vans</a></li>
                                                <li><a href="{{url('brand/puma')}}">Puma</a></li>
                                                <li><a href="{{url('brand/fila')}}">Fila</a></li>
                                            </ul>
                                        </li>
                                        
                                        <li><a href="{{url('category/backpacks')}}">Backpacks</a></li>
                                        <li><a href="{{url('category/tshirt')}}">Tshirt</a></li>
                                        <li><a href="{{url('category/accessories')}}">Accessories</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- End Header Main Menu Start -->

                            <!-- Start Header Action Link -->
                            <ul class="header-action-link action-color--black action-hover-color--golden">
                                <li>
                                    {{-- <a href="#offcanvas-wishlish" class="offcanvas-toggle"> --}}
                                    <a href="#" class="">
                                        <i class="icon-heart"></i>
                                        <span class="item-count">0</span>
                                    </a>
                                </li>
                                @php
                                $getAddToCartTotalItem=getAddToCartTotalItem();
                                $totalCartItem=count($getAddToCartTotalItem);
                                $totalPrice=0;
                                @endphp
                                <li>
                                    <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                        <i class="icon-bag"></i>
                                        <span class="item-count">{{$totalCartItem}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#search">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                @if(session()->has('FRONT_USER_LOGIN') != null)
                                <li style="margin-left:5px;">
                                    <a href="{{url('/my_account')}}/{{session('FRONT_USER_ID')}}">
                                        <i class="icon-user"></i>
                                    </a>
                                </li>
                                @else
                                <li style="margin-left:5px;">
                                    <a href="{{url('/login')}}">
                                        <i class="icon-user"></i>
                                    </a>
                                </li>
                                @endif
                            </ul>
                            <!-- End Header Action Link -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Start Header Area -->

    <!-- Start Mobile Header -->
    <div class="mobile-header mobile-header-bg-color--golden section-fluid d-lg-block d-xl-none">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <!-- Start Mobile Left Side -->
                    <div class="mobile-header-left">
                        <ul class="mobile-menu-logo">
                            <li>
                                <a href="{{url('/')}}">
                                    <div class="logo">
                                        <img src="{{asset('assets/images/logo/logo.png')}}" alt="">
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Mobile Left Side -->

                    <!-- Start Mobile Right Side -->
                    <div class="mobile-right-side">
                        <ul class="header-action-link action-color--black action-hover-color--golden">
                            <li>
                                <a href="#search">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                    <i class="icon-heart"></i>
                                    <span class="item-count">3</span>
                                </a>
                            </li>
                            @php
                            $getAddToCartTotalItem=getAddToCartTotalItem();
                            $totalCartItem=count($getAddToCartTotalItem);
                            $totalPrice=0;
                            @endphp
                            <li>
                                <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                    <i class="icon-bag"></i>
                                    <span class="item-count">{{$totalCartItem}}</span>
                                </a>
                            </li>
                            @if(session()->has('FRONT_USER_LOGIN') != null)
                                <li style="margin-left:5px;">
                                    <a href="{{url('/my_account')}}/{{session('FRONT_USER_ID')}}">
                                        <i class="icon-user"></i>
                                    </a>
                                </li>
                                @else
                                <li style="margin-left:5px;">
                                    <a href="{{url('/login')}}">
                                        <i class="icon-user"></i>
                                    </a>
                                </li>
                                @endif
                            <li>
                                <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Mobile Right Side -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Mobile Header -->

    <!--  Start Offcanvas Mobile Menu Section -->
    <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-mobile-menu-wrapper">
            <!-- Start Mobile Menu  -->
            <div class="mobile-menu-bottom">
                <!-- Start Mobile Menu Nav -->
                <div class="offcanvas-menu">
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>
                            <a href="#"><span>Sneakers</span></a>
                            <ul class="mobile-sub-menu">
                                <li><a href="{{url('brand/converse')}}">Converse</a></li>
                                <li><a href="{{url('brand/vans')}}">Vans</a></li>
                                <li><a href="{{url('brand/puma')}}">Puma</a></li>
                                <li><a href="{{url('brand/fila')}}">Fila</a></li>
                            </ul>
                        </li>
                        
                        <li><a href="{{url('category/backpacks')}}">Backpacks</a></li>
                        <li><a href="{{url('category/tshirt')}}">Tshirt</a></li>
                        <li><a href="{{url('category/accessories')}}">Accessories</a></li>
                    </ul>
                </div> <!-- End Mobile Menu Nav -->
            </div> <!-- End Mobile Menu -->

            <!-- Start Mobile contact Info -->
            <div class="mobile-contact-info">
                <div class="logo">
                    {{-- <a href="index.html"><img src="{{asset('assets/images/logo/logo_white.png')}}" alt=""></a> --}}
                </div>

                <address class="address">
                    <span>Address: 370 Thai Ha, Trung Liet, Dong Da, Ha Noi</span>
                    <span>Call Us: 0988.62.3060</span>
                    <span>Email: cskh@greyb.vn</span>
                </address>

                <ul class="social-link">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <!-- End Mobile contact Info -->

        </div> <!-- End Offcanvas Mobile Menu Wrapper -->
    </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

    <!-- Start Offcanvas Addcart Section -->
    <div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->

        <!-- Start  Offcanvas Addcart Wrapper -->
        @if($totalCartItem>0)
        <div class="offcanvas-add-cart-wrapper">
            <h4 class="offcanvas-title">Shopping Cart</h4>
            <ul class="offcanvas-cart">
                @foreach($getAddToCartTotalItem as $cartItem)
                @php
                $totalPrice=$totalPrice+($cartItem->qty*$cartItem->price)
                @endphp
                <li class="offcanvas-cart-item-single">
                    <div class="offcanvas-cart-item-block">
                        <a href="{{url('product/'.$cartItem->slug)}}" class="offcanvas-cart-item-image-link">
                            <img src="{{asset('storage/media/Products/'.$cartItem->image)}}" alt=""
                                class="offcanvas-cart-image">
                        </a>
                        <div class="offcanvas-cart-item-content">
                            <a href="{{url('product/'.$cartItem->slug)}}" class="offcanvas-cart-item-link">{{$cartItem->name}}</a>
                            <div class="offcanvas-cart-item-details">
                                <span class="offcanvas-cart-item-details-quantity">{{$cartItem->qty}} x </span>
                                <span class="offcanvas-cart-item-details-price">{{number_format($cartItem->price)}} VND</span>
                            </div>
                            <div class="home-cart-size-wrap">
                                <span class="home-cart-size-title">Size: </span>
                                <span class="home-cart-size-size">{{$cartItem->size}}</span>
                            </div>
                        </div>
                    </div>
                </li>                
                @endforeach   
            </ul>
            <div class="offcanvas-cart-total-price">
                <span class="offcanvas-cart-total-price-text">Subtotal:</span>
                <span class="offcanvas-cart-total-price-value">{{number_format($totalPrice)}} VND</span>
            </div>
            <ul class="offcanvas-cart-action-button">
                <li><a href="{{url('/cart')}}" class="btn btn-block btn-golden">View Cart</a></li>
                <li><a href="{{url('/checkout')}}" class=" btn btn-block btn-golden mt-5">Checkout</a></li>
            </ul>
        </div>
        @else
        <div class="emptycart-wrapper">
            <div class="container">
                <div class="emptycart-content text-center">
                    <div class="image">
                        <img class="img-fluid" src="assets/images/emprt-cart/empty-cart.png" alt="">
                    </div>
                    <h4 class="title" style="font-size:24px">Your Cart is Empty</h4>
                    <h6 class="sub-title" style="font-size:18px">Sorry Mate... No item Found inside your cart!</h6>
                </div>
            </div>
        </div>
        @endif
        <!-- End  Offcanvas Addcart Wrapper -->

    </div> <!-- End  Offcanvas Addcart Section -->

    <!-- Start Offcanvas Mobile Menu Section -->
    <div id="offcanvas-wishlish" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- ENd Offcanvas Header -->

        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-wishlist-wrapper">
            <h4 class="offcanvas-title">Wishlist</h4>
            <ul class="offcanvas-wishlist">
                <li class="offcanvas-wishlist-item-single">
                    <div class="offcanvas-wishlist-item-block">
                        <a href="#" class="offcanvas-wishlist-item-image-link">
                            <img src="{{asset('assets/images/product/default/home-1/default-1.jpg')}}" alt=""
                                class="offcanvas-wishlist-image">
                        </a>
                        <div class="offcanvas-wishlist-item-content">
                            <a href="#" class="offcanvas-wishlist-item-link">Car Wheel</a>
                            <div class="offcanvas-wishlist-item-details">
                                <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                                <span class="offcanvas-wishlist-item-details-price">$49.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-wishlist-item-delete text-right">
                        <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </li>
                <li class="offcanvas-wishlist-item-single">
                    <div class="offcanvas-wishlist-item-block">
                        <a href="#" class="offcanvas-wishlist-item-image-link">
                            <img src="{{asset('assets/images/product/default/home-2/default-1.jpg')}}" alt=""
                                class="offcanvas-wishlist-image">
                        </a>
                        <div class="offcanvas-wishlist-item-content">
                            <a href="#" class="offcanvas-wishlist-item-link">Car Vails</a>
                            <div class="offcanvas-wishlist-item-details">
                                <span class="offcanvas-wishlist-item-details-quantity">3 x </span>
                                <span class="offcanvas-wishlist-item-details-price">$500.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-wishlist-item-delete text-right">
                        <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </li>
                <li class="offcanvas-wishlist-item-single">
                    <div class="offcanvas-wishlist-item-block">
                        <a href="#" class="offcanvas-wishlist-item-image-link">
                            <img src="{{asset('assets/images/product/default/home-3/default-1.jpg')}}" alt=""
                                class="offcanvas-wishlist-image">
                        </a>
                        <div class="offcanvas-wishlist-item-content">
                            <a href="#" class="offcanvas-wishlist-item-link">Shock Absorber</a>
                            <div class="offcanvas-wishlist-item-details">
                                <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                                <span class="offcanvas-wishlist-item-details-price">$350.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-wishlist-item-delete text-right">
                        <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </li>
            </ul>
            <ul class="offcanvas-wishlist-action-button">
                <li><a href="#" class="btn btn-block btn-golden">View wishlist</a></li>
            </ul>
        </div> <!-- End Offcanvas Mobile Menu Wrapper -->

    </div> <!-- End Offcanvas Mobile Menu Section -->

    <!-- Start Offcanvas Search Bar Section -->
    <div id="search" class="search-modal">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" placeholder="type keyword(s) here" id="search_str" />
            <button type="button" onclick="funSearch()" class="btn btn-lg btn-golden">Search</button>
        </form>
    </div>
    <!-- End Offcanvas Search Bar Section -->

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    @section('container')
    @show

    <!-- Start Footer Section -->
    <footer class="footer-section footer-bg">
        <div class="footer-wrapper">
            <!-- Start Footer Top -->
            <div class="footer-top" data-aos="fade-up" data-aos-delay="0">
                <div class="container">
                    <div class="row mb-n6">
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden">
                                <h5 class="title">INFORMATION</h5>
                                <ul class="footer-nav">
                                    <li><a href="#">Introduce</a></li>
                                    <li><a href="#">Recruitment</a></li>
                                    <li><a href="#">News about GREYB</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden">
                                <h5 class="title">MY ACCOUNT</h5>
                                <ul class="footer-nav">
                                    <li><a href="#">My account</a></li>
                                    <li><a href="#">Wishlist</a></li>
                                    <li><a href="#">Order History</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden">
                                <h5 class="title">POLICIES</h5>
                                <ul class="footer-nav">
                                    <li><a href="#">Shipping Policy</a></li>
                                    <li><a href="#">Return Policy</a></li>
                                    <li><a href="#">Payment policy</a></li>
                                    <li><a href="#">Usage rules</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--golden">
                                <div class="footer-about">
                                    <div class="col-12">
                                        <div class="footer-social">
                                            <h4 class="title">FOLLOW US</h4>
                                            <ul class="footer-social-link">
                                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="footer-newsletter">
                                            <h4 class="title">DON'T MISS OUT ON THE LATEST</h4>
                                            <div class="form-newsletter">
                                                <form action="#" method="post">
                                                    <div class="form-fild-newsletter-single-item input-color--golden">
                                                        <input type="email" placeholder="Your email address..." required>
                                                        <button type="submit">SUBSCRIBE!</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Top -->
            
            <!-- Start Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div
                        class="row justify-content-between align-items-center align-items-center flex-column flex-md-row mb-n6">
                        <div class="col-auto mb-6">
                            <div class="footer-copyright">
                                <p class="copyright-text">&copy; 2021 <a href="{{url('/')}}">VTC Academy</a>. Made with <i
                                        class="fa fa-heart text-danger"></i> by <a href="{{url('/')}}">WD06 - Group 4</a> </p>

                            </div>
                        </div>
                        <div class="col-auto mb-6">
                            <div class="footer-payment">
                                <div class="image">
                                    {{-- <img src="{{asset('assets/images/company-logo/payment.png')}}" alt=""> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Footer Bottom -->
        </div>
    </footer>
    <!-- End Footer Section -->

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    

    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    <script src="{{asset('assets/js/vendor/modernizr-3.11.2.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-ui.min.js')}}"></script>

    <!--Plugins JS-->
    <script src="{{asset('assets/js/plugins/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/material-scrolltop.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/venobox.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.waypoints.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.lineProgressbar.js')}}"></script>
    <script src="{{asset('assets/js/plugins/aos.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.instagramFeed.js')}}"></script>
    <script src="{{asset('assets/js/plugins/ajax-mail.js')}}"></script>
    <script src="{{asset('admin_assets/libs/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/pages/toastr.init.js')}}"></script>
    <script src="{{asset('assets/js/toastr.min.js')}}"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="{{asset('assets/js/vendor/vendor.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/all.js')}}"></script>
    <script src="{{asset('assets/js/plugins/plugins.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    {{-- <script src="{{asset('assets/js/nouislider.js')}}"></script> --}}

    @if(Session::has('success'))
      <script>
         toastr.success("{!!Session::get('success')!!}");
      </script>
    @endif
    @if(Session::has('error'))
    <script>
        toastr.error("{!!Session::get('error')!!}");
    </script>
    @endif
</body>

</html>