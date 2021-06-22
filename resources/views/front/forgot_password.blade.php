@extends('front/layout')

@section('container')
<div id="login">
    <div class="grid wide">
        <div class="login row sm-gutter">
            <!-- <div class="formAccount"> -->
            <div class="formAccount col l-6 c-12 m-12">
                <h2 class="section-title">Khôi phục mật khẩu</h2>
                <p>Vui lòng nhập email đã đăng ký tài khoản Grey.B sẽ gửi link khôi phục mật khẩu vào email này, bạn kiểm tra ngay nhé !</p>
                <div class="form-login">
                    <form id="frmForgot">
                        <div>
                            <input type="email" name="forgot_email" id="email" placeholder="email@example.com" class="inputAccount" required>
                        </div>      
                        <div class="wrapbtn">
                            <button type="submit" id="btnForgot" class="account">XÁC NHẬN</button>
                        </div>
                        @csrf
                    </form>
                </div>                       

            </div>
        </div>
    </div>
</div>
@endsection
