<?php

use App\Models\CategoryPost;
use Illuminate\Database\Seeder;

class CategoryPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryPost::truncate();
        factory(CategoryPost::class, config('settings.seed.number_of_category_post'))->create();
    }
}
