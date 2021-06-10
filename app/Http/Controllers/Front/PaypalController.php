<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaypalController extends Controller
{
    public function index(Request $request) {
        if ($request->session()->has('ORDER_ID')) {
           return view('front.paypal');
        } else {
            return redirect('/cart');
        }
    }
}
