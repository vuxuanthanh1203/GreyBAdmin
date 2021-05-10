<?php

namespace App\Http\Controllers;

use App\Models\website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WebsiteController extends Controller
{
    public function index()
    {
        $result['data'] = Website::all();
        return view('admin/website', $result);
    }

    public function manage_website(Request $request, $id='')
    {
        if ($id > 0) {
            $arr = Website::where(['id'=>$id])->get();
            
            $result['address'] = $arr['0']->address;
            $result['phone'] = $arr['0']->phone;
            $result['status'] = $arr['0']->status;
            $result['id'] = $arr['0']->id; 

            $bannerArr = DB::table('website_images')->where(['website_id'=>$id])->get();


            if (!isset($bannerArr[0])) {
                $result['bannerArr']['0']['id'] = '';
                $result['bannerArr']['0']['images'] = '';
            } else {
                $result['bannerArr'] = $bannerArr;
            }

        } else {
            $result['address'] = '';
            $result['phone'] = '';
            $result['status'] = '';
            $result['id'] = 0;

            $result['bannerArr']['0']['id'] = '';
            $result['bannerArr']['0']['images'] = '';

        }

        return view('admin/manage_website', $result);
    }

    public function manage_website_process(Request $request)
    {
        $request->validate([
            'image'=>'mimes:jpeg,jpg,png',
            'address'=>'required|unique:websites,address,' .$request->post('id')
        ]);        

        if($request->post('id') > 0) {
            $model = Website::find($request->post('id'));
            $message = "Website infomation updated !";
        } else {
            $model = new Website();
            $message = "Website infomation inserted !";
        }

        
        
        $model->address=$request->post('address');
        $model->phone=$request->post('phone');
        $model->status=1;
        $model->save();
        $wid = $model->id;

        /** Website Image */
        $wiidArr = $request->post('wiid');
        foreach ($wiidArr as $key => $value) {
            $bannerArr['website_id'] = $wid;
            if ($request->hasFile("images.$key")) {
                $rand = rand('111111111', '999999999');
                $images = $request->file("images.$key");
                $ext = $images->extension();
                $image_name = $rand.'.'.$ext;
                $request->file("images.$key")->storeAs('/public/media/Banners', $image_name);
                $bannerArr['images'] = $image_name;

                if($wiidArr[$key] != '') {
                    DB::table('website_images')->where(['id'=>$wiidArr[$key]])->update($bannerArr);
                } else {
                    DB::table('website_images')->insert($bannerArr);
                }
            }
        }
        /** End Website Image */

        $request->session()->flash('message', $message);
        return redirect('admin/website');
    }

    public function delete(Request $request, $id)
    {
        $model = Website::find($id);
        $model->delete();

        $request->session()->flash('message', 'Website infomation deleted !');
        return redirect('admin/website');
    }

    public function website_images_delete(Request $request, $paid, $wid)
    {
        $arrImage = DB::table('website_images')->where(['id'=>$paid])->get();
        if (Storage::exists('public/media/Banners/'.$arrImage[0]->images)) {
            Storage::delete('public/media/Banners/'.$arrImage[0]->images);
        }
        DB::table('website_images')->where(['id'=>$paid])->delete();

        $request->session()->flash('message', 'Image Deleted !');
        return redirect('admin/website/manage_website/'.$wid);
    }
    
    public function status(Request $request, $status, $id)
    {
        $model = Website::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message', 'Website Status Updated !');
        return redirect('admin/website');
    }
}
