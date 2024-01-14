<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->date('date');
            $table->date('from_date');
            $table->date('to_date');
            $table->integer('total_days');
            $table->string('leave_type');
            $table->string('recommendation_name')->nullable();
            $table->text('cause_of_leave')->nullable();
            $table->text('address_during_leave')->nullable();
            $table->text('contact_during_leave')->nullable();
            $table->string('official_name')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('approved_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
