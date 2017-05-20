<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('info')->nullable();
            //$table->binary('image')->nullable(); binary -> blob -> allow only 64kb max size file...so, we need to create mediumblob with raw query
            $table->timestamps();
        });
        Schema::table('ingredients',function (Blueprint $table){
            DB::statement("ALTER TABLE ingredients ADD image MEDIUMBLOB");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
