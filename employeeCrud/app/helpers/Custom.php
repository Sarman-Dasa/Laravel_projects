<?php
    namespace App\helpers;

    class Custom{
        public static function message(string $name)
        {
            return strtoupper($name);
        }
    }
?>