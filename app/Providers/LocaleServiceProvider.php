<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Locale;

class LocaleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(Locale::class, function ($app) {
            return new Locale($app);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      Route::bind('locale',function ($name){
          in_array($name,config('app.languages'))? app()->setlocale($name) : abort(404);
        });
    }
}
