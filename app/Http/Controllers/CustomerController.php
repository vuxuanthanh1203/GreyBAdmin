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

    // public function status(Request $request, $status, $id)
    // {
    //     $model = Customer::find($id);
    //     $model->status=$status;
    //     $model->save();
    //     return response()->json(['status'=>'success','msg'=>'Customer Status Updated !']);
    // }

    public function active_customer(Request $request, $id)
    {
        $model = Customer::find($id);
        $model->status=0;
        $model->save();
        // $request->session()->flash('message', 'Product Status Updated !');
        return response()->json(['status'=>'success','msg'=>'Customer Status Updated !']);
    }

    public function deactive_customer(Request $request, $id)
    {
        $model = Customer::find($id);
        $model->status=1;
        $model->save();
        // $request->session()->flash('message', 'Product Status Updated !');
        return response()->json(['status'=>'success','msg'=>'Customer Status Updated !']);
    }
}
