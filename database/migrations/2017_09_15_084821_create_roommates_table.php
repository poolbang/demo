<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoommatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roommates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('city')->nullable();;
            $table->text('describe')->nullable();
            $table->double('rent', 20,4)->default('0.0000');
            $table->tinyInteger('user_card')->default(1);
            $table->tinyInteger('short_rent')->default(0);
            $table->text('roommate_tags')->nullable();
            $table->string('address')->nullable();
            $table->date('move_time');
            $table->tinyInteger('is_show')->default(1);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roommates');
    }
}
