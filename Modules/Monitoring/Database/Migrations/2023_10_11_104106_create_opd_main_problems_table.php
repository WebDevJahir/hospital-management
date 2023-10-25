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
        Schema::create('opd_main_problems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('opd_patient_infos_id');
            $table->string('bp');
            $table->string('pulse');
            $table->string('temp');
            $table->string('o2saturation');
            $table->string('pain');
            $table->text('main_problem');
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
        Schema::dropIfExists('opd_main_problems');
    }
};
