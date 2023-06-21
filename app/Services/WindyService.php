<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\CalculatedWindHelper;
use App\Helpers\UnitHelper;
use App\Models\Station;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WindyService
{
    public static function sendData(Station $station): void
    {
        try {
            Http::get('https://stations.windy.com./pws/update/'.$station->windy_key, [
                'ts' => time(),
                'station' => $station->windy_station_id,
                'name' => $station->public_name,
                'latitude' => $station->latitude,
                'longitude' => $station->longitude,
                'temp' => $station->entries->last()->temperature,
                'wind' => UnitHelper::knToMs(CalculatedWindHelper::getCurrentFlattenedAvgWindSpeed($station)),
                'winddir' => CalculatedWindHelper::getCurrentFlattendWindDirection($station),
                'gust' => UnitHelper::knToMs(CalculatedWindHelper::getCurrentFlattenedMaxWindSpeed($station)),
                'rh' => $station->entries->last()->humidity,
                'dewpoint' => $station->entries->last()->dew_point,
                'pressure' => $station->entries->last()->pressure,
                'uv' => $station->entries->last()->uv,
            ]);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }
}
