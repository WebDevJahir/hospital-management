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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $talle->string('invoice_no')->nullable();
            $table->date('date')->nullable();
            $table->foreignId('project_id')->nullable()->constrained('projects')->onDelete('cascade');\
            $table->string('type')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('received_by')->nullable();
            $table->string('created_by')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('total')->nullable();
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
        Schema::dropIfExists('expenses');
    }
};
