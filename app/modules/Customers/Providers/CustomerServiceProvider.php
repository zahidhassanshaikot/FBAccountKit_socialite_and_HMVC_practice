<?php

namespace Customer\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class CustomerServiceProvider extends ServiceProvider
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
        // dd('jhih');
        $ds=DIRECTORY_SEPARATOR;
       

        config([
            'route'=>File::getRequire(__DIR__.$ds.'..'.$ds.'config'.$ds.'route.php')
        ]); 
        $this->loadRoutesFrom(__DIR__.$ds.'..'.$ds.'routes'.$ds.'web.php');


        //  dd(config());
        $this->loadViewsFrom(__DIR__.$ds.'..'.$ds.'resources'.$ds.'views', 'Customer');
        $this->loadMigrationsFrom(__DIR__.$ds.'..'.$ds.'database'.$ds.'migrations');
     
    }
}
