<?php

namespace App\Providers;

use App\Models\Cat;
use App\Models\Setting;
use App\Models\SiteContent;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('front.inc.header', function($view) {
            $view->with('cats', Cat::select('id', 'name')->get());
            $view->with('sett', Setting::select('logo', 'single_page_logo', 'favicon')->first());
            // $view->with('footer_content', SiteContent::select('content')->where('name', 'footer')->first());

        });

        view()->composer('front.inc.footer', function($view) {
            $view->with('sett', Setting::first());
            // $view->with('footer_content', SiteContent::first());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
