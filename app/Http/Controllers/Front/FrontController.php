<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\Front\Crypt;
use Crypt;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // New product
        $result['home_products_new']=DB::table('products')
                ->where(['status'=>1])
                ->where(['type'=>1])
                ->limit(8)
                ->get();


        foreach($result['home_products_new'] as $list){
            $result['home_products_new_attr'][$list->id] = DB::table('products_attr')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->where(['products_attr.products_id'=>$list->id])
                ->get();
        }

        // Hot product
        $result['home_products_hot']=DB::table('products')
                ->where(['status'=>1])
                ->where(['type'=>2])
                ->limit(8)
                ->get();


        foreach($result['home_products_hot'] as $list){
            $result['home_products_hot_attr'][$list->id] = DB::table('products_attr')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->where(['products_attr.products_id'=>$list->id])
                ->get();
        }

        // Sale products
        $result['home_products_sale']=DB::table('products')
                ->where(['status'=>1])
                ->where(['type'=>3])
                ->limit(8)
                ->get();


        foreach($result['home_products_sale'] as $list){
            $result['home_products_sale_attr'][$list->id] = DB::table('products_attr')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->where(['products_attr.products_id'=>$list->id])
                ->get();
        }
        // echo "<pre>";
        // print_r($result);
        // die();
        
        return view('front.index', $result);
    }
    
    public function product(Request $request,$slug) {
        $result['product']=
            DB::table('products')
            ->where(['status'=>1])
            ->where(['slug'=>$slug])
            ->get();

        foreach($result['product'] as $list1){
            $result['product_attr'][$list1->id]=
                DB::table('products_attr')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->where(['products_attr.products_id'=>$list1->id])
                ->get();
        }

        foreach($result['product'] as $list1){
            $result['product_img'][$list1->id]=
                DB::table('product_images')
                ->where(['product_images.products_id'=>$list1->id])
                ->get();
        }

        $result['related_product']= DB::table('products')
            ->where(['products.category_id'=>$result['product'][0]->category_id])
            ->orderBy('id', 'DESC')
            ->get();

        // echo "<pre>";
        // print_r($result['product_attr'][$list1->id][0]);
        // die();
        
        return view('front.product',$result);
    }

    public function add_to_cart(Request $request) {
        if($request->session()->has('FRONT_USER_LOGIN')){
            $uid = $request->session()->get('FRONT_USER_LOGIN');
            $user_type = "Reg";
        }else{
            $uid = getUserTempId();
            $user_type = "Not-Reg";
        }
        $size_id = $request->post('size_id');
        $pqty = $request->post('pqty');
        $product_id = $request->post('product_id');

        $result=DB::table('products_attr')
            ->select('products_attr.id')
            ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
            ->where(['products_id'=>$product_id])
            ->where(['sizes.size'=>$size_id])
            ->get();
        $product_attr_id = $result[0]->id;

        $check=DB::table('cart')
            ->where(['user_id'=>$uid])
            ->where(['user_type'=>$user_type])
            ->where(['product_id'=>$product_id])
            ->where(['product_attr_id'=>$product_attr_id])
            ->get();
        if(isset($check[0])){
            $update_id=$check[0]->id;
            if($pqty==0){
                DB::table('cart')
                    ->where(['id'=>$update_id])
                    ->delete();
                $msg="Đã xóa sản phẩm";
            }else{
                DB::table('cart')
                    ->where(['id'=>$update_id])
                    ->update(['qty'=>$pqty]);
                $msg="Cập nhật giỏ hàng thành công";
            }
        }else{
            $id=DB::table('cart')->insertGetId([
                'user_id'=>$uid,
                'user_type'=>$user_type,
                'product_id'=>$product_id,
                'product_attr_id'=>$product_attr_id,
                'qty'=>$pqty,
                'added_on'=>date('Y-m-d h:i:s')
            ]);
            $msg="Thêm giỏ hàng thành công";
        }

        return response()->json(['msg'=>$msg]);
    }

    public function cart(Request $request)
    {
        if($request->session()->has('FRONT_USER_LOGIN')){
            $uid=$request->session()->get('FRONT_USER_LOGIN');
            $user_type="Reg";
        }else{
            $uid=getUserTempId();
            $user_type="Not-Reg";
        }
        $result['list']=DB::table('cart')
            ->leftJoin('products','products.id','=','cart.product_id')
            ->leftJoin('products_attr','products_attr.id','=','cart.product_attr_id')
            ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
            ->where(['user_id'=>$uid])
            ->where(['user_type'=>$user_type])
            ->select('cart.qty','products.name','products.image','sizes.size','products.price','products.slug','products.id as pid','products_attr.id as attr_id')
            ->get();
        return view('front.cart',$result);
    }

    public function login(Request $request) {
        if($request->session()->has('FRONT_USER_LOGIN')!=null){
            return redirect('/');
        }
        
        $result=[];
        return view('front.login', $result);
    }

    public function login_process(Request $request)
    {

        $result=DB::table('customers')  
            ->where(['email'=>$request->login_email])
            ->get(); 
        
        if(isset($result[0])){
            // $db_pwd=Crypt::decrypt($result[0]->password);
            $db_pwd=$result[0]->password;
            if($db_pwd==$request->login_password){
                $request->session()->put('FRONT_USER_LOGIN',true);
                $request->session()->put('FRONT_USER_ID',$result[0]->id);
                $request->session()->put('FRONT_USER_NAME',$result[0]->name);
                $status="success";
                $msg="Login successfully";
                
                $getUserTempId=getUserTempId();
                DB::table('cart')  
                    ->where(['user_id'=>$getUserTempId,'user_type'=>'Not-Reg'])
                    ->update(['user_id'=>$result[0]->id,'user_type'=>'Reg']);
            }else{
                $status="error";
                $msg="Please enter valid password !!!";
            }
        }else{
            $status="error";
            $msg="Please enter valid email id !!!";
        }
       return response()->json(['status'=>$status,'msg'=>$msg]); 
    }

    public function checkout(Request $request)
    {
        $result['cart_data']=getAddToCartTotalItem();

        if(isset($result['cart_data'][0])){

            if($request->session()->has('FRONT_USER_LOGIN')){
                $uid=$request->session()->get('FRONT_USER_ID');
                $customer_info=DB::table('customers')  
                    ->where(['id'=> $uid])
                     ->get(); 
                $result['customers']['name']=$customer_info[0]->name;
                $result['customers']['email']=$customer_info[0]->email;
                $result['customers']['mobile']=$customer_info[0]->mobile;
                $result['customers']['address']=$customer_info[0]->address;
            }else{
                $result['customers']['name']='';
                $result['customers']['email']='';
                $result['customers']['mobile']='';
                $result['customers']['address']='';
            }

            return view('front.checkout',$result);
        }else{
            return redirect('/');
        }
    }
}
