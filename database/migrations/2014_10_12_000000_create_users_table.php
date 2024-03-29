<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('is_admin')->default('0');
            $table->decimal('points', 5, 2)->default('0');
            $table->string('username')->unique();
            $table->integer('payout')->default('0');
            $table->string('ip_address')->default('127.0.0.1');
            $table->string('role')->default('user');
            $table->string('refferal')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('campaing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('campaing_name');
            $table->unsignedBigInteger('username_id')->nullable();
            $table->foreign('username_id')->references('id')->on('users');
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
