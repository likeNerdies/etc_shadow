<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoxProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('box_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('box_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('unidad');
            $table->timestamps();
        });
        Schema::table('box_product', function(Blueprint $table){
            $table->foreign('box_id')->references('id')->on('boxes');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('box_product');
    }
}
