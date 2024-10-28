<?php
namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Get the current locale from the session or default config
        $locale = Session::get('locale', config('app.locale'));

        // Add the appropriate view directory for the locale
        View::addLocation(resource_path("views/{$locale}"));
    }

    public function register()
    {
        //
    }
}
