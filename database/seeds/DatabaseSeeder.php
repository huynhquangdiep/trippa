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
        $this->call(RelationshipTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(LocationTableSeeder::class);
        $this->call(CardTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(TripTableSeeder::class);
        $this->call(CardTripTableSeeder::class);
        $this->call(LikeTableSeeder::class);
        Model::reguard();
    }
}
