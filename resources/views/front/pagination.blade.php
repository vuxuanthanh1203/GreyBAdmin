<!DOCTYPE html>
<html lang="zxx">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title></title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" type="image/png">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/font-awesome.min.css')}}">
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

</head>

<body>
    <!-- Start Pagination -->
    <div class="page-pagination text-center">
        @if($paginator->hasPages())
        <ul class="pagination">
        <!-- Prevoius Page Link -->
            @if($paginator->onFirstPage())
                <li><a  style="cursor: not-allowed"><span><i class="ion-ios-skipbackward"></i></span></a></li>
            @else
                <li ><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="ion-ios-skipbackward"></i></a></li>
            @endif

            <!-- Pagination Elements Here -->
            {{-- @foreach($elements as $element)
                <!-- Make three dots -->
                @if(is_string($element))
                    <li><a><span>{{$element}}</span></a></li>
                @endif
                <!-- Links Array Here -->
                @if(is_array($element))
                    @foreach($element as $page=>$url)
                        @if($page == $paginator->currentPage())
                            <li><a class="active"><span>{{ $page }}</span></a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach --}}
            @if($paginator->currentPage() > 3)
                <li class="hidden-xs"><a href="{{ $paginator->url(1) }}">1</a></li>
                @endif
                @if($paginator->currentPage() > 4)
                    <li><a>...</a></li>
                @endif
                @foreach(range(1, $paginator->lastPage()) as $i)
                    @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                        @if ($i == $paginator->currentPage())
                            <li class="active"><a class="active">{{ $i }}</a></li>
                        @else
                            <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                        @endif
                    @endif
                @endforeach
                @if($paginator->currentPage() < $paginator->lastPage() - 3)
                    <li><a>...</a></li>
                @endif
                @if($paginator->currentPage() < $paginator->lastPage() - 2)
                    <li class="hidden-xs"><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
            @endif

            <!-- Next Page Link -->
            @if($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}"><span><i class="ion-ios-skipforward"></i></span></a></li>
            @else
            <li><a style="cursor: not-allowed"><span><i class="ion-ios-skipforward"></i></span></a></li>
            @endif
        </ul>
        @endif
    </div> <!-- End Pagination -->


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
    <script src="{{asset('assets/js/plugins/plugins.min.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
</body>

</html>