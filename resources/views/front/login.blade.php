@extends('front/layout')
@section('page_title', 'Login')
@section('container')
 <!-- ...:::: Start Customer Login Section :::... -->
 <div class="customer-login">
    <div class="container">
        <div class="row">
            <div class="col-12" style="margin: 70px 0 50px 0">
                <h3 class="breadcrumb-title text-center"> Login </h3>
            </div>
            <div class="row">
                @if(session()->has('FRONT_USER_LOGIN') == null)
                <!-- User Quick Action Form -->
                <div class="col-lg-3 col-md-3"></div>
                <div class="col-lg-6 col-md-6" style="padding-right: 0 !important; margin-left: 7px !important">
                    <div class="user-actions accordion" data-aos="fade-up" data-aos-delay="0">
                        <h3>
                            <i class="fas fa-flag" aria-hidden="true"></i>
                            Don't you have an account?
                            <a class="Returning" href="{{url('/registration')}}" >Click here to signed up</a>
                        </h3>
                    </div>
                </div>
                @endif
                <!-- User Quick Action Form -->
            </div>
            <!--register area start-->
            <div class="col-lg-3 col-md-3"></div>
            <!--register area end-->
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                    {{-- <h3>Login Form</h3> --}}
                    <form action="#" method="POST" id="frmLogin">
                        <div class="default-form-box">
                            <label>Email Address<span>*</span></label>
                            <input type="email" name="login_email" id="email" required>
                        </div>
                        <div class="default-form-box">
                            <label>Passwords <span>*</span></label>
                            <input type="password" name="login_password" id="password" required>
                        </div>
                        <div class="login_submit">
                            <button class="btn btn-md btn-black-default-hover mb-4" type="submit">Login</button>
                            <a href="{{url('/get_password')}}">Forgot password ?</a>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
            <!--login area start-->
        </div>
    </div>
</div> <!-- ...:::: End Customer Login Section :::... -->
@endsection
