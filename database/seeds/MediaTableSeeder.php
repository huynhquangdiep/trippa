<?php

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Media::truncate();
        factory(Media::class, config('settings.seed.number_of_media'))->create();
    }
}
