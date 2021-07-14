@extends('front/layout')
@section('page_title', 'Forgot Password')
@section('container')

 <!-- ...:::: Start Customer Login Section :::... -->
 <div class="customer-login">
    <div class="container">
        <div class="row">
            <div class="col-12" style="margin: 70px 0 30px 0">
                <h3 class="breadcrumb-title text-center"> Forgot Password </h3>
            </div>
            <!--register area start-->
            <div class="col-lg-3 col-md-3"></div>
            <!--register area end-->
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                    <p data-aos="fade-up" data-aos-delay="200" style="text-align: center">
                        Please enter the email registered for your account. GreyB will send a password reset link to this email, please check it now! 
                        <span style="color: #b19361 !important">
                            <i class="fas fa-flag" aria-hidden="true"></i>
                            <a class="Returning" href="{{url('/login')}}" >Return to Login</a>
                        </span>
                    </p>
                    <form action="#" method="POST" id="frmForgot">
                        <div class="default-form-box">
                            <label>Email Address<span>*</span></label>
                            <input type="email" name="forgot_email" id="email" required>
                        </div>
                        <div class="login_submit">
                            <button class="btn btn-md btn-black-default-hover mb-4" id="btnForgot" onclick="forgot_password() type="submit">Submit</button>
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
