<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UserTableSeeder::class);
        $this->call(GiftTableSeeder::class);
        $this->call(UserGiftMappingTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(GroupUserMappingTableSeeder::class);
        $this->call(LocationTableSeeder::class);
        $this->call(CategoryTripTableSeeder::class);
        $this->call(TripTableSeeder::class);
        $this->call(TripLocationMappingTableSeeder::class);
        $this->call(CategoryPostTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(ConversationTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(MediaTopicMappingTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(ScheduleTableSeeder::class);
        $this->call(AttachmentTableSeeder::class);
        $this->call(MessageTableSeeder::class);
        Model::reguard();
    }
}
