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
        Schema::create('income_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('income_head_id')->nullable();
            $table->integer('project_id')->nullable();
            $table->double('price', 8, 2)->nullable();
            $table->tinyInteger('vat')->nullable();
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
        Schema::dropIfExists('income_sub_categories');
    }
};
