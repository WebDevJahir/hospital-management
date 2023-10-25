<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('death_certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->date('issue_date')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('nationality')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('nid_passport')->nullable();
            $table->string('fs_type')->nullable();
            $table->string('father_spouse_name')->nullable();
            $table->string('present_address')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->text('primary_diagnosis')->nullable();
            $table->string('permanent_address')->nullable();
            $table->time('death_time')->nullable();
            $table->date('death_date')->nullable();
            $table->string('death_place')->nullable();
            $table->text('death_cause')->nullable();
            $table->date('registration_date')->nullable();
            $table->unsignedBigInteger('consultant_doctor_id')->nullable();
            $table->string('other_place')->nullable();
            $table->string('received_by')->nullable();
            $table->string('relation')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
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
        Schema::dropIfExists('death_certificates');
    }
};
