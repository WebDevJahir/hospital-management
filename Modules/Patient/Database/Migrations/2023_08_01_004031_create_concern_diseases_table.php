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
        Schema::create('concern_diseases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->cascadeOnDelete();
            $table->string('inform_diagnosis')->nullable();
            $table->string('inform_prognosis')->nullable();
            $table->string('inform_diagnosis_familly')->nullable();
            $table->string('inform_prognosis_family')->nullable();
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
        Schema::dropIfExists('concern_diseases');
    }
};
