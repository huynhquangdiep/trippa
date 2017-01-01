<?php

use App\Models\CategoryTrip;
use Illuminate\Database\Seeder;

class CategoryTripTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryTrip::truncate();
        factory(CategoryTrip::class, config('settings.seed.number_of_category_trip'))->create();
    }
}
