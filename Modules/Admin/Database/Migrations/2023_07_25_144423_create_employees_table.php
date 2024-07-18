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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('email')->nullable();
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('password');
            $table->string('text_password')->nullable();
            $table->string('image')->nullable();
            $table->string('document_no')->nullable();
            $table->string('guardian_document_no')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('alternative_contact_number')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('reference')->nullable();
            $table->string('designation')->nullable();
            $table->string('role_id')->nullable();
            $table->string('employee_type')->nullable();
            $table->text('doctor_description')->nullable();
            $table->string('bmdc_reg_no')->nullable();
            $table->string('bnc_reg_no')->nullable();
            $table->decimal('montyly_salary', 10, 2)->default(0.00);
            $table->decimal('hourly_salary', 10, 2)->default(0.00);
            $table->string('roster')->nullable();
            $table->boolean('food')->default(false);
            $table->boolean('night')->default(false);
            $table->boolean('oncall_onduty')->default(false);
            $table->boolean('oncall_offduty')->default(false);
            $table->decimal('conveyance', 10, 2)->default(0.00);
            $table->decimal('increment', 10, 2)->default(0.00);
            $table->decimal('bonus', 10, 2)->default(0.00);
            $table->decimal('provident_fund', 10, 2)->default(0.00);
            $table->integer('casual_leave')->default(0);
            $table->integer('sick_leave')->default(0);
            $table->integer('emergency_leave')->default(0);
            $table->integer('pay_leave')->default(0);
            $table->integer('special_leave')->default(0);
            $table->string('status')->nullable();
            $table->decimal('deduction', 10, 2)->default(0.00);
            $table->string('username')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
