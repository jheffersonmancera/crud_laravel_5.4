<?php

namespace Rimorsoft\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;//*1

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(150);//*2
    }
}
