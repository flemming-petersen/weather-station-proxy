<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Station;
use App\Services\WindguruService;
use App\Helpers\CalculatedWindHelper;

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
            $this->info('Sending data for station ' . $station->public_name . '...');
            if (CalculatedWindHelper::getCurrentFlattenedAvgWindSpeed($station)) {
                if ($station->windguru_uid && $station->windguru_salt && $station->windguru_password) {
                    $this->info('Sending data to Windguru...');
                    WindguruService::sendData($station);
                }
            } else {
                $this->info('No data to send.');
            }
        }
        $this->info('Done!');
    }
}
