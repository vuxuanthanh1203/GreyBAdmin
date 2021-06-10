<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
        $result['product']= DB::table('products')
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
            ->limit(4)
            ->get();

        // echo "<pre>";
        // print_r($result['product_attr'][$list1->id][0]);
        // die();
        
        return view('front.product',$result);
    }

    public function category(Request $request, $slug)
    {
        $sort="";
        $sort_txt="";
        if($request->get('sort')!==null){
            $sort=$request->get('sort');
        }    

        $query=DB::table('products');
        $query=$query->leftJoin('categories','categories.id','=','products.category_id');
        $query=$query->leftJoin('products_attr','products.id','=','products_attr.products_id');
        $query=$query->where(['products.status'=>1]);
        $query=$query->where(['categories.category_slug'=>$slug]);
        
        if($sort=='name'){
            $query=$query->orderBy('products.name','asc');
            $sort_txt="Product Name";
        }
        if($sort=='date'){
            $query=$query->orderBy('products.id','desc');
            $sort_txt="Date";
        }
        if($sort=='price_desc'){
            $query=$query->orderBy('products.price','desc');
            $sort_txt="Price - DESC";
        }if($sort=='price_asc'){
            $query=$query->orderBy('products.price','asc');
            $sort_txt="Price - ASC";
        }

        $query=$query->distinct()->select('products.*');
        $query=$query->get();
        $result['product']=$query;
        foreach($result['product'] as $list1){
            $query1=DB::table('products_attr');
            $query1=$query1->leftJoin('sizes','sizes.id','=','products_attr.size_id');
            $query1=$query1->where(['products_attr.products_id'=>$list1->id]);
            $query1=$query1->get();

            $result['product_attr'][$list1->id]=$query1;
        }

        $result['categories_left']=DB::table('categories')
        ->where(['status'=>1])
        ->get();

        $result['brands_left']=DB::table('brands')
        ->where(['status'=>1])
        ->get();

        $result['slug']=$slug;
        $result['sort']=$sort;
        $result['sort_txt']=$sort_txt;
        
        return view('front.category',$result);
    }

    public function brand(Request $request, $slug)
    {
        $sort="";
        $sort_txt="";
        if($request->get('sort')!==null){
            $sort=$request->get('sort');
        }    

        $query=DB::table('products');
        $query=$query->leftJoin('brands','brands.id','=','products.brand_id');
        $query=$query->leftJoin('products_attr','products.id','=','products_attr.products_id');
        $query=$query->where(['products.status'=>1]);
        $query=$query->where(['brands.brand_name'=>$slug]);
        
        if($sort=='name'){
            $query=$query->orderBy('products.name','asc');
            $sort_txt="Product Name";
        }
        if($sort=='date'){
            $query=$query->orderBy('products.id','desc');
            $sort_txt="Date";
        }
        if($sort=='price_desc'){
            $query=$query->orderBy('products.price','desc');
            $sort_txt="Price - DESC";
        }if($sort=='price_asc'){
            $query=$query->orderBy('products.price','asc');
            $sort_txt="Price - ASC";
        }

        $query=$query->distinct()->select('products.*');
        $query=$query->get();
        $result['product']=$query;
        foreach($result['product'] as $list1){
            $query1=DB::table('products_attr');
            $query1=$query1->leftJoin('sizes','sizes.id','=','products_attr.size_id');
            $query1=$query1->where(['products_attr.products_id'=>$list1->id]);
            $query1=$query1->get();

            $result['product_attr'][$list1->id]=$query1;
        }

        // $result['categories_left']=DB::table('categories')
        // ->where(['status'=>1])
        // ->get();

        $result['brands_left']=DB::table('brands')
        ->where(['status'=>1])
        ->get();

        $result['slug']=$slug;
        $result['sort']=$sort;
        $result['sort_txt']=$sort_txt;
        
        return view('front.brand',$result);
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

    public function registration(Request $request)
    {
        $result=[];
        return view('front.register',$result);
    }
    
    public function registration_process(Request $request)
    {
       $valid=Validator::make($request->all(),[
            "name"=>'required',
            "email"=>'required|email|unique:customers,email',
            "password"=>'required',
            "mobile"=>'required|numeric|digits:10',
            "address"=>'required',
       ]);

       if(!$valid->passes()){
            return response()->json(['status'=>'error','error'=>$valid->errors()->toArray()]);
       }else{
            $arr=[
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>Crypt::encrypt($request->password),
                "mobile"=>$request->mobile,
                "address"=>$request->address,
                "status"=>1,
                "created_at"=>date('Y-m-d h:i:s'),
                "updated_at"=>date('Y-m-d h:i:s')
            ];
            $query=DB::table('customers')->insert($arr);
            if($query){
                return response()->json(['status'=>'success','msg'=>"Đăng ký thành công"]);
            }

       }
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
                $msg="Đăng nhập thành công";
                
                $getUserTempId=getUserTempId();
                DB::table('cart')  
                    ->where(['user_id'=>$getUserTempId,'user_type'=>'Not-Reg'])
                    ->update(['user_id'=>$result[0]->id,'user_type'=>'Reg']);
            }else{
                $status="error";
                $msg="Mật Khẩu không chính xác !!!";
            }
        }else{
            $status="error";
            $msg="Email không tồn tại !!!";
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

    public function apply_coupon_code(Request $request)
    {
        $arr=apply_coupon_code($request->coupon_code);
        $arr=json_decode($arr,true);

        return response()->json(['status'=>$arr['status'],'msg'=>$arr['msg'],'totalPrice'=>$arr['totalPrice']]);        
    }

    public function place_order(Request $request)
    {
        $rand_id=rand(111111111,999999999);
        if($request->session()->has('FRONT_USER_LOGIN')){

        } else {
            $valid=Validator::make($request->all(),[
                "email"=>'required|email|unique:customers,email'
            ]);
    
            if(!$valid->passes()){
                return response()->json(['status'=>'error','msg'=>"Địa chỉ email đã tồn tại"]);

            }else{
                $arr=[
                    "name"=>$request->name,
                    "email"=>$request->email,
                    "mobile"=>$request->mobile,
                    "address"=>$request->address,
                    "password"=>Crypt::encrypt($rand_id),
                    "mobile"=>$request->mobile,
                    "status"=>1,
                    // "is_verify"=>1,
                    // "rand_id"=>$rand_id,
                    "created_at"=>date('Y-m-d h:i:s'),
                    "updated_at"=>date('Y-m-d h:i:s'),
                    // "is_forgot_password"=>0
                ];

                $user_id=DB::table('customers')->insertGetId($arr);
                $request->session()->put('FRONT_USER_LOGIN',true);
                $request->session()->put('FRONT_USER_ID',$user_id);
                $request->session()->put('FRONT_USER_NAME',$request->name);

                $getUserTempId=getUserTempId();
                DB::table('cart')  
                    ->where(['user_id'=>$getUserTempId,'user_type'=>'Not-Reg'])
                    ->update(['user_id'=>$user_id,'user_type'=>'Reg']);
            }
        }
        $coupon_value=0;
        if($request->coupon_code!=''){
            $arr=apply_coupon_code($request->coupon_code);
            $arr=json_decode($arr,true);
            if($arr['status']=='success'){
                $coupon_value=$arr['coupon_code_value'];
            }else{
                return response()->json(['status'=>'false','msg'=>$arr['msg']]);
            }
        }
        $uid=$request->session()->get('FRONT_USER_ID');
        $totalPrice=0;
        $getAddToCartTotalItem=getAddToCartTotalItem();
        foreach($getAddToCartTotalItem as $list){
            $totalPrice=$totalPrice+($list->qty*$list->price);
        }  
        $arr=[
            "customers_id"=>$uid,
            "name"=>$request->name,
            "email"=>$request->email,
            "mobile"=>$request->mobile,
            "address"=>$request->address,
            "note"=>$request->note,
            "coupon_code"=>$request->coupon_code,
            "coupon_value"=>$coupon_value,
            "payment_type"=>$request->payment_type,
            "total_amt"=>$totalPrice,
            "orders_status"=>1,
            "created_at"=>date('Y-m-d h:i:s'),
            "updated_at"=>date('Y-m-d h:i:s')
        ];
        $order_id=DB::table('orders')->insertGetId($arr);

        if($order_id>0){
            foreach($getAddToCartTotalItem as $list){
                $prductDetailArr['product_id']=$list->pid;
                $prductDetailArr['products_attr_id']=$list->attr_id;
                $prductDetailArr['price']=$list->price;
                $prductDetailArr['qty']=$list->qty;
                $prductDetailArr['orders_id']=$order_id;
                DB::table('orders_details')->insert($prductDetailArr);
            }  
            
            
            if ($request->payment_type=='ATM') {
                return redirect('paypal');
            }
            
            DB::table('cart')->where(['user_id'=>$uid,'user_type'=>'Reg'])->delete();
            $request->session()->put('ORDER_ID',$order_id);
            $request->session()->put('TOTAL_PRICE',$totalPrice);


            $status="success";
            $msg="Đặt hàng thành công";
        }else{
            $status="error";
            $msg="Xin hãy thử lại sau một vài giây";
        }
        return response()->json(['status'=>$status,'msg'=>$msg]); 
    }

    public function order_placed(Request $request)
    {
        if($request->session()->has('ORDER_ID')){
            return view('front.order_placed');
        }else{
            return redirect('/');
        }
    }
    
    
}
