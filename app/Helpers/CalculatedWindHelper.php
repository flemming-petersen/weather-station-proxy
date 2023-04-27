<?php

declare(strict_types=1);

namespace App\Helpers;

use App\Models\Station;
use App\Models\Entry;

class CalculatedWindHelper
{
    public static function getCurrentFlattenedMinWindSpeed(Station $station, int $timeRange = 4): float
    {
        $min = Entry::where('station_id', $station->id)
            ->where('created_at', '>=', now()->subMinutes($timeRange))
            ->min('wind_speed');

        if ($min) {
            return round($min, 2);
        }

        return 0;
    }

    public static function getCurrentFlattenedMaxWindSpeed(Station $station, int $timeRange = 4): float
    {
        $max = Entry::where('station_id', $station->id)
            ->where('created_at', '>=', now()->subMinutes($timeRange))
            ->max('wind_speed');

        if ($max) {
            return round($max, 2);
        }

        return 0;
    }

    public static function getCurrentFlattenedAvgWindSpeed(Station $station, int $timeRange = 4): float
    {
        $avg = Entry::where('station_id', $station->id)
            ->where('created_at', '>=', now()->subMinutes($timeRange))
            ->avg('wind_speed');

        if ($avg) {
            return round($avg, 2);
        }

        return 0;
    }

    public static function getCurrentFlattendWindDirection(Station $station, int $timeRange = 4): int
    {
        $dir = Entry::where('station_id', $station->id)
            ->where('created_at', '>=', now()->subMinutes($timeRange))
            ->avg('wind_direction');

        if ($dir) {
            return (int)$dir;
        }

        return 0;
    }


}
