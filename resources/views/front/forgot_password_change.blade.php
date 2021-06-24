@extends('front/layout')
@section('page_title', 'Update Password')
@section('container')
<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Update Password</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url('category/sneakers')}}">Shop</a></li>
                                <li class="active" aria-current="page">Update Password</li>
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
            <!--register area start-->
            <div class="col-lg-3 col-md-3"></div>
            <!--register area end-->
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                    <h3>Update Password</h3>
                    <form action="#" method="POST" id="frmUpdatePassword">
                        <div class="default-form-box">
                            <label>Passwords<span>*</span></label>
                            <input type="password" name="password" id="password" required>
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
