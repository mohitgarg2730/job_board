<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if a session locale is set; otherwise, use the default locale
        $locale = Session::get('locale', config('app.locale'));

        // Set the application locale
        App::setLocale($locale);

        return $next($request);
    }
}
