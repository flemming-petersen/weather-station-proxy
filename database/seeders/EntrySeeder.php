<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Station;
use App\Models\Entry;

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
