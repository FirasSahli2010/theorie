<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use Illuminate\Http\Request;
//use Request;

use Carbon\Carbon;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

use Config;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      if (in_array($request->segment(1), Config::get('app.languages')) || Session::has('locale') ) {
        if(in_array($request->segment(1), Config::get('app.languages'))) {
          App::setLocale($request->segment(1));
          Config::set('app.locale_prefix', $request->segment(1));
          session(['locale'=> $request->segment(1)]);
          // $locale = session('locale');
          // echo "$locale";
          // exit();
      }
      else {
        if ( Session::has('locale') ){
          $locale = session('locale');
          // echo "$locale";
          // exit();
          App::setLocale($locale);
          Config::set('app.locale_prefix', $locale);
          App::setLocale($locale);
        }

      }
      }
      else {
        App::setLocale( Config::get('app.fallback_locale'));
        Config::set('app.locale_prefix', Config::get('app.fallback_locale'));
        session(['locale'=> Config::get('app.fallback_locale')]);
      }
      return $next($request);
    }
}
