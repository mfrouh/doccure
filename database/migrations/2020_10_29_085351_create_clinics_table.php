<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade')->onUpdate('cascade');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->time('open');
            $table->time('close');
            $table->enum('time_appointment',['15','30','45','60'])->default('15');
            $table->integer('price');
            $table->json('days_work');
            $table->enum('type_booking',['7','14','30'])->default('7');
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
        Schema::dropIfExists('clinics');
    }
}
