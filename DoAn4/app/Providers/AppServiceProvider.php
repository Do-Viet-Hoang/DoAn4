<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\loai_sp;

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
        view()->composer('layouts.home', function ($view){
            $loai= loai_sp::select(['id', 'name'])->get();
            $view->with(compact('loai'));
        });
    }
}
