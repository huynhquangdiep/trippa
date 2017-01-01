<?php

use App\Models\Trip;
use Illuminate\Database\Seeder;

class TripTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trip::truncate();
        factory(Trip::class, config('settings.seed.number_of_trip'))->create();
    }
}
