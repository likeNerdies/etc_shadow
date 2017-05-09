<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllergyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergy_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('allergy_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('allergy_user',function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('allergy_id')->references('id')->on('allergies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allergy_user');
    }
}
