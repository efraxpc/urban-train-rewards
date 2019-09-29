<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('rewards');
        Schema::create('rewards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reward_name');
            $table->text('reward_description');
            $table->string('reward_image')->nullable();
            $table->string('reward_worth');
            $table->unsignedBigInteger('reward_type_id');
            $table->foreign('reward_type_id')->references('id')->on('rewards_type');
            $table->integer('offer_id');
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
        Schema::dropIfExists('rewards');
    }
}
