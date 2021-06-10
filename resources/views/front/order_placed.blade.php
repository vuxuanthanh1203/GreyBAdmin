@extends('front/layout')

@section('container')
<div class="confirm-order">
    <h1>Đơn hàng của bạn đã được đặt thành công</h1>
    <h1>Mã đơn hàng: {{session()->get('ORDER_ID')}}</h1>
</div>

@endsection

<?php
    Session::forget('ORDER_ID');
    Session::forget('TOTAL_PRICE');
?>
