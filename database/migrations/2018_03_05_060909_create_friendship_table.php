<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friendship', function (Blueprint $table) {
            $table->unsignedInteger('user_one');
            $table->unsignedInteger('user_two');
            $table->integer('status');
            $table->unsignedInteger('action_user_id');
            $table->timestamps();

            $table->unique(['user_one', 'user_two']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friendship');
    }
}
