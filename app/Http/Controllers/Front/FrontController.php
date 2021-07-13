<?php

namespace App\Http\Controllers\Front;

use App\Models\orders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Crypt;
use Mail;

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
                ->limit(10)
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
            // ->leftJoin('categories','categories.id','=','products.category_id')
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
            $result['product_images'][$list1->id]=
                DB::table('product_images')
                ->where(['product_images.products_id'=>$list1->id])
                ->get();
        }
        $result['related_product']=
            DB::table('products')
            ->where(['status'=>1])
            ->where('slug','!=',$slug)
            ->where(['category_id'=>$result['product'][0]->category_id])
            ->get();
        foreach($result['related_product'] as $list1){
            $result['related_product_attr'][$list1->id]=
                DB::table('products_attr')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->where(['products_attr.products_id'=>$list1->id])
                ->get();
        }
        
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
        // if($request->get('filter_price_start')!==null && $request->get('filter_price_end')!==null){
        //     $filter_price_start=$request->get('filter_price_start');
        //     $filter_price_end=$request->get('filter_price_end');

        //     if($filter_price_start>0 && $filter_price_end>0){
        //         $query=$query->whereBetween('products_attr.price',[$filter_price_start,$filter_price_end]);
        //     }
        // }  

        // $query=$query->distinct()->select('products.*');
        // $query=$query->get();
        // $query=$query->distinct()->select('products.*')->paginate(9);
        $query=$query->distinct()->select('products.*')->paginate(9, ['products.id']);


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
        // $result['filter_price_start']=$filter_price_start;
        // $result['filter_price_end']=$filter_price_end;
        
        
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

        // $query=$query->distinct()->select('products.*');
        // $query=$query->get();
        $query=$query->distinct()->select('products.*')->paginate(9);
        


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
            $uid = $request->session()->get('FRONT_USER_ID');
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
                $msg="Product removed";
            }else{
                DB::table('cart')
                    ->where(['id'=>$update_id])
                    ->update(['qty'=>$pqty]);
                $msg="Cart update successful";
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
            $msg="Add to cart successfully";
        }

        return response()->json(['msg'=>$msg]);
    }

    public function cart(Request $request)
    {
        if($request->session()->has('FRONT_USER_LOGIN')){
            $uid=$request->session()->get('FRONT_USER_ID');
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
            $rand_id=rand(111111111,999999999);
            $arr=[
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>Crypt::encrypt($request->password),
                "mobile"=>$request->mobile,
                "address"=>$request->address,
                "status"=>1,
                "is_verify"=>0,
                "is_forgot_password"=>0,
                "rand_id"=>$rand_id,
                "created_at"=>date('Y-m-d h:i:s'),
                "updated_at"=>date('Y-m-d h:i:s')
            ];
            $query=DB::table('customers')->insert($arr);
            if($query){

                $data=['name'=>$request->name,'rand_id'=>$rand_id];
                $user['to']=$request->email;
                Mail::send('front/email_verification',$data,function($messages) use ($user){
                    $messages->to($user['to']);
                    $messages->subject('Email Id Verification');
                });

                return response()->json(['status'=>'success','msg'=>"Sign Up Success. Please check your email to verify your account"]);
            }

       }
    }

    public function email_verification(Request $request,$id)
    {
        $result=DB::table('customers')  
            ->where(['rand_id'=>$id])
            ->where(['is_verify'=>0])
            ->get(); 

        if(isset($result[0])){
            DB::table('customers')  
            ->where(['id'=>$result[0]->id])
            ->update(['is_verify'=>1,'rand_id'=>'']);
        return view('front.verification');
        }else{
            return redirect('/');
        }
    }

    public function login_process(Request $request)
    {

        $result=DB::table('customers')  
            ->where(['email'=>$request->login_email])
            ->get(); 
        
        if(isset($result[0])){
            $db_pwd=Crypt::decrypt($result[0]->password);
            // $db_pwd=$result[0]->password;
            $status=$result[0]->status;
            $is_verify=$result[0]->is_verify;

            if($is_verify==0){
                return response()->json(['status'=>"error",'msg'=>'Please verify your email address!']); 
            }
            if($status==0){
                return response()->json(['status'=>"error",'msg'=>'Your account has been disabled!']); 
            }

            if($db_pwd==$request->login_password){
                $request->session()->put('FRONT_USER_LOGIN',true);
                $request->session()->put('FRONT_USER_ID',$result[0]->id);
                $request->session()->put('FRONT_USER_NAME',$result[0]->name);
                $status="success";
                $msg="Logged in successfully";
                
                $getUserTempId=getUserTempId();
                DB::table('cart')  
                    ->where(['user_id'=>$getUserTempId,'user_type'=>'Not-Reg'])
                    ->update(['user_id'=>$result[0]->id,'user_type'=>'Reg']);
            }else{
                $status="error";
                $msg="Incorrect password !!!";
            }
        }else{
            $status="error";
            $msg="Email does not exist !!!";
        }
       return response()->json(['status'=>$status,'msg'=>$msg]); 
    }

    public function get_password(Request $request) {
        return view('front.get_password');
    }

    public function forgot_password(Request $request)
    {
        $result=DB::table('customers')  
            ->where(['email'=>$request->forgot_email])
            ->get(); 
        $rand_id=rand(111111111,999999999);
        if(isset($result[0])){

            DB::table('customers')  
                ->where(['email'=>$request->forgot_email])
                ->update(['is_forgot_password'=>1,'rand_id'=>$rand_id]);

            $data=['name'=>$result[0]->name,'rand_id'=>$rand_id];
            $user['to']=$request->forgot_email;
            Mail::send('front/forgot_email',$data,function($messages) use ($user){
                $messages->to($user['to']);
                $messages->subject("Forgot Password");
            });
            return response()->json(['status'=>'success','msg'=>'Please check your email for the password']); 
        }else{
            return response()->json(['status'=>'error','msg'=>'Email is not registered']); 
        }
    }

    public function forgot_password_change(Request $request,$id)
    {
        $result=DB::table('customers')  
            ->where(['rand_id'=>$id])
            ->where(['is_forgot_password'=>1])
            ->get(); 

        if(isset($result[0])){
            $request->session()->put('FORGOT_PASSWORD_USER_ID',$result[0]->id);
        
            return view('front.forgot_password_change');
        }else{
            return redirect('/');
        }
    }

    public function forgot_password_change_process(Request $request)
    {
        DB::table('customers')  
            ->where(['id'=>$request->session()->get('FORGOT_PASSWORD_USER_ID')])
            ->update(
                [
                    'is_forgot_password'=>0,
                    'password'=>Crypt::encrypt($request->password)   ,
                    'rand_id'=>''
                ]
            ); 
        return response()->json(['status'=>'success','msg'=>'Change password successfully']);     
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

        //     echo "<pre>";
        // print_r($result);
        // die();
            return view('front.checkout',$result);
        }else{
            return redirect('/');
        }
    }

    public function apply_coupon_code(Request $request)
    {
        
        $totalPrice=0;
        $value = 0;
        $type = "";
        $result=DB::table('coupons')  
            ->where(['code'=>$request->coupon_code])
            ->get(); 
        
        if(isset($result[0])){
            $value=$result[0]->value;
            $type=$result[0]->type;
            $getAddToCartTotalItem=getAddToCartTotalItem();
            
            foreach($getAddToCartTotalItem as $list){
                $totalPrice=$totalPrice+($list->qty*$list->price);
            }  
            if($result[0]->status==1){
                if($result[0]->is_one_time==1){
                    $status="error";
                    $msg="Coupon code already used";    
                }else{
                    $min_order_amt=$result[0]->min_order_amt;
                    if($min_order_amt>0){
                        if($min_order_amt<$totalPrice){
                            $status="success";
                            $msg="Coupon code applied";
                        }else{
                            $status="error";
                            $msg="Cart amount must be greater then $min_order_amt";
                        }
                    }else{
                         $status="success";
                         $msg="Coupon code applied";
                    }
                }
            }else{
                $status="error";
                $msg="Coupon code deactivated";   
            }
            
        }else{
           $status="error";
           $msg="Please enter valid coupon code";
        }
        
       
        if($status=='success'){
            if($type=='Value'){
                $totalPrice=$totalPrice-$value;
            }if($type=='Per'){
                $newPrice=($value/100)*$totalPrice;
                $totalPrice=round($totalPrice-$newPrice);
            }
        }

        return response()->json(['status'=>$status,'msg'=>$msg,'totalPrice'=>$totalPrice, 'couponValue'=>$value, 'couponType'=>$type]);      
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
                return response()->json(['status'=>'error','msg'=>"Email address already exists"]);

            }else{
                $arr=[
                    "name"=>$request->name,
                    "email"=>$request->email,
                    "mobile"=>$request->mobile,
                    "address"=>$request->address,
                    "password"=>Crypt::encrypt($rand_id),
                    "mobile"=>$request->mobile,
                    "status"=>1,
                    "is_verify"=>1,
                    "rand_id"=>$rand_id,
                    "created_at"=>date('Y-m-d h:i:s'),
                    "updated_at"=>date('Y-m-d h:i:s'),
                    "is_forgot_password"=>0
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
            $msg="Order Success";
        }else{
            $status="error";
            $msg="Please try again in a few seconds";
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
    
    public function order(Request $request)
    {
        $countP = 0;
        $countS = 0;
        $countR = 0;
        $countF = 0;

        $result['ordersP']=DB::table('orders')
        ->select('orders.*','orders_status.orders_status')
        ->leftJoin('orders_status','orders_status.id','=','orders.orders_status')
        ->where(['orders.orders_status'=>1])
        ->where(['orders.customers_id'=>$request->session()->get('FRONT_USER_ID')])
        ->orderBy('orders.created_at')
        ->get();    

        $countP = count($result['ordersP']);

        $result['ordersS']=DB::table('orders')
        ->select('orders.*','orders_status.orders_status')
        ->leftJoin('orders_status','orders_status.id','=','orders.orders_status')
        ->where(['orders.orders_status'=>2])
        ->where(['orders.customers_id'=>$request->session()->get('FRONT_USER_ID')])
        ->orderBy('orders.created_at')
        ->get();    

        $countS = count($result['ordersS']);

        $result['ordersR']=DB::table('orders')
        ->select('orders.*','orders_status.orders_status')
        ->leftJoin('orders_status','orders_status.id','=','orders.orders_status')
        ->where(['orders.orders_status'=>4])
        ->where(['orders.customers_id'=>$request->session()->get('FRONT_USER_ID')])
        ->orderBy('orders.created_at')
        ->get();    

        $countR = count($result['ordersR']);

        $result['ordersF']=DB::table('orders')
        ->select('orders.*','orders_status.orders_status')
        ->leftJoin('orders_status','orders_status.id','=','orders.orders_status')
        ->where(['orders.orders_status'=>3])
        ->where(['orders.customers_id'=>$request->session()->get('FRONT_USER_ID')])
        ->orderBy('orders.created_at')
        ->get();    

        $countF = count($result['ordersR']);

        $result['countP'] = $countP;
        $result['countS'] = $countS;
        $result['countR'] = $countR;
        $result['countF'] = $countF;
        return view('front.order',$result);

    }

    public function order_detail(Request $request,$id)
    {
        $result['orders_details']=
                DB::table('orders_details')
                ->select('orders.*', 'orders_details.price','orders_details.qty','products.name as pname', 'products.slug as pslug', 'products.price as pprice', 'products.image as pimage','sizes.size','orders_status.orders_status')
                ->leftJoin('orders','orders.id','=','orders_details.orders_id')
                ->leftJoin('products_attr','products_attr.id','=','orders_details.products_attr_id')
                ->leftJoin('products','products.id','=','products_attr.products_id')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->leftJoin('orders_status','orders_status.id','=','orders.orders_status')
                ->where(['orders.id'=>$id])
                ->get();
        return view('front.order_detail',$result);
    }
    
    public function my_account(Request $request, $id='')
    {
        $arr = DB::table('customers')
        ->where(['id'=>$id])
        ->where(['status'=>1])
        ->get();
        $result['name'] = $arr['0']->name;
        $result['email'] = $arr['0']->email;
        $result['mobile'] = $arr['0']->mobile;
        $result['address'] = $arr['0']->address;
        $result['id'] = $arr['0']->id; 

        return view('front.my_account',$result);
    }

    public function profile_process(Request $request)
    {       
        $userUpdate = [
            'name' => $request->name,
            'mobile' => $request->mobile,
            'address' => $request->address
        ];
        DB::table('customers')->where('id',$request->id)->update($userUpdate);
        $message = "Profile updated !";
        $request->session()->flash('success', $message);
        return redirect('/');
    }
    
    public function change_password(Request $request, $id='')
    {
        $arr = DB::table('customers')
        ->where(['id'=>$id])
        ->where(['status'=>1])
        ->get();
        $result['id'] = $arr['0']->id; 

        return view('front.change_password', $result);
    }

    public function change_password_process(Request $request)
    {
        $password = $request->post('current_password');

        $result = DB::table('customers')->where(['id'=>session('FRONT_USER_ID')])->first();

        if ($result) {
            if ($password == $result->password) {
                // if (Hash::check($password, $result->password)) {
                // $model = DB::table('customers')->find($request->post('id'));
                // $model->password = Hash::make($request->post('new_password'));
                // $model->save();

                // $request->session()->flash('success', 'Password Changed Successfully');
                // session()->forget('FRONT_USER_LOGIN');
                // session()->forget('FRONT_USER_ID');
                // session()->forget('FRONT_USER_NAME');
                // session()->forget('USER_TEMP_ID');
                // return redirect('/login');
                echo 'Đúng';
            } else {
                $request->session()->flash('error','Please enter correct password !!!');
                return redirect('change_password/'.session('FRONT_USER_ID'));
            }
        }     
    }

    public function status(Request $request, $status, $id)
    {
        $model = orders::find($id);
        $model->orders_status=$status;
        $model->save();
        return response()->json(['status'=>'success','msg'=>'Thank you for choosing us !']);
    }

    public function cancel(Request $request, $status, $id)
    {
        $model = orders::find($id);
        $model->orders_status=$status;
        $model->save();

        return response()->json(['status'=>'success','msg'=>'Order Cancel Successfully']);
    }

    public function search(Request $request,$str)
    {
        $result['product']=
            $query=DB::table('products');
            $query=$query->leftJoin('categories','categories.id','=','products.category_id');
            $query=$query->leftJoin('products_attr','products.id','=','products_attr.products_id');
            $query=$query->where(['products.status'=>1]);
            $query=$query->where('name','like',"%$str%");
            $query=$query->orwhere('short_desc','like',"%$str%");
            $query=$query->orwhere('desc','like',"%$str%");
            $query=$query->orwhere('keywords','like',"%$str%");
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
            $result['key'] = $str;
        return view('front.search',$result);
    }
}
