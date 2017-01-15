<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('description')->nullable()->default(null);
            $table->boolean('is_favorite')->default(false);
            $table->tinyInteger('status')->default(0);
            $table->integer('user_id')->index();
            $table->integer('category_id')->index();
            $table->integer('start_location_id')->index()->nullable();
            $table->integer('end_location_id')->index()->nullable();
            $table->dateTime('started_at');
            $table->dateTime('ended_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
