<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Login page | Greyb Admin</title>
        <!-- App css -->
        <link href="{{asset('admin_assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="{{asset('admin_assets\css\app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


    </head>

    <body class="authentication-page">

        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-header p-4 bg-primary">
                                <h4 class="text-white text-center mb-0 mt-0">{{Config::get('constants.site_name')}}</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.auth')}}" method="POST" class="p-2">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email</label>
                                        <input class="form-control" type="email" name="email" required="" placeholder="email@example.com">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password :</label>
                                        <input class="form-control" type="password" required="" name="password" placeholder="Enter your password">
                                    </div>

                                    {{-- <div class="form-group mb-4">
                                        <div class="checkbox checkbox-success">
                                            <input id="remember" type="checkbox">
                                            <label for="remember">
                                                Remember me
                                            </label>
                                        </div>
                                    </div> --}}
                                    
                                    <div class="form-group row text-center mt-4 mb-4">
                                        <div class="col-12">
                                            <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Login</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <!-- end row -->

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
        </div>

        <!-- Vendor js -->
        <script src="{{asset('admin_assets\js\vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('admin_assets\js\app.min.js')}}"></script>

        <!-- Toastr init -->
        <script src="{{asset('admin_assets/libs/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('admin_assets/js/pages/toastr.init.js')}}"></script>
        <script src="{{asset('admin_assets/js/main.js')}}"></script>

        @if(Session::has('error'))
            <script>
                toastr.error("{!!Session::get('error')!!}");
            </script>
        @endif

        @if(Session::has('msg'))
            <script>
                toastr.success("{!!Session::get('msg')!!}");
            </script>
        @endif
    </body>

</html>