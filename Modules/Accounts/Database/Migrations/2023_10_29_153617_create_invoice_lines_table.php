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
        Schema::create('invoice_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id');
            $table->date('invoice_date');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('income_head_id');
            $table->unsignedBigInteger('income_subcategory_id');
            $table->date('assign_date');
            $table->date('return_date');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->text('note');
            $table->string('status');
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
        Schema::dropIfExists('invoice_lines');
    }
};
