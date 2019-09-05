<?php

namespace App\Http\Middleware;

use Closure;
use Elnooronline\LaravelLocales\Facades\Locales;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class DashboardLanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($language = Session::get('language')) {
            App::setLocale($language);
        }

        Config::set(['adminlte.appearence.dir' => Locales::getDir()]);

        return $next($request);
    }
}
