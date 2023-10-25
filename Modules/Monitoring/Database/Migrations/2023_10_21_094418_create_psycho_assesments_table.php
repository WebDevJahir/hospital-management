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
        Schema::create('psycho_assesments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->string('anxious_or_worried')->nullable();
            $table->string('family_anxious_or_worried')->nullable();
            $table->string('feeling_depressed')->nullable();
            $table->string('felt_at_peace')->nullable();
            $table->string('share_feeling')->nullable();
            $table->string('much_information')->nullable();
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
        Schema::dropIfExists('psycho_assesments');
    }
};
