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
        Schema::create('patient_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->string('religion')->nullable();
            $table->string('dob')->nullable();
            $table->string('alternate_email')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('nationality')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('nid_passport')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('family_member')->nullable();
            $table->string('contact_person_relation')->nullable();
            $table->string('occupation')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('doctor_contact_person')->nullable();
            $table->string('contact_person_number')->nullable();
            $table->string('social_status')->nullable();
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
        Schema::dropIfExists('patient_details');
    }
};
