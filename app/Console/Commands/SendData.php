<?php

namespace App\Console\Commands;

use App\Helpers\CalculatedWindHelper;
use App\Models\Station;
use App\Services\WindguruService;
use App\Services\WindyService;
use Illuminate\Console\Command;

class SendData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'foerde:send-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Will send all Stations data to services.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Sending data...');
        $stations = Station::all();
        foreach ($stations as $station) {
            if (CalculatedWindHelper::getCurrentFlattenedAvgWindSpeed($station)) {
                $this->info('Sending data of '. $station->public_name);
                if (isset($station->windguru_uid) && isset($station->windguru_salt) && isset($station->windguru_password)) {
                    $this->info('Sending data to Windguru...');
                    WindguruService::sendData($station);
                }
                if (isset($station->windy_station_id) && isset($station->windy_key)) {
                    $this->info('Sending data to Windy...');
                    WindyService::sendData($station);
                }
            } else {
                $this->info('No data to send.');
            }
        }
        $this->info('Done!');
    }
}
