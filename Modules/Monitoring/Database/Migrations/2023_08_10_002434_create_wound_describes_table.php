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
        Schema::create('wound_describes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            // $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->string('location')->nullable();
            $table->string('site')->nullable();
            $table->string('first_occured')->nullable();
            $table->string('wound_type')->nullable();
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
        Schema::dropIfExists('wound_describes');
    }
};
