<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\OrdersController;

use App\Http\Controllers\Front\FrontController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontController::class, 'index']);
Route::get('product/{id}',[FrontController::class,'product']);
Route::post('add_to_cart', [FrontController::class, 'add_to_cart']);
Route::get('cart', [FrontController::class, 'cart']);
Route::get('login', [FrontController::class, 'login']);
Route::post('login_process', [FrontController::class, 'login_process'])->name('login.login_process');
Route::get('/checkout', [FrontController::class, 'checkout']);
Route::get('logout', function () {
    session()->forget('FRONT_USER_LOGIN');
    session()->forget('FRONT_USER_ID');
    session()->forget('FRONT_USER_NAME');
    session()->forget('USER_TEMP_ID');
    return redirect('/');
});




Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::get('admin/profile/manage_profile/{id}', [AdminController::class, 'manage_profile']);
Route::get('admin/change_password/{id}', [AdminController::class, 'change_password']);
Route::post('admin/profile/profile_process', [AdminController::class, 'profile_process'])->name('admin.profile_process');
Route::post('admin/change_password_process', [AdminController::class, 'change_password_process'])->name('admin.change_password_process');



Route::group(['middleware'=>'admin_auth'],function(){
    // Category
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('admin/category', [CategoryController::class, 'index']);
    Route::get('admin/category/manage_category', [CategoryController::class, 'manage_category']);
    Route::post('admin/category/manage_category_process', [CategoryController::class, 'manage_category_process'])->name('category.manage_category_process');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);
    Route::get('admin/category/manage_category/{id}', [CategoryController::class, 'manage_category']);
    Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'status']);

    // Coupon
    Route::get('admin/coupon', [CouponController::class, 'index']);
    Route::get('admin/coupon/manage_coupon', [CouponController::class, 'manage_coupon']);
    Route::post('admin/coupon/manage_coupon_process', [CouponController::class, 'manage_coupon_process'])->name('coupon.manage_coupon_process');
    Route::get('admin/coupon/delete/{id}', [CouponController::class, 'delete']);
    Route::get('admin/coupon/manage_coupon/{id}', [CouponController::class, 'manage_coupon']);
    Route::get('admin/coupon/status/{status}/{id}', [CouponController::class, 'status']);

    // Size
    Route::get('admin/size', [SizeController::class, 'index']);
    Route::get('admin/size/manage_size', [SizeController::class, 'manage_size']);
    Route::post('admin/size/manage_size_process', [SizeController::class, 'manage_size_process'])->name('size.manage_size_process');
    Route::get('admin/size/delete/{id}', [SizeController::class, 'delete']);
    Route::get('admin/size/manage_size/{id}', [SizeController::class, 'manage_size']);
    Route::get('admin/size/status/{status}/{id}', [SizeController::class, 'status']);

    // Product
    Route::get('admin/product', [ProductController::class, 'index']);
    Route::get('admin/product/manage_product', [ProductController::class, 'manage_product']);
    Route::post('admin/product/manage_product_process', [ProductController::class, 'manage_product_process'])->name('product.manage_product_process');
    Route::get('admin/product/delete/{id}', [ProductController::class, 'delete']);
    Route::get('admin/product/product_attr_delete/{paid}/{pid}', [ProductController::class, 'product_attr_delete']);
    Route::get('admin/product/product_images_delete/{paid}/{pid}', [ProductController::class, 'product_images_delete']);
    Route::get('admin/product/manage_product/{id}', [ProductController::class, 'manage_product']);
    Route::get('admin/product/status/{status}/{id}', [ProductController::class, 'status']);

    // Brand
    Route::get('admin/brand', [BrandController::class, 'index']);
    Route::get('admin/brand/manage_brand', [BrandController::class, 'manage_brand']);
    Route::post('admin/brand/manage_brand_process', [BrandController::class, 'manage_brand_process'])->name('brand.manage_brand_process');
    Route::get('admin/brand/delete/{id}', [BrandController::class, 'delete']);
    Route::get('admin/brand/manage_brand/{id}', [BrandController::class, 'manage_brand']);
    Route::get('admin/brand/status/{status}/{id}', [BrandController::class, 'status']);

    // Customer
    Route::get('admin/customer', [CustomerController::class, 'index']);
    Route::get('admin/customer/show/{id}', [CustomerController::class, 'show']);
    Route::get('admin/customer/status/{status}/{id}', [CustomerController::class, 'status']);

    // Website
    Route::get('admin/website', [WebsiteController::class, 'index']);
    Route::get('admin/website/manage_website', [WebsiteController::class, 'manage_website']);
    Route::post('admin/website/manage_website_process', [WebsiteController::class, 'manage_website_process'])->name('website.manage_website_process');
    Route::get('admin/website/delete/{id}', [WebsiteController::class, 'delete']);
    Route::get('admin/website/website_images_delete/{paid}/{pid}', [WebsiteController::class, 'website_images_delete']);
    Route::get('admin/website/manage_website/{id}', [WebsiteController::class, 'manage_website']);
    Route::get('admin/website/status/{status}/{id}', [WebsiteController::class, 'status']);

    // Order
    Route::get('admin/order', [OrdersController::class, 'index']);
    Route::get('admin/order_detail/{id}', [OrdersController::class, 'order_detail']);
    Route::get('admin/success', [OrdersController::class, 'success']);
    Route::get('admin/cancel', [OrdersController::class, 'cancel']);
    Route::get('admin/order/status/{status}/{id}', [OrdersController::class, 'status']);


    // Logout
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->forget('ADMIN_NAME');
        session()->flash('msg','Logout successfully !');
        return redirect('admin');
    });
});

