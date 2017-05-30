<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('id');
            $table->string('street');
            $table->integer('building_number');
            $table->string('building_block',5)->nullable();
            $table->integer('floor')->nullable();
            $table->string('door')->nullable();
            $table->string('postal_code');
            $table->string('town',125);
            $table->string('province',125);
            $table->string('country');
            $table->integer('user_id')->nullable()->unsigned();
            $table->timestamps();
        });
        Schema::table('addresses', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
