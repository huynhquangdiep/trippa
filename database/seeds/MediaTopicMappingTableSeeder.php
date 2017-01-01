<?php

use App\Models\MediaTopicMapping;
use Illuminate\Database\Seeder;

class MediaTopicMappingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MediaTopicMapping::truncate();
        factory(MediaTopicMapping::class, config('settings.seed.number_of_media_topic_mapping'))->create();
    }
}
