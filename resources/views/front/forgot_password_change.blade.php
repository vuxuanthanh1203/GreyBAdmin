@extends('front/layout')

@section('container')
<div id="login">
    <div class="grid wide">
        <div class="login row sm-gutter">
            <!-- <div class="formAccount"> -->
            <div class="formAccount col l-6 c-12 m-12">
                <h2 class="section-title">Cập Nhật Mật Khẩu</h2>
                <div class="form-login">
                    <form id="frmUpdatePassword">
                        <div>
                            <input type="password" name="password" id="password" placeholder="Mật khẩu" class="inputAccount" required>
                            <div id="password_error" class="field_error"></div>                                     
                        </div>            
                        <div class="wrapbtn">
                            <button type="submit" id="btnUpdatePassword" class="account">XÁC NHẬN</button>
                        </div>
                        @csrf
                    </form>
                </div>                       
            </div>
        </div>
    </div>
</div>
@endsection
