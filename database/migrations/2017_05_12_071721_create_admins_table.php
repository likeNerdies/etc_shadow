<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dni',9)->nullable()->unique();
            $table->string('name',100);
            $table->string('first_surname',100);
            $table->string('second_surname',100)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('phone_number')->nullable();
            $table->boolean('can_create')->nullable()->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
