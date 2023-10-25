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
        Schema::create('pain_management', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->string('medicine')->nullable();
            $table->string('dose')->nullable();
            $table->string('note')->nullable();
            $table->string('duration')->nullable();
            $table->time('dose1')->nullable();
            $table->time('dose2')->nullable();
            $table->time('dose3')->nullable();
            $table->time('dose4')->nullable();
            $table->time('dose5')->nullable();  
            $table->time('dose6')->nullable();
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
        Schema::dropIfExists('pain_management');
    }
};
