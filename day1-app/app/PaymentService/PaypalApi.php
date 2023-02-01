<?php
    
    namespace App\PaymentService;

    class PaypalApi{

        private $transtion_id;
        public function __construct($transtion_id)
        {
            $this->transtion_id = $transtion_id;
        }
        public function pay() : array
        {
            return [
                "amount" => 3200,
                "transtion" => $this->transtion_id
            ];
        }
    }
?>