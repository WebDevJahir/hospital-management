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
        Schema::create('follow_ups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->cascadeOnDelete();
            $table->date('date')->nullable();
            $table->string('place')->nullable();
            $table->string('type')->default('phone');
            $table->string('reason')->nullable();
            $table->string('functional_status')->nullable();
            $table->string('response')->nullable();
            $table->string('bd_high')->nullable();
            $table->string('bd_min')->nullable();
            $table->string('pulse')->nullable();
            $table->string('saturation')->nullable();
            $table->string('temp')->nullable();
            $table->string('intake')->nullable();
            $table->string('output')->nullable();
            $table->string('other_reason')->nullable();
            $table->string('other_response')->nullable();
            $table->string('note')->nullable();
            $table->string('insulin')->default('pending');
            $table->string('sugar')->nullable();
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
        Schema::dropIfExists('follow_ups');
    }
};
