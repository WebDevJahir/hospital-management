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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_type');
            $table->unsignedBigInteger('patient_id');
            $table->date('invoice_date');
            $table->string('invoice_no');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('lab_id');
            $table->decimal('sub_total', 10, 2);
            $table->decimal('deposit', 10, 2);
            $table->decimal('total', 10, 2);
            $table->string('payment_status');
            $table->decimal('advance', 10, 2);
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('thana_id');
            $table->date('date');
            $table->time('time');
            $table->text('address');
            $table->date('admission_date');
            $table->date('discharge_date');
            $table->string('discount_type');
            $table->decimal('discount', 5, 2);
            $table->decimal('discount_amount', 10, 2);
            $table->string('vat_type');
            $table->decimal('vat', 5, 2);
            $table->decimal('vat_amount', 10, 2);
            $table->text('note');
            $table->decimal('due', 10, 2);
            $table->decimal('collection_charge', 10, 2);
            $table->decimal('delivery_charge', 10, 2);
            $table->string('delivery_method');
            $table->string('payment_method');
            $table->decimal('service_charge', 10, 2);
            $table->string('tracking_status');
            $table->text('video_link');
            $table->string('assign_staff');
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
        Schema::dropIfExists('invoices');
    }
};
