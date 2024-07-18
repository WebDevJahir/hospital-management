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
        Schema::create('previous_treatments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->string('surgery_name')->nullable();
            $table->string('date')->nullable();
            $table->string('chemotherapy')->nullable();
            $table->string('radiotherapy')->nullable();
            $table->string('pain')->nullable();
            $table->string('short_to_breath')->nullable();
            $table->string('lack_of_weakness')->nullable();
            $table->string('nausea')->nullable();
            $table->string('vomiting')->nullable();
            $table->string('appetite')->nullable();
            $table->string('constipation')->nullable();
            $table->string('dry_mouth')->nullable();
            $table->string('drowsiness')->nullable();
            $table->string('morbility')->nullable();
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
        Schema::dropIfExists('previous_treatments');
    }
};
