<?php

namespace App\Providers;

//namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use \App\Setting;
use \Illuminate\Support\Facades\View;
use \App\ServiceCategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // To pass settings data in frontend header & footer for each view
        View::composer(array('frontend.partial.header', 'frontend.partial.footer'), function ($view) {
            $setting = Setting::all()->toArray();
            $service_category = ServiceCategory::where('parent_category_id', '0')->where('status', '1')->orderby('id', 'asc')->get()->toArray();
            $view->with('setting', $setting[0])->with('service_category', $service_category);
        });
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
