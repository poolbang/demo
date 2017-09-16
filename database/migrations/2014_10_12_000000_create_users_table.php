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
            $table->string('username')->nullable()->index();
            $table->string('email')->nullable()->index();
            $table->string('mobile')->unique();
            $table->string('remember_token')->nullable();
            $table->string('city')->nullable();
            $table->string('avatar')->nullable();
            $table->string('password')->nullable();
            $table->enum('gender', ['male', 'female', 'unselected'])->default('unselected');
            $table->integer('notification_count')->default(0);
            $table->integer('message_count')->default(0);
            $table->integer('follower_count')->default(0);
            $table->string('introduction')->nullable();
            $table->enum('email_notify_enabled', ['yes',  'no'])->default('no')->index();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
