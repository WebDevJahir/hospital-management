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
        Schema::create('functional_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->cascadeOnDelete();
            $table->string('metal_status')->nullable();
            $table->string('mobility')->nullable();
            $table->string('feeding')->nullable();
            $table->string('medical_accessory')->nullable();
            $table->string('previous_medication')->nullable();
            $table->string('others')->nullable();
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
        Schema::dropIfExists('functional_statuses');
    }
};
