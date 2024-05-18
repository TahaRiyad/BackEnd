<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('Patient_id');
            $table->string('FirstName');
            $table->string('MiddleName')->nullable();
            $table->string('LastName');
            $table->string('Phone');
            $table->string('Email')->unique();
            $table->string('Password');
            $table->char('Gender', 1);
            $table->string('Country');
            $table->string('City');
            $table->string('Street');
            $table->timestamps();
        });
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('Doctor_id');
            $table->string('FirstName');
            $table->string('MiddleName')->nullable();
            $table->string('LastName');
            $table->string('Phone');
            $table->string('Email')->unique();
            $table->string('Password');
            $table->char('Gender', 1);
            $table->string('Country');
            $table->string('City');
            $table->string('Street');
            $table->string('Speciality');
            $table->timestamps();
        });
        Schema::create('medications', function (Blueprint $table) {
            $table->bigIncrements('Medication_id');
            $table->string('Name');
            $table->string('Dosage');
            $table->string('Frequency');
            $table->bigInteger('Patient_id')->unsigned();
            $table->bigInteger('Doctor_id')->unsigned();
            $table->foreign('Patient_id')->references('Patient_id')->on('patients');
            $table->foreign('Doctor_id')->references('Doctor_id')->on('doctors');
            $table->timestamps();
        });
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('Appointment_id');
            $table->dateTime('Appointment_date');
            $table->string('Purpose');
            $table->bigInteger('Doctor_id')->unsigned();
            $table->bigInteger('Patient_id')->unsigned();
            $table->foreign('Doctor_id')->references('Doctor_id')->on('doctors');
            $table->foreign('Patient_id')->references('Patient_id')->on('patients');
            $table->timestamps();
        });
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->bigIncrements('History_id');
            $table->bigInteger('Patient_id')->unsigned();
            $table->string('Condition');
            $table->date('Diagnosis_Date');
            $table->text('Treatment');
            $table->foreign('Patient_id')->references('Patient_id')->on('patients');
            $table->timestamps();
        });
        Schema::create('sensors', function (Blueprint $table) {
            $table->bigIncrements('Sensor_id');
            $table->string('Type');
            $table->string('Status');
            $table->timestamps();
        });
        Schema::create('vital_signs', function (Blueprint $table) {
            $table->bigIncrements('Vital_Sign_id');
            $table->string('Name');
            $table->string('Unit');
            $table->timestamps();
        });
        Schema::create('vital_sign_records', function (Blueprint $table) {
            $table->bigIncrements('Record_id');
            $table->bigInteger('Patient_id')->unsigned();
            $table->bigInteger('Sensor_id')->unsigned();
            $table->bigInteger('Vital_Sign_id')->unsigned();
            $table->bigInteger('Doctor_id')->unsigned();
            $table->string('Value');
            $table->timestamp('Time_Stamp');
            $table->foreign('Patient_id')->references('Patient_id')->on('patients');
            $table->foreign('Sensor_id')->references('Sensor_id')->on('sensors');
            $table->foreign('Vital_Sign_id')->references('Vital_Sign_id')->on('vital_signs');
            $table->foreign('Doctor_id')->references('Doctor_id')->on('doctors');
            $table->timestamps();
        });
                                                
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
