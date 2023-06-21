<?php

namespace Database\Seeders;

use App\Models\Entry;
use App\Models\Station;
use Illuminate\Database\Seeder;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stations = Station::all();
        foreach ($stations as $station) {
            Entry::factory()->count(10)->create([
                'station_id' => $station->id,
            ]);
        }
    }
}
