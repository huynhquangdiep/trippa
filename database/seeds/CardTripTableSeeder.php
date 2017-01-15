<?php

use App\Models\CardTrip;
use Illuminate\Database\Seeder;

class CardTripTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CardTrip::truncate();
        factory(CardTrip::class, 10)->create();
    }
}
