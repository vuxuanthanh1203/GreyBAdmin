<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $result['data'] = Customer::all();
        return view('admin/customer', $result);
    }

    public function show(Request $request, $id='')
    {
        $arr = Customer::where(['id'=>$id])->get();
            
        $result['customer_list'] = $arr['0'];

        return view('admin/show_customer', $result);
    }

    public function status(Request $request, $status, $id)
    {
        $model = Customer::find($id);
        $model->status=$status;
        $model->save();
        return response()->json(['status'=>'success','msg'=>'Customer Status Updated !']);
    }
}
