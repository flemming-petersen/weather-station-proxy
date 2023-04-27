<?php

declare(strict_types=1);

namespace App\Helpers;

class UnitHelper
{
    public static function mphToKn(float $mph): float
    {
        return $mph * 0.868976;
    }

    public static function fahrenheitToCelsius(float $fahrenheit): float
    {
        return round(($fahrenheit - 32) * 5 / 9, 1);
    }

    public static function inHgToHPa(float $inHg): float
    {
        return round($inHg * 33.8638866667, 0);
    }

    public static function inToMm(float $in): float
    {
        return round($in * 25.4,0);
    }

    public static function calculateWindDirection(float $windDirection): string
    {
        $directions = [
            'N',
            'NNE',
            'NE',
            'ENE',
            'E',
            'ESE',
            'SE',
            'SSE',
            'S',
            'SSW',
            'SW',
            'WSW',
            'W',
            'WNW',
            'NW',
            'NNW',
        ];

        $direction = $directions[round($windDirection / 22.5) % 16];

        return $direction;
    }
}
