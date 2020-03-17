<?php

namespace App\Providers;

use App\Validators\ReserveAvailableValidator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::resolver(function($translator, $data, $rules, $messages) {
            return new ReserveAvailableValidator($translator, $data, $rules, $messages);
        });
    }
}
