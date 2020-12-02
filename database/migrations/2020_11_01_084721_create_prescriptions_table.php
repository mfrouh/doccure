<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clinic_id');
            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('prescriptionable_id');
            $table->string('prescriptionable_type');
            $table->unique(['clinic_id','patient_id','prescriptionable_id']);
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
        Schema::dropIfExists('prescriptions');
    }
}
