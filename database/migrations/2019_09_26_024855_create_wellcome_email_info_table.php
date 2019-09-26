<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWellcomeEmailInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wellcome_email_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tittle');
            $table->text('content');
            $table->string('pre_footer');
            $table->string('footer');
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
        Schema::dropIfExists('wellcome_email_info');
    }
}