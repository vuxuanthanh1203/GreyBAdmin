<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreyB</title>
    <link rel="stylesheet" href="{{asset('front_assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/grid.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/font/icofont/icofont.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/font/fontello/css/next.css')}}">
    <link rel="icon" href="{{asset('front_assets/font/Icon/ia_300000109.png')}}" type="image" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://unpkg.com/js-image-zoom@0.7.0/js-image-zoom.js" type="application/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="main">
        <div id="header">
            <div class="header grid wide">
                <div class="row">
                    <div class="header-logo col l-2 c-2 m-2">
                        <a href="{{url('/')}}">
                            <img class="header_logo" src="{{asset('front_assets/font/Icon/ia_300000109.png')}}" alt="">
                        </a>
                    </div>
                    <div class="header-phones col l-3 c-3 m-3">
                        <div class="circle-icon">
                            <img class="icons-header" src="{{asset('front_assets/font/Icon/phone-8x.png')}}" alt="">
                        </div>
                        <div class="header-phone">
                            <h3>hỗ trợ gọi ngay</h3>
                            <a href="">0988.62.3060</a>
                        </div>
                    </div>
                    <div class="header-address col l-5 c-5 m-5">
                        <div class="circle-icon">
                            <img class="icons-header" src="{{asset('front_assets/font/Icon/map.png')}}" alt="">
                        </div>
                        <div class="header__address">
                            <h3>địa chỉ liên hệ</h3>
                            <a href="">370 Thái Hà, P. Trung Liệt, Q. Đống Đa, Hà Nội</a>
                        </div>
                    </div>
                    <div class="header-like-login-cart col l-2 c-2 m-2">
                        <div class="icon-header">
                            <img src="{{asset('front_assets/font/Icon/heart-regular.svg')}}" alt="">
                        </div>
                        @if(session()->has('FRONT_USER_LOGIN') != null)
                            {{-- <a href="{{url('/profile')}}" class="icon-header"> --}}
                            <a href="{{url('/logout')}}" class="icon-header">
                                <img src="{{asset('front_assets/font/Icon/user-regular.png')}}" alt="">
                            </a>
                        @else
                            <a href="{{url('/login')}}" class="icon-header">
                                <img src="{{asset('front_assets/font/Icon/user-regular.png')}}" alt="">
                            </a>
                        @endif
                        <a href="{{url('/cart')}}" class="icon-header">
                            <img src="{{asset('front_assets/font/Icon/cart-best.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Begin: Nav -->
        <div id="nav">
            <div class="grid wide">
                <div class="row ">
                    <div class="mobile-left-nav col c-3 m-3">
                        <input type="checkbox" id="show-menu">
                        <label for="show-menu" class="menu-icon"><i class="icofont-navigation-menu icofont-2x"></i></label>
                        <a href="#" class="user-mobile">
                            <!-- <div class="icon-header">
                                <img src="{{asset('front_assets/font/Icon/heart_white.png')}}" alt="">
                            </div> -->
                                <img src="{{asset('front_assets/font/Icon/user-regular-white.png')}}" alt="">
                        </a>
                        <ul class="nav-mobile">
                            <li><a href="#">Home</a></li>
                            <li>
                                <a href="" class="mobile-link">Sneakers</a>
                                <input type="checkbox" id="show-sneakers">
                                <label class=" label" for="show-sneakers"></label>
                                <ul class="subnav">
                                    <li><a href="">Converse</a></li>
                                    <li><a href="">Vans</a></li>
                                    <li><a href="">New Balance</a></li>
                                    <li><a href="">Puma</a></li>
                                    <li><a href="">Slipper</a></li>
                                    <li><a href="">Fla+MLB</a></li>
                                    <li><a href="">Kid Shoes</a></li>
                                </ul>
                            </li>
                            <li><a href="">Backpacks</a></li>
                            <li><a href="">Accessories</a></li>
                            <li class="animation">
                                <a href="" class="mobile-link">Sale</a>
                                <input type="checkbox" id="show-sale">
                                <label class=" label" for="show-sale"></label>
                                <ul class="subnav">
                                    <li><a href="">Vans</a></li>
                                    <li><a href="">Converse</a></li>
                                    <li><a href="">New Balance</a></li>
                                    <li><a href="">Puma</a></li>
                                    <li><a href="">Sale Other</a></li>
                                    <li><a href="">Accessories</a></li>
                                </ul>
                            </li>
                            <li><a href="">Collections</a></li>
                            <li><a href="">Blog</a></li>
                        </ul>
                    </div>
                    <ul class="nav col l-9-5">
                        <li><a href="#">Home</a></li>
                        <li>
                            <a href="" class="desktop-link">Sneakers</a>
                            <ul class="subnav">
                                <li><a href="">Converse</a></li>
                                <li><a href="">Vans</a></li>
                                <li><a href="">New Balance</a></li>
                                <li><a href="">Puma</a></li>
                                <li><a href="">Slipper</a></li>
                                <li><a href="">Fla+MLB</a></li>
                                <li><a href="">Kid Shoes</a></li>
                            </ul>
                        </li>
                        <li><a href="">Backpacks</a></li>
                        <li><a href="">Accessories</a></li>
                        <li class="animation">
                            <a href="" class="desktop-link">Sale</a>
                            <ul class="subnav">
                                <li><a href="">Vans</a></li>
                                <li><a href="">Converse</a></li>
                                <li><a href="">New Balance</a></li>
                                <li><a href="">Puma</a></li>
                                <li><a href="">Sale Other</a></li>
                                <li><a href="">Accessories</a></li>
                            </ul>
                        </li>
                        <li><a href="">Collections</a></li>
                        <li><a href="">Blog</a></li>
                    </ul>
                    <div class="mobile-between-nav col c-6 m-6">
                        <a href="">
                            <img src="{{asset('front_assets/font/Icon/grebwhite.png')}}" alt="">
                            </a>
                    </div>
                    <!-- Begin:Search button -->
                    <div class="mobile-right-nav col c-3 m-3">
                        <a href="#" class="cart-mobile">
                            <!-- <div class="icon-header">
                                <img src="{{asset('front_assets/font/Icon/heart_white.png')}}" alt="">
                            </div> -->
                                <img src="{{asset('front_assets/font/Icon/cart-best-white.png')}}" alt="">
                        </a>
                        <input type="checkbox" id="show-search">
                        <label for="show-search" class="search-icon"><i class="icofont-search-1 icofont-1x"></i></label>
                        <form action="" class="search-button-mobile col l-2-5">
                            <table class="elementsnav">
                                <tr>
                                    <td>
                                        <input class="search" type="text" placeholder="Tìm kiếm">
                                    </td>
                                    <td class="search-pc">
                                        <button type="submit" class="go-icon">
                                            <a href=""><i class="icon-search-1"></i></a>
                                        </button>
                                    </td>
                                    <td class="search-mobile">
                                        <button type="submit" class="go-icon">
                                            <a href=""><i class="icofont-search-1 icofont-1x"></i></a>
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <form action="" class="search-button col l-2-5">
                        <table class="elementsnav">
                            <tr>
                                <td>
                                    <input class="search" type="text" placeholder="Tìm kiếm">
                                </td>
                                <td class="search-pc">
                                    <button type="submit" class="go-icon">
                                        <a href=""><i class="icon-search-1"></i></a>
                                    </button>
                                </td>
                                <td class="search-mobile">
                                    <button type="submit" class="go-icon">
                                        <a href=""><i class="icofont-search-1 icofont-1x"></i></a>
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <!-- End:Search button  -->
            </div>
        </div>
        <!-- End: Nav -->
        
        @section('container')
        @show

        <div id="top-footer"></div>
        <div id="footer">
            <div class="grid wide">
                <div class="footer-content row sm-gutter">
                    <div class="column column1 col l-3 c-12 m-12 sm-12">
                        <a href="">
                            <img class="logo-footer" src="{{asset('front_assets/font/Icon/ICON Black.jpg')}}" alt="">
                        </a>
                        <a href="">
                            <img src="{{asset('front_assets/font/Icon/map white.png')}}" alt="">
                            <h2>370 Thái Hà, P. Trung Liệt, Q.Đống Đa, Hà Nội</h2>
                        </a>
                        <a class="footer__email" href="">
                            <img class="email" src="{{asset('front_assets/font/Icon/Email white.png')}}" alt="">
                            <h2>greybear1412@gmail.com</h2>
                        </a>
                        <a href="">
                            <img src="{{asset('front_assets/font/Icon/phone white.png')}}" alt="">
                            <h2>0988.62.3060</h2>
                        </a>
                    </div>
                    <div class="column column2 col l-2 c-12 m-12 sm-12">
                        <h1>HỖ TRỢ</h1>
                        <ul>
                            <li><a href="">Kiểm tra đơn hàng</a></li>
                            <li><a href="">Đăng nhập</a></li>
                            <li><a href="">Đăng ký</a></li>
                            <li><a href="">Giỏ hàng</a></li>
                        </ul>
                    </div>
                    <div class="column column3 col l-2-5 c-12 m-12 sm-12">
                        <h1>CHÍNH SÁCH</h1>
                        <ul>
                            <li><a href="/chinh-sach-giao-hang-n82741.html">Chính sách vận chuyển</a></li>
                            <li><a href="/chinh-sach-doi-hang-n48540.html">Chính sách đổi trả</a></li>
                            <li><a href="/chinh-sach-thanh-toan-n82742.html">Chính sách thanh toán</a></li>
                            <li><a href="/huong-dan-mua-hang-online-n82740.html">Quy định sử dụng</a></li>
                        </ul>
                    </div>
                    <div class="column column4 col l-2-5 c-12 m-12 sm-12">
                        <h1>GỬI EMAIL</h1>
                        Gửi email nhận khuyến mãi
                        <form class="input-email" action="">
                            <input type="email" name="email" class="text-input">
                            <button type="submit"><img src="{{asset('front_assets/font/Icon/paper plane.png')}}" alt=""></button>
                        </form>
                    </div>
                    <div class="column column5 col l-2">
                        <h1>KẾT NỐI</h1>
                        <ul>
                            <li><a href=""><img src="{{asset('front_assets/font/Icon/Facebook White.png')}}" alt=""></a></li>
                            <li><a href=""><img src="{{asset('front_assets/font/Icon/Youtube White.png')}}" alt=""></a></li>
                            <li><a href=""><img src="{{asset('front_assets/font/Icon/Instagram white.png')}}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> --}}
    {{-- <!-- <script src="{{asset('front_assets/zoomsl.js')}}"></script> --> --}}
    <script src="{{asset('admin_assets/libs/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/pages/toastr.init.js')}}"></script>
    <script src="{{asset('front_assets/js/slider.js')}}"></script>
    <script src="{{asset('front_assets/js/main.js')}}"></script>
</body>

</html>
<!-- ================Done -->
