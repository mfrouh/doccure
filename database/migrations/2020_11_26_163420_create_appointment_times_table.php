<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clinic_id');
            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade')->onUpdate('cascade');
            $table->time('time');
            $table->date('day');
            $table->boolean('booked')->default(0);
            $table->unique(['clinic_id','time','day']);
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
        Schema::dropIfExists('appointment_times');
    }
}
