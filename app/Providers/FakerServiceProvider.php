<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Faker\Factory as Faker;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //

        // $this->app-singleton(Faker::class, function(){
        //     return Faker::create();
        // });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
