<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country_name');
            $table->timestamps();
        });

        Schema::create('prize_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prize_category_name');
            $table->string('prize_category_image');
            $table->text('prize_category_description');
            $table->timestamps();
        });

        Schema::create('offer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('offer_name');
            $table->string('offer_short_description');
            $table->text('offer_long_description');
            $table->string('offer_link');
            $table->string('offer_worth');
            $table->string('offer_network');
            $table->string('offer_image');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('country');
            $table->unsignedBigInteger('prize_category_id');
            $table->foreign('prize_category_id')->references('id')->on('prize_category');
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
        //Schema::dropIfExists('country');
        //Schema::dropIfExists('offer');
    }
}
