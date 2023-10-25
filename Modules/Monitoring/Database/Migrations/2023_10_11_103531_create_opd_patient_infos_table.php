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
        Schema::create('opd_patient_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('doctor_id');
            $table->date('date');
            $table->time('time');
            $table->string('blood_group');
            $table->integer('age');
            $table->string('gender');
            $table->decimal('height', 5, 2);
            $table->decimal('weight', 5, 2);
            $table->string('contact_no');
            $table->string('email')->nullable();
            $table->string('visit_no');
            $table->string('referred_by')->nullable();
            $table->text('address');
            $table->text('diagnosis')->nullable();
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
        Schema::dropIfExists('opd_patient_infos');
    }
};
