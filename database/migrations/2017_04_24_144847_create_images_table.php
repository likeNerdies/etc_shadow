<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
           // $table->string('name')->nullable();
            //$table->string('path');
            //$table->binary('image');
            //$table->unsignedBigInteger('size')->nullable();
           // $table->string('extension')->nullable();
            $table->integer('product_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('images', function (Blueprint $table){
            DB::statement("ALTER TABLE images ADD image MEDIUMBLOB");
           $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
