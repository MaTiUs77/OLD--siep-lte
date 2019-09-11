<?php

namespace App\Providers;

use App\Http\Controllers\Api\ApiLogin;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::if('user', function () {
            return ApiLogin::bladeUser();
        });

        Blade::if('rol', function ($rol) {
            return ApiLogin::bladeRol($rol);
        });

        Blade::if('permiso', function ($permiso) {
            return ApiLogin::bladePermiso($permiso);
        });
    }
}
