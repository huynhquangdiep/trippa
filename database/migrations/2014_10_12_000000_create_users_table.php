<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 50)->unique();
            $table->string('fullname', 100)->nullable()->default(null);
            $table->string('email', 255)->unique();
            $table->tinyInteger('gender')->nullable()->default(1);
            $table->text('introduction')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('avatar')->nullable()->default(null);
            $table->string('password', 128);
            $table->tinyInteger('status')->default(0);
            $table->dateTime('birthday')->nullable()->default(null);
            $table->dateTime('last_logged_at')->nullable()->default(null);
            $table->dateTime('password_changed_at')->nullable()->default(null);
            $table->text('api_token')->nullable()->default(null);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
