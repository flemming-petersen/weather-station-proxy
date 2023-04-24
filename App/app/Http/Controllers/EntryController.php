<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;
use App\Models\Entry;
use App\Helpers\UnitHelper;
use Illuminate\Support\Facades\Log;

class EntryController extends Controller
{
    /**
     * @param Request $request
     */
    public function store(Request $request): void
    {
        $station = $this->getStation($request->ID, $request->PASSWORD);

        if (!$station) {
            Log::error('Station not found');
            abort(403, 'Station not found');
        }

        $entry = new Entry();
        $entry->station_id = $station->id;
        $entry->temperature = UnitHelper::fahrenheitToCelsius((float) $request->tempf);
        $entry->humidity = (float) $request->humidity;
        $entry->wind_speed = UnitHelper::mphToKn((float) $request->windspeedmph);
        $entry->wind_gust = UnitHelper::mphToKn((float) $request->windgustmph);
        $entry->wind_direction = (float) $request->winddir;
        $entry->pressure = UnitHelper::inHgToHPa((float) $request->baromin);
        $entry->dew_point = UnitHelper::fahrenheitToCelsius((float) $request->dewptf);
        $entry->save();

        return;
    }

    /**
     * @param string $stattionAlias
     * @param string $stationSecret
     *
     * @return Station|null
     */
    protected function getStation($stattionAlias, $stationSecret): ?Station
    {
        return Station::where('alias', $stattionAlias)
            ->where('secret', $stationSecret)
            ->first();
    }
}
