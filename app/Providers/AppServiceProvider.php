<?php

namespace App\Providers;
use App\User;
use App\Controllers\UserActionsObserver;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
         //  parent::boot();
    
           // UserTickets::observe(new \App\Controllers\UserActionsObserver);
        }

}
