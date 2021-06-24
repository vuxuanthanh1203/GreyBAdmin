<?php

namespace App\Http\Controllers;

use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    
    public function index()
    {
        $countP = 0;
        $countS = 0;
        $countR = 0;
        $countF = 0;

        $result['pending'] = DB::table('orders')->select('orders.*', 'orders_status.orders_status')
        ->leftJoin('orders_status', 'orders_status.id', '=', 'orders.orders_status')
        ->where(['orders.orders_status'=>1])->get();
        $countP = count($result['pending']);

        $result['shipping'] = DB::table('orders')->select('orders.*', 'orders_status.orders_status')
        ->leftJoin('orders_status', 'orders_status.id', '=', 'orders.orders_status')
        ->where(['orders.orders_status'=>2])->get();
        $countS = count($result['shipping']);

        $result['received'] = DB::table('orders')->select('orders.*', 'orders_status.orders_status')
        ->leftJoin('orders_status', 'orders_status.id', '=', 'orders.orders_status')
        ->where(['orders.orders_status'=>3])->get();
        $countR = count($result['received']);

        $result['failed'] = DB::table('orders')->select('orders.*', 'orders_status.orders_status')
        ->leftJoin('orders_status', 'orders_status.id', '=', 'orders.orders_status')
        ->where(['orders.orders_status'=>4])->get();
        $countF = count($result['failed']);

        $result['countP'] = $countP;
        $result['countS'] = $countS;
        $result['countR'] = $countR;
        $result['countF'] = $countF;
        return view('admin/order', $result);

    }

    public function order_detail(Request $request, $id)
    {
        $result['orders_details']=
            DB::table('orders_details')
            ->select('orders.*','orders_details.price','orders_details.qty','products.name as pname', 'products.image as pimage', 'sizes.size','orders_status.orders_status')
            ->leftJoin('orders','orders.id','=','orders_details.orders_id')
            ->leftJoin('products_attr','products_attr.id','=','orders_details.products_attr_id')
            ->leftJoin('products','products.id','=','products_attr.products_id')
            ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
            ->leftJoin('orders_status','orders_status.id','=','orders.orders_status')
            ->where(['orders.id'=>$id])->get();

        $result['orders_status']=
            DB::table('orders_status')->get();
                
        return view('admin.order_detail',$result);
    }

    
    public function status(Request $request, $status, $id)
    {
        $model = Orders::find($id);
        $model->orders_status=$status;
        $model->save();
        $request->session()->flash('message', 'Order Status Updated !');
        return redirect('admin/order');
    }
    
}
