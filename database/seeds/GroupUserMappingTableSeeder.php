<?php

use App\Models\GroupUserMapping;
use Illuminate\Database\Seeder;

class GroupUserMappingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GroupUserMapping::truncate();
        factory(GroupUserMapping::class, config('settings.seed.number_of_group_user_mapping'))->create();
    }
}
