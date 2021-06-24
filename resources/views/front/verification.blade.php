@extends('front/layout')
@section('page_title', 'Welcome')
@section('container')

<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
  <div class="breadcrumb-wrapper">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <h3 class="breadcrumb-title">Welcome Page</h3>
                  <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                      <nav aria-label="breadcrumb">
                          <ul>
                              <li><a href="{{url('/')}}">Home</a></li>
                              <li><a href="{{url('category/sneakers')}}">Page</a></li>
                              <li class="active" aria-current="page">Welcome Page</li>
                          </ul>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Error Section :::... -->
<div class="error-section">
  <div class="container">
      <div class="row">
          <div class="error-form">
              <h1 class="big-title" data-aos="fade-up" data-aos-delay="0"> Thank You </h1>
              <h4 class="sub-title" data-aos="fade-up" data-aos-delay="200">Account Verification Successful !</h4>
              <p data-aos="fade-up" data-aos-delay="400">Wish you have happy shopping moments at GreyB
                <span><i class="fa fa-heart text-danger"></i></span>
              </p>
              <div class="row"  data-aos="fade-up" data-aos-delay="400">
                  <div class="col-10 offset-1 col-md-4 offset-md-4 return-login">
                    <p>Click here to Login</p>
                    <i class="ion-ios-arrow-thin-right"></i>
                    <a href="{{url('/login')}}" class="btn btn-md btn-black-default-hover mt-7">Login</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div> <!-- ...:::: End Error Section :::... -->
@endsection