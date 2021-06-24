<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('ADMIN_LOGIN')) {
            return redirect('admin/dashboard');
        } else {
            return view('admin.login');
        }
        return view('admin.login');
    }

    
    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');

        $result = Admin::where(['email'=>$email])->first();

        if ($result) {
            if (Hash::check($request->post('password'), $result->password)) {
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                $request->session()->put('ADMIN_NAME', $result->firstName);
                $request->session()->put('ADMIN_AVT', $result->image);
                return redirect('admin/dashboard');
            } else {
                $request->session()->flash('error','Please enter correct password !!!');
                return redirect('admin');
            }
        } else {
            $request->session()->flash('error','Please enter valid login details !!!');
            return redirect('admin');
        }        
    }

    public function dashboard()
    {
        $countS = 0;
        $countO = 0;
        $countC = 0;
        $countP = 0;

        $result['sale'] = DB::table('orders')->get();
        $countO = count($result['sale']);

        $countS = 7830000;

        $result['cus'] = DB::table('customers')
        ->where('customers.status', '=', 1)
        ->get();
        $countC = count($result['cus']);

        $result['pro'] = DB::table('products')
        ->where('products.status', '=', 1)
        ->get();
        $countP = count($result['pro']);        

        
        
        $result['countS'] = $countS;
        $result['countO'] = $countO;
        $result['countC'] = $countC;
        $result['countP'] = $countP;
        return view('admin/dashboard', $result);
    }

    public function manage_profile(Request $request, $id='')
    {
        $arr = Admin::where(['id'=>$id])->get();
        $result['email'] = $arr['0']->email;
        $result['firstName'] = $arr['0']->firstName;
        $result['lastName'] = $arr['0']->lastName;
        $result['image'] = $arr['0']->image;
        $result['phone'] = $arr['0']->phone;
        $result['address'] = $arr['0']->address;
        $result['id'] = $arr['0']->id; 
        
        return view('admin/profile', $result);
    }

    public function profile_process(Request $request)
    {       
        
        if($request->post('id') > 0) {
            $model = Admin::find($request->post('id'));
            $message = "Profile updated !";
        } 

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->extension();
            $image_name = time().'.'.$ext;
            $image->storeAs('/public/media/Users', $image_name);
            $model->image = $image_name;
        }
        
        $model->firstName=$request->post('firstName');
        $model->lastName=$request->post('lastName');
        $model->phone=$request->post('phone');
        $model->address=$request->post('address');
        $model->save();

        

        if ($request->session()->has('ADMIN_ID')) {
            $result = Admin::where(['id'=>session('ADMIN_ID')])->first();
            $request->session()->put('ADMIN_NAME', $result->firstName);
            $request->session()->put('ADMIN_AVT', $result->image);
        }

        $request->session()->flash('message', $message);
        return redirect('admin/dashboard');
    }

    public function change_password(Request $request, $id='')
    {
        $arr = Admin::where(['id'=>$id])->get();
        $result['id'] = $arr['0']->id; 

        return view('admin/change_password', $result);
    }


    public function change_password_process(Request $request)
    {
        $password = $request->post('current_password');

        $result = Admin::where(['id'=>session('ADMIN_ID')])->first();

        if ($result) {
            if (Hash::check($password, $result->password)) {
                $model = Admin::find($request->post('id'));
                $model->password = Hash::make($request->post('new_password'));
                $model->save();

                $request->session()->flash('change', 'Password Changed Successfully');
                return redirect('admin/dashboard');
            } else {
                $request->session()->flash('error','Please enter correct password !!!');
                return redirect('admin/change_password/'.session('ADMIN_ID'));
            }
        }     
    }
    
}
