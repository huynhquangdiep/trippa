<?php

use App\Models\TripLocationMapping;
use Illuminate\Database\Seeder;

class TripLocationMappingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TripLocationMapping::truncate();
        factory(TripLocationMapping::class, config('settings.seed.number_of_trip_location_mapping'))->create();
    }
}
