@extends('front/layout')
@section('page_title', 'Update Password')
@section('container')
 <!-- ...:::: Start Customer Login Section :::... -->
 <div class="customer-login"  data-aos="fade-up" data-aos-delay="0">
    <div class="container">
        <div class="row">
            <div class="col-12" style="margin: 70px 0">
                <h3 class="breadcrumb-title text-center"> Update Password </h3>
            </div>
            <!--register area start-->
            <div class="col-lg-3 col-md-3"></div>
            <!--register area end-->
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form">
                    <form action="#" method="POST" id="frmUpdatePassword">
                        <div class="default-form-box">
                            <label>Passwords<span>*</span></label>
                            <input type="password" name="password" id="password" required>
                        </div>
                        <div class="default-form-box">
                            <label>Confirm Passwords<span>*</span></label>
                            <input type="password" name="c_password" id="password" required>
                            <div id="password_error" class="field_error"></div> 
                        </div>
                        <div class="login_submit">
                            <button class="btn btn-md btn-black-default-hover mb-4" id="btnUpdatePassword" onclick="forgot_password() type="submit">Submit</button>
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
