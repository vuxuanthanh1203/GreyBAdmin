@extends('front/layout')
@section('page_title', 'Register')

@section('container')
<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Registration</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url('category/sneakers')}}">Shop</a></li>
                                <li class="active" aria-current="page">Registration</li>
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
            <!--login area start-->
            <div class="col-lg-3 col-md-3"></div>
            <!--login area start-->

            <!--register area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form register" data-aos="fade-up" data-aos-delay="200">
                    <h3>Register Form</h3>
                    <form id="frmRegistration">
                        <div class="default-form-box">
                            <label>Full Name <span>*</span></label>
                            <input type="text" name="name" id="name" required>
                            <div id="name_error" class="field_error"></div>
                        </div>
                        <div class="default-form-box">
                            <label>Email address <span>*</span></label>
                            <input type="email" name="email" id="email" required>
                            <div id="email_error" class="field_error"></div>
                        </div>
                        <div class="default-form-box">
                            <label>Passwords <span>*</span></label>
                            <input type="password" name="password" id="password" required>
                            <div id="password_error" class="field_error"></div>
                        </div>
                        <div class="default-form-box">
                            <label>Phone Number <span>*</span></label>
                            <input type="text" name="mobile" id="mobile" required>
                            <div id="mobile_error" class="field_error"></div>                                 
                        </div>
                        <div class="default-form-box">
                            <label>Address <span>*</span></label>
                            <input type="text" name="address" id="address" required>
                            <div id="address_error" class="field_error"></div>                               
                        </div>
                        <div class="login_submit">
                            <button class="btn btn-md btn-black-default-hover" id="btnRegistration" type="submit">Register</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
            <!--register area end-->
        </div>
    </div>
</div> <!-- ...:::: End Customer Login Section :::... -->
@endsection
