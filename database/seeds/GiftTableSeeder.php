<?php

use App\Models\Gift;
use Illuminate\Database\Seeder;

class GiftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gift::truncate();
        factory(Gift::class, config('settings.seed.number_of_gift'))->create();
    }
}
