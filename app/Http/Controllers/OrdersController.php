<?php

namespace App\Http\Controllers;

use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Statistic;
use Carbon\Carbon;

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
        ->where(['orders.orders_status'=>1])
        ->orderBy('orders.created_at','desc')->get();
        $countP = count($result['pending']);

        $result['shipping'] = DB::table('orders')->select('orders.*', 'orders_status.orders_status')
        ->leftJoin('orders_status', 'orders_status.id', '=', 'orders.orders_status')
        ->where(['orders.orders_status'=>2])
        ->orderBy('orders.updated_at','desc')->get();
        $countS = count($result['shipping']);
        
        $result['received'] = DB::table('orders')->select('orders.*', 'orders_status.orders_status')
        ->leftJoin('orders_status', 'orders_status.id', '=', 'orders.orders_status')
        ->where(['orders.orders_status'=>3])
        ->orderBy('orders.updated_at','desc')->get();
        $countR = count($result['received']);

        $result['failed'] = DB::table('orders')->select('orders.*', 'orders_status.orders_status')
        ->leftJoin('orders_status', 'orders_status.id', '=', 'orders.orders_status')
        ->where(['orders.orders_status'=>4])
        ->orderBy('orders.updated_at','desc')->get();
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
        $model = orders::find($id);
        $model->orders_status=$status;
        $model->save();

        $data =  DB::table('orders')
        ->where(['orders.orders_status'=>3])
        ->get();

        $order_date = $model->order_date;
        
        if($data) {        
            $total_order = DB::table('orders')
            ->where(['order_date'=>$order_date])
            ->where(['orders_status'=>3])
            ->count();

            $sales = DB::table('orders')
            ->where(['order_date'=>$order_date])
            ->where(['orders_status'=>3])
            ->sum('total_amt');

            $profit = $sales - $sales * 0.9;


            $statistic = Statistic::where('order_date',$order_date)->get();
            
            if ($statistic) {
                $statistic_count = $statistic->count();
            } else {
                $statistic_count = 0;
            }

            if ($statistic_count > 0) {
                $statistic_update = Statistic::where('order_date',$order_date)->first();
                $statistic_update->sales = $sales;
                $statistic_update->profit = $profit;
                $statistic_update->total_order = $total_order;
                $statistic_update->save();
            } else {
                $statistic_new = new Statistic();
                $statistic_new->order_date = $order_date;
                $statistic_new->sales = $sales;
                $statistic_new->profit = $profit;
                $statistic_new->total_order = $total_order;
                $statistic_new->save();
            }
            // prx($statistic_new);

        }
        $request->session()->flash('message', 'Order Status Updated !');
        return redirect('admin/order');
    }
    
    public function cancel(Request $request, $id)
    {
        $model = orders::find($id);
        $model->orders_status=4;
        $model->note = $request->input('message');
        $model->save();

        return response()->json(['status'=>'success','msg'=>'Order Cancel Successfully']);
    }
}
