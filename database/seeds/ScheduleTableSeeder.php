<?php

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::truncate();
        factory(Schedule::class, config('settings.seed.number_of_schedule'))->create();
    }
}
