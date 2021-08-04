<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {
            $min_price = DB::table('products')->min('price');
            $max_price = DB::table('products')->max('price');
            $max_price_range = $max_price + 1502000;
            $min_price_range = $min_price - 38000;

            $view->with('min_price',$min_price)->with('max_price',$max_price)
            ->with('max_price_range',$max_price_range)->with('min_price_range',$min_price_range);
        });
    }
}
