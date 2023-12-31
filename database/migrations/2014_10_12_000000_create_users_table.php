<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {$table->bigIncrements('id');
            $table->string('name');
            $table->string('second_name');
            $table->integer('role_id');
           // $table->integer('entity_id');
           $table->string('entity_id')->default('Postulante');
            $table->integer('phone')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('password_reset')->default(true);
            $table->string('images')->default('default.jpg');
            $table->timestamps();
            $table->rememberToken();
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
};
