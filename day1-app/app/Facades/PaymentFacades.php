<?php

    namespace App\Facades;

use App\PaymentService\PaypalApi;
use Illuminate\Support\Facades\Facade as FacadesFacade;

    class PaymentFacades extends FacadesFacade{
        
        public static function getFacadeAccessor()
        {
            return PaypalApi::class;
        }
    }
?>