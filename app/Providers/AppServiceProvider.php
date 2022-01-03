<?php

namespace App\Providers;

use App\Http\helpers\AdminCart;
use App\Models\Brand;
use App\Models\Category;
use App\Http\helpers\AdminShoppingCart;
use App\Http\helpers\CustomerCart;
use App\Http\helpers\MyCartInterface;
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
        $this->app->bind(MyCartInterface::class,function(){
            //if user is login use AdminCart 
           if(auth()->guard('web')->check())
            {
                return new AdminCart();
            }
            
            //else custoemrcart
            return new CustomerCart();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
          
    }
}
