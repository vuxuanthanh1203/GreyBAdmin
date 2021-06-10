@extends('front/layout')

@section('container')
<div id="login">
    <div class="grid wide">
        <div class="login row sm-gutter">
            <!-- <div class="formAccount"> -->
            <div class="formAccount col l-6 c-12 m-12">
                <h2 class="section-title">Đăng Ký</h2>
                <p>Bạn chưa có tài khoản? Đăng ký ngay!</p>
                <div class="form-login">
                    <form method="post" id="frmRegistration">
                        <div> 
                            <input type="text" name="name" id="name" placeholder="Họ và tên của bạn" class="inputAccount" required>
                            <div id="name_error" class="field_error"></div>                                   
                        </div> 
                        <div>
                            <input type="email" name="email" id="email" placeholder="email@example.com" class="inputAccount" required>
                            <div id="email_error" class="field_error"></div>
                        </div>
                        <div>
                            <input type="password" name="password" id="password" placeholder="Mật khẩu" class="inputAccount" required>
                            <div id="password_error" class="field_error"></div>                                     
                        </div> 
                        <div>   
                            <input type="text" name="mobile" id="mobile" placeholder="Số điện thoại" class="inputAccount" required>
                            <div id="mobile_error" class="field_error"></div>                                 
                        </div> 
                        <div>     
                            <input type="text" name="address" id="address" placeholder="Địa chỉ" class="inputAccount" required>
                            <div id="address_error" class="field_error"></div>                               
                        </div> 
                                             
                        <div class="wrapbtn">
                            <button type="submit" id="btnRegistration" class="account">ĐĂNG KÝ</button>
                        </div>
                        @csrf
                    </form>
                </div>                       

            </div>
        </div>
    </div>
</div>
@endsection
