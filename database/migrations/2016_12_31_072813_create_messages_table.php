<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('textContent', 255);
            $table->integer('mediaType');
            $table->dateTime('sendDate');
            $table->integer('user_id')->index();
            $table->integer('attachment_id')->index()->nullable();
            $table->integer('conversation_id')->index();
            $table->integer('group_id')->index();
            $table->integer('location_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
