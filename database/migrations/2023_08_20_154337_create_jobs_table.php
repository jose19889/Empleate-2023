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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->text('job_sumary', 100)->nullable();
            $table->text('vacancy', 100)->nullable();
            $table->integer('cat_id');
            $table->text('job_salary')->nullable();
            $table->integer('entity_id');
            $table->integer('province_id');
            $table->integer('city_id');
            //$table->text('expiration_date', 100)->nullable();
            //$table->text('docs_required', 100)->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
            //$table->boolean('active')->default(true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }

   
};
