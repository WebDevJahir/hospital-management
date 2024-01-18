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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('project_id');
            $table->integer('month');
            $table->integer('year');
            $table->float('total_hours')->nullable();
            $table->float('hours_rate')->nullable();
            $table->float('total_hours_amount')->nullable();
            $table->float('monthly_salary')->nullable();
            $table->float('monthly_rate')->nullable();
            $table->float('total_month_amount')->nullable();
            $table->float('food')->nullable();
            $table->float('food_rate')->nullable();
            $table->float('total_food_amount')->nullable();
            $table->float('oncall_onduty')->nullable();
            $table->float('oncall_onduty_rate')->nullable();
            $table->float('total_oncall_onduty_amount')->nullable();
            $table->float('oncall_offduty')->nullable();
            $table->float('oncall_offduty_rate')->nullable();
            $table->float('total_oncall_offduty_amount')->nullable();
            $table->float('conveyance')->nullable();
            $table->float('conveyance_rate')->nullable();
            $table->float('total_conveyance_amount')->nullable();
            $table->float('increment')->nullable();
            $table->float('increment_rate')->nullable();
            $table->float('total_increment_amount')->nullable();
            $table->float('extra_payment')->nullable();
            $table->float('extra_payment_rate')->nullable();
            $table->float('total_extra_payment_amount')->nullable();
            $table->float('bonus')->nullable();
            $table->float('bonus_rate')->nullable();
            $table->float('total_bonus_amount')->nullable();
            $table->float('provident_fund')->nullable();
            $table->float('provident_fund_rate')->nullable();
            $table->float('total_provident_fund_amount')->nullable();
            $table->float('pay_leave')->nullable();
            $table->float('pay_leave_rate')->nullable();
            $table->float('total_pay_leave_amount')->nullable();
            $table->float('sick_leave')->nullable();
            $table->float('sick_leave_rate')->nullable();
            $table->float('total_sick_leave_amount')->nullable();
            $table->float('emergency_leave')->nullable();
            $table->float('emergency_leave_rate')->nullable();
            $table->float('total_emergency_leave_amount')->nullable();
            $table->float('casual_leave')->nullable();
            $table->float('casual_leave_rate')->nullable();
            $table->float('total_casual_leave_amount')->nullable();
            $table->float('educational_leave')->nullable();
            $table->float('educational_leave_rate')->nullable();
            $table->float('total_educational_leave_amount')->nullable();
            $table->float('roster')->nullable();
            $table->float('roster_rate')->nullable();
            $table->float('total_roster_amount')->nullable();
            $table->float('night')->nullable();
            $table->float('night_rate')->nullable();
            $table->float('total_night_amount')->nullable();
            $table->float('deduction')->nullable();
            $table->float('deduction_rate')->nullable();
            $table->float('total_deduction_amount')->nullable();
            $table->float('total_salary')->nullable();
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
        Schema::dropIfExists('salaries');
    }
};
