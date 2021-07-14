@extends('front/layout')
@section('page_title', 'Register')

@section('container')

 <!-- ...:::: Start Customer Login Section :::... -->
 <div class="customer-login">
    <div class="container">
        <div class="row">
            <div class="col-12" style="margin: 70px 0 50px 0">
                <h3 class="breadcrumb-title text-center"> Registration </h3>
            </div>
            <div class="row">
                <!-- User Quick Action Form -->
                <div class="col-lg-3 col-md-3"></div>
                <div class="col-lg-6 col-md-6" style="padding-right: 0 !important; margin-left: 7px !important">
                    <div class="user-actions accordion" data-aos="fade-up" data-aos-delay="0">
                        <h3>
                            <i class="fas fa-flag" aria-hidden="true"></i>
                            Do you already have an account ?
                            <a class="Returning" href="{{url('/login')}}" >Click here to Login</a>
                        </h3>
                    </div>
                </div>
                <!-- User Quick Action Form -->
            </div>
            <!--login area start-->
            <div class="col-lg-3 col-md-3"></div>
            <!--login area start-->

            <!--register area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form register" data-aos="fade-up" data-aos-delay="200">
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
