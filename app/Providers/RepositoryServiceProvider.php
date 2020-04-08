<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\HookahRepositoryInterface;
use App\Repositories\HookahRepositoryEloquent;
use App\Repositories\Interfaces\HookahPlaceRepositoryInterface;
use App\Repositories\HookahPlaceRepositoryEloquent;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\OrderRepositoryEloquent;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            HookahRepositoryInterface::class,
            HookahRepositoryEloquent::class
        );

        $this->app->bind(
            HookahPlaceRepositoryInterface::class,
            HookahPlaceRepositoryEloquent::class
        );

        $this->app->bind(
            OrderRepositoryInterface::class,
            OrderRepositoryEloquent::class
        );
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
