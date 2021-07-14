@extends('front/layout')
@section('page_title', 'My Account')
@section('container')

 <!-- ...:::: Start Account Dashboard Section:::... -->
 <div class="account-dashboard">
    <div class="container">
        <div class="row">
            <div class="col-12" style="margin: 70px 0">
                <h3 class="breadcrumb-title text-center"> My Account </h3>
                <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                    <nav aria-label="breadcrumb">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="active" aria-current="page">My Account</li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3">
                <!-- Nav tabs -->
                <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                    <ul role="tablist" class="nav flex-column dashboard-list">
                        <li><a href="{{url('/my_account')}}/{{session('FRONT_USER_ID')}}" data-bs-toggle="tab"
                            class="nav-link btn btn-block btn-md btn-black-default-hover active">Account details</a>
                        </li>
                        <li><a href="{{url('/order')}}"
                            class="nav-link btn btn-block btn-md btn-black-default-hover">Orders</a></li>
                        {{-- <li><a href="{{url('/change_password')}}/{{session('FRONT_USER_ID')}}"
                            class="nav-link btn btn-block btn-md btn-black-default-hover">Change Password</a></li> --}}
                        <li><a href="{{url('/logout')}}"
                                class="nav-link btn btn-block btn-md btn-black-default-hover">logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-9 account-content">
                <!-- Tab panes -->
                <div class="tab-pane fade show active" id="account-details" data-aos="fade-up" data-aos-delay="0">
                    <div class="login">
                        <div class="login_form_container">
                            <div class="account_login_form">
                                <form action="{{route('profile_process')}}" method="post">
                                @csrf
                                    <input type="hidden" name="id" value="{{$id}}">
                                    <div class="default-form-box mb-20">
                                        <label>Full Name</label>
                                        <input type="text" name="name" value="{{$name}}" required style="text-transform: capitalize">
                                    </div>
                                    <div class="default-form-box mb-20">
                                        <label>Email</label>
                                        <input type="email" name="name" value="{{$email}}" disabled style="cursor: not-allowed; background: #dddddd">
                                    </div>
                                    <div class="default-form-box mb-20">
                                        <label>Mobile</label>
                                        <input type="text" name="mobile" value="{{$mobile}}" required>
                                    </div>
                                    <div class="default-form-box mb-20">
                                        <label>Address</label>
                                        <input type="text" name="address" value="{{$address}}" required style="text-transform: capitalize">
                                    </div>
                                    <div class="save_button mt-3 text-right">
                                        <button class="btn btn-md btn-black-default-hover"
                                            type="submit"><a href="{{url('/')}}" style="color: #fff">Back</a></button>
                                        <button class="btn btn-md btn-black-default-hover"
                                            type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Account Dashboard Section:::... -->

@endsection
