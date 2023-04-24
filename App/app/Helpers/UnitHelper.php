<?php

namespace App\Helpers;

class UnitHelper
{
    public static function mphToKn(float $mph): float
    {
        return $mph * 0.868976;
    }

    public static function fahrenheitToCelsius(float $fahrenheit): float
    {
        return ($fahrenheit - 32) * 5 / 9;
    }

    public static function inHgToHPa(float $inHg): float
    {
        return $inHg * 33.8638866667;
    }
}
