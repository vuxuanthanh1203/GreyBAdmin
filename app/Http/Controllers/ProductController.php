<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $result['data'] = Product::leftJoin('brands','brands.id','=','products.brand_id')
        ->leftJoin('categories','categories.id','=','products.category_id')
        ->get(['products.*', 'categories.category_name', 'brands.brand_name']);
        
        return view('admin/product', $result);
    }

    public function manage_product(Request $request, $id='')
    {
        if ($id > 0) {
            $arr = Product::where(['id'=>$id])->get();
            
            $result['category_id'] = $arr['0']->category_id;
            $result['name'] = $arr['0']->name;
            $result['slug'] = $arr['0']->slug;
            $result['image'] = $arr['0']->image;
            $result['code'] = $arr['0']->code;
            $result['mrp'] = $arr['0']->mrp;
            $result['price'] = $arr['0']->price;
            $result['brand_id'] = $arr['0']->brand_id;
            // $result['model'] = $arr['0']->model;
            $result['type'] = $arr['0']->type;
            $result['short_desc'] = $arr['0']->short_desc;
            $result['desc'] = $arr['0']->desc;
            $result['keywords'] = $arr['0']->keywords;
            $result['status'] = $arr['0']->status;
            $result['id'] = $arr['0']->id; 

            $result['productAttrArr'] = DB::table('products_attr')->where(['products_id'=>$id])->get();

            $productImagesArr = DB::table('product_images')->where(['products_id'=>$id])->get();


            if (!isset($productImagesArr[0])) {
                $result['productImagesArr']['0']['id'] = '';
                $result['productImagesArr']['0']['images'] = '';
            } else {
                $result['productImagesArr'] = $productImagesArr;
            }

        } else {
            $result['category_id'] = '';
            $result['name'] = '';
            $result['slug'] = '';
            $result['image'] = '';
            $result['code'] = '';
            $result['mrp'] = '';
            $result['price'] = '';
            $result['brand_id'] = '';
            $result['type'] = '';
            // $result['model'] = '';
            $result['short_desc'] = '';
            $result['desc'] = '';
            $result['keywords'] = '';
            $result['status'] = '';
            $result['id'] = 0;

            $result['productAttrArr'][0]['id'] = '';
            $result['productAttrArr'][0]['products_id'] = '';
            $result['productAttrArr'][0]['sku'] = '';
            // $result['productAttrArr'][0]['mrp'] = '';
            // $result['productAttrArr'][0]['price'] = '';
            $result['productAttrArr'][0]['qty'] = '';
            $result['productAttrArr'][0]['size_id'] = '';

            $result['productImagesArr']['0']['id'] = '';
            $result['productImagesArr']['0']['images'] = '';

        }

        $result['category'] = DB::table('categories')->where(['status'=>1])->get();

        $result['sizes'] = DB::table('sizes')->where(['status'=>1])->get();

        $result['brands'] = DB::table('brands')->where(['status'=>1])->get();

        $result['types'] = DB::table('types')->get();

        return view('admin/manage_product', $result);
    }

    public function manage_product_process(Request $request)
    {
        if($request->post('id') > 0) {
            $image_validation = "mimes:jpeg,jpg,png";
        } else {
            $image_validation = "required|mimes:jpeg,jpg,png";
        }

        $request->validate([
            'name'=>'required',
            'image'=>$image_validation,
            'slug'=>'required|unique:products,slug,' .$request->post('id'),
            'code'=>'required|unique:products,code,' .$request->post('id'),
            'images.*'=>'mimes:jpeg,jpg,png'
        ]);

        $paidArr = $request->post('paid');
        $skuArr = $request->post('sku');
        // $mrpArr = $request->post('mrp');
        // $priceArr = $request->post('price');
        $qtyArr = $request->post('qty');
        $size_idArr = $request->post('size_id');
        foreach ($skuArr as $key => $value) {
            $check = DB::table('products_attr')->where('sku', '=', $skuArr[$key])->where('id', '!=', $paidArr[$key])->get();
            if(isset($check[0])){
                $request->session()->flash('error', $skuArr[$key].' SKU Already used!');
                return redirect(request()->headers->get('referer'));
            }
        }
        

        if($request->post('id') > 0) {
            $model = Product::find($request->post('id'));
            $message = "Product updated !";
        } else {
            $model = new Product();
            $message = "Product inserted !";
        }

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->extension();
            $image_name = time().'.'.$ext;
            $image->storeAs('/public/media/Products', $image_name);
            $model->image = $image_name;
        }
        
        $model->category_id=$request->post('category_id');
        $model->name=$request->post('name');
        $model->slug=$request->post('slug');
        $model->code=$request->post('code');
        $model->mrp=$request->post('mrp');
        $model->price=$request->post('price');
        $model->brand_id=$request->post('brand_id');
        // $model->model=$request->post('model');
        $model->type=$request->post('type');
        $model->short_desc=$request->post('short_desc');
        $model->desc=$request->post('desc');
        $model->keywords=$request->post('keywords');

        $model->status=1;
        $model->save();
        $pid = $model->id;

        /**Product Attributes */
        foreach ($skuArr as $key => $value) {
            $productAttrArr['products_id'] = $pid;
            $productAttrArr['sku'] = $skuArr[$key];
            // $productAttrArr['mrp'] = (int)$mrpArr[$key];
            // $productAttrArr['price'] = (int)$priceArr[$key];
            $productAttrArr['qty'] = (int)$qtyArr[$key];
            
            if ($size_idArr[$key]=='') {
                $productAttrArr['size_id'] = 0;
            } else {
                $productAttrArr['size_id'] = $size_idArr[$key];
            }

            if($paidArr[$key] != '') {
                DB::table('products_attr')->where(['id'=>$paidArr[$key]])->update($productAttrArr);
            } else {
                DB::table('products_attr')->insert($productAttrArr);
            }
        }
        /**End Product Attributes */

        /** Product Image */
        $piidArr = $request->post('piid');
        foreach ($piidArr as $key => $value) {
            $productImageArr['products_id'] = $pid;
            if ($request->hasFile("images.$key")) {
                $rand = rand('111111111', '999999999');
                $images = $request->file("images.$key");
                $ext = $images->extension();
                $image_name = $rand.'.'.$ext;
                $request->file("images.$key")->storeAs('/public/media/Products', $image_name);
                $productImageArr['images'] = $image_name;

                if($piidArr[$key] != '') {
                    DB::table('product_images')->where(['id'=>$piidArr[$key]])->update($productImageArr);
                } else {
                    DB::table('product_images')->insert($productImageArr);
                }
            }
        }
        /** End Product Image */

        $request->session()->flash('message', $message);
        return redirect('admin/product');
    }

    public function delete(Request $request, $id)
    {
        $model = Product::find($id);
        $model->delete();

        $request->session()->flash('message', 'Product deleted !');
        return redirect('admin/product');
    }

    public function product_attr_delete(Request $request, $paid, $pid)
    {
        $arrImage = DB::table('products_attr')->where(['id'=>$paid])->get();
        if (Storage::exists('public/media/Products/'.$arrImage[0]->attr_image)) {
            Storage::delete('public/media/Products/'.$arrImage[0]->attr_image);
        }
        DB::table('products_attr')->where(['id'=>$paid])->delete();

        $request->session()->flash('message', 'Product Attribute deleted !');
        return redirect('admin/product/manage_product/'.$pid);
    }

    public function product_images_delete(Request $request, $paid, $pid)
    {
        $arrImage = DB::table('product_images')->where(['id'=>$paid])->get();
        if (Storage::exists('public/media/Products/'.$arrImage[0]->images)) {
            Storage::delete('public/media/Products/'.$arrImage[0]->images);
        }
        DB::table('product_images')->where(['id'=>$paid])->delete();

        $request->session()->flash('message', 'Product Image Deleted !');
        return redirect('admin/product/manage_product/'.$pid);
    }
    
    public function status(Request $request, $status, $id)
    {
        $model = Product::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message', 'Product Status Updated !');
        return redirect('admin/product');
    }
}
