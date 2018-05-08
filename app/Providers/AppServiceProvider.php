<?php

namespace App\Providers;

use App\Repositories\Imp\VehicleRepository;
use App\Repositories\IVehicleRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IVehicleRepository::class, VehicleRepository::class);
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
