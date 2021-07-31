<?php

namespace App\Providers;

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
        $this->app->bind(
            'App\Services\Contracts\PhoneServiceInterface',
            'App\Services\PhoneService'
        );

        $this->app->bind(
            'App\Models\Contracts\PhoneModelInerface',
            'App\Models\Phone'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
