<?php

namespace App\Providers;

use App\PaymentService\PaypalApi;
//use Faker\Provider\ar_EG\Payment;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PaypalApi::class,function()
        {
            return new PaypalApi("transtion id :- ".rand(1,100));
        });
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
