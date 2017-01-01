<?php

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::truncate();
        factory(Location::class, config('settings.seed.number_of_location'))->create();
    }
}
