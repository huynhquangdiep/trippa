<?php

use App\Models\Conversation;
use Illuminate\Database\Seeder;

class ConversationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conversation::truncate();
        factory(Conversation::class, config('settings.seed.number_of_conversation'))->create();
    }
}
