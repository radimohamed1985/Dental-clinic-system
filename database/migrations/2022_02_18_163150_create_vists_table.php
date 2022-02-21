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
        Schema::create('vists', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('patient_id');
            $table->date('vist_date');
            $table->time('vist_time');
            $table->string('vist_type');
            $table->integer('vist_status');
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
        Schema::dropIfExists('vists');
    }
};
