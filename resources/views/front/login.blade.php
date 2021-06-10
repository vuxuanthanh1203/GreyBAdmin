@extends('front/layout')

@section('container')
<div id="login">
    <div class="grid wide">
        <div class="login row sm-gutter">
            <!-- <div class="formAccount"> -->
            <div class="formAccount col l-6 c-12 m-12">
                <h2 class="section-title">Đăng Nhập</h2>
                <p>Bạn chưa có tài khoản? Đăng ký để trở thành thành viên <a href="{{url('registration')}}" style="font-weight: 600;border-bottom: 1px solid;padding-bottom: 5px;">tại đây</a></p>
                <div class="form-login">
                    <form method="post" id="frmLogin">
                        <div>
                            <input type="email" name="login_email" id="email" placeholder="email@example.com" class="inputAccount" required>
                        </div>
                        <div>                                    
                            <input type="password" name="login_password" id="password" placeholder="Mật khẩu" class="inputAccount" required>
                        </div> 
                        <div class="row wrap-remember">
                            <div class="col l-6 m-6 s-12 btn-remember">
                                <label for="rememberme" class="rememberme">
                                    <input type="checkbox" name="" id="rememberme" style="display: inline-block">
                                    <span> Ghi nhớ đăng nhập </span>
                                </label>
                            </div>
                            <a class="col l-6 m-6 s-12" href="#" style="display: block;text-align: right; color: #111111; padding: 0 10px">
                                <span style="border-bottom: 1px solid #333;padding-bottom: 5px;">Quên mật khẩu?</span>
                            </a>
                        </div>                      
                        <div class="wrapbtn">
                            <button type="submit" id="btnLogin" class="account">ĐĂNG NHẬP</button>
                        </div>
                        @csrf
                    </form>
                </div>                       

            </div>
        </div>
    </div>
</div>
@endsection
