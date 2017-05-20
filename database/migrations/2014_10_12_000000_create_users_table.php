<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine='InnoDB';
            $table->increments('id');
            $table->string('dni',9)->nullable()->unique();
            $table->string('name',100);
            $table->string('first_surname',100);
            $table->string('second_surname',100)->nullable();
            $table->string('email')->unique();
            $table->string('password',150);
            $table->string('phone_number',15)->nullable();
            $table->dateTime('subscribed_at')->nullable();
            $table->unsignedInteger('plan_id')->nullable()->unsigned();
            $table->integer('address_id')->nullable()->unsigned();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
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
