<?php

namespace Customer\Providers;

use Illuminate\Support\ServiceProvider;
use SebastianBergmann\CodeCoverage\Report\Xml\File;

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
        $moduleName='customers';
        // dd(__DIR__.$ds.'..'.$ds.'resources'.$ds.'views');
        // config([
        //     $moduleName=File::getRequire(__DIR__.$ds.'..'.$ds.'config'.$ds.'route.php')
        // ]);
        $this->loadRoutesFrom(__DIR__.$ds.'..'.$ds.'routes'.$ds.'web.php');
        $this->loadViewsFrom(__DIR__.$ds.'..'.$ds.'resources'.$ds.'views', 'customers');
     
    }
}
