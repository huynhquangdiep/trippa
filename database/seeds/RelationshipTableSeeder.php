<?php

use App\Models\Relationship;
use Illuminate\Database\Seeder;

class RelationshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Relationship::truncate();
        factory(Relationship::class, 5)->create();
    }
}
