@extends('front/layout')
@section('page_title', 'Login')
@section('container')
<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Login</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url('category/sneakers')}}">Shop</a></li>
                                <li class="active" aria-current="page">Login</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

 <!-- ...:::: Start Customer Login Section :::... -->
 <div class="customer-login">
    <div class="container">
        <div class="row">
            <div class="row">
                @if(session()->has('FRONT_USER_LOGIN') == null)
                <!-- User Quick Action Form -->
                <div class="col-12">
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
                    <h3>Login Form</h3>
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
                            <a href="{{url('/get_password')}}">Lost your password?</a>
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
