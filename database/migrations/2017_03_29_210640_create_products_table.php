<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',150);
            $table->decimal('price',5,2);
            $table->text('description');
            $table->date('expiration_date');
            $table->string('dimension')->nullable();
            $table->unsignedInteger('weight')->comment('gramos/litros');
            $table->unsignedInteger('real_weight')->comment('gramos/litros')->nullable();
            $table->unsignedInteger('stock')->default(0);
            $table->boolean('vegetarian')->nullable()->default(0);
            $table->boolean('vegan')->nullable()->default(0);
            $table->boolean('organic')->nullable()->default(0);
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
        Schema::dropIfExists('products');
    }
}
