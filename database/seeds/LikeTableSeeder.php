<?php

use App\Models\Like;
use Illuminate\Database\Seeder;

class LikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Like::truncate();
        factory(Like::class, 10)->create();
    }
}
