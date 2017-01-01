<?php

use App\Models\UserGiftMapping;
use Illuminate\Database\Seeder;

class UserGiftMappingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserGiftMapping::truncate();
        factory(UserGiftMapping::class, config('settings.seed.number_of_user_gift_mapping'))->create();
    }
}
