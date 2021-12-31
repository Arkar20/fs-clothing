<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Http\helpers\AdminShoppingCart;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
           $this->app->bind('admincart',function(){
            return new AdminShoppingCart();
       });
    }
}
