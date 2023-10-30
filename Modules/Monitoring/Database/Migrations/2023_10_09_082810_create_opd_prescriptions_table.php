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
        Schema::create('opd_prescriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('opd_patient_infos_id');
            $table->date('date');
            $table->string('medicine_name')->nullable();
            $table->string('dose')->nullable();
            $table->string('duration')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('opd_prescriptions');
    }
};
