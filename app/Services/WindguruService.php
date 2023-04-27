<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Station;
use App\Helpers\CalculatedWindHelper;

class WindguruService
{
    public static function sendData(Station $station): void
    {
        $response = Http::get('http://www.windguru.cz/upload/api.php', [
            'uid' => $station->windguru_uid,
            'salt' => $station->windguru_salt,
            'hash' => md5($station->windguru_salt . $station->windguru_uid . $station->windguru_password),
            'temperature' => $station->entries->last()->temperature,
            'rh' => $station->entries->last()->humidity,
            'interval' => config('app.update_interval'),
            'wind_avg' => CalculatedWindHelper::getCurrentFlattenedAvgWindSpeed($station),
            'wind_max' => CalculatedWindHelper::getCurrentFlattenedMaxWindSpeed($station),
            'wind_min' => CalculatedWindHelper::getCurrentFlattenedMinWindSpeed($station),
            'wind_direction' => $station->entries->last()->wind_direction,
        ]);

        return;
    }
}
