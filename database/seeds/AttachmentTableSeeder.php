<?php

use App\Models\Attachment;
use Illuminate\Database\Seeder;

class AttachmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attachment::truncate();
        factory(Attachment::class, config('settings.seed.number_of_attachment'))->create();
    }
}
