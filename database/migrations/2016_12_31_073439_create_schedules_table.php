<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('seconds');
            $table->integer('type');
            $table->boolean('stopOnError');
            $table->dateTime('lastStartUtc');
            $table->dateTime('lastEndUtc');
            $table->dateTime('lastSuccessUtc');
            $table->integer('event_id')->index();
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
        Schema::dropIfExists('schedules');
    }
}
