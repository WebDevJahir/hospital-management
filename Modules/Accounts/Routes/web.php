<?php

use Illuminate\Support\Facades\Route;
use Modules\Accounts\Http\Controllers\AppointmentController;
use Modules\Accounts\Http\Controllers\ExpenseController;
use Modules\Accounts\Http\Controllers\InvoiceController;
use Modules\Accounts\Http\Controllers\RosterController;
use Modules\Accounts\Http\Controllers\SalaryController;
use Modules\Admin\Http\Controllers\EmployeeController;
use Modules\Accounts\Http\Controllers\LeaveController;
use Modules\Accounts\Http\Controllers\ScheduleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('accounts')->group(function () {
    Route::get('/', 'AccountsController@index');
    Route::resources([
        'leaves' => LeaveController::class,
        'invoice' => InvoiceController::class,
        'expense' => ExpenseController::class,
        'roster' => RosterController::class,
        'salary' => SalaryController::class,
        'schedule' => ScheduleController::class,
        'appointments' => AppointmentController::class,
    ]);
    Route::get('update-invoice-status', [InvoiceController::class, 'updateInvoiceStatus'])->name('update-invoice-status');
    Route::get('get-advance-modal', [InvoiceController::class, 'getAdvanceModal'])->name('get-advance-modal');
    Route::post('add-advance', [InvoiceController::class, 'addAdvance'])->name('add-advance');
    Route::get('delete-advance', [InvoiceController::class, 'deleteAdvance'])->name('delete-advance');
    Route::get('get-same-month-roster-patient', [RosterController::class, 'getSameMonthRosterPatient'])->name('get-same-month-roster-patient');
    Route::get('roster-add-modal-view', [RosterController::class, 'rosterAddModalView'])->name('roster-add-modal-view');
    Route::get('roster-store', [RosterController::class, 'store'])->name('roster-store');
    Route::get('get-roster/{patient_id}', [RosterController::class, 'getRoster'])->name('get-roster');
    Route::get('get-roster-report', [RosterController::class, 'index'])->name('get-roster-report');
    Route::get('get-employee-info', [EmployeeController::class, 'getEmployeeInfo'])->name('get-employee-info');
    Route::get('get-roster-count', [RosterController::class, 'getRosterCount'])->name('get-roster-count');
    Route::get('get-used-leave', [LeaveController::class, 'getUsedLeave'])->name('get-used-leave');
    Route::get('get-leave', [LeaveController::class, 'getLeave'])->name('get-leave');
    Route::get('pending-leaves', [LeaveController::class, 'pendingLeaves'])->name('pending-leaves');
    Route::get('approved-leaves', [LeaveController::class, 'approvedLeaves'])->name('approved-leaves');
    Route::get('leave-details', [LeaveController::class, 'leaveDetails'])->name('leave-details');
    // /approve-leave
    Route::get('approve-leave', [LeaveController::class, 'approveLeave'])->name('approve-leave');
    Route::get('available-schedule-days', [AppointmentController::class, 'availableScheduleDays'])->name('available-schedule-days');
    Route::get('check-serial', [AppointmentController::class, 'checkSerial'])->name('check-serial');
    Route::get('appointments-approve', [AppointmentController::class, 'appointmentApproved'])->name('appointments.approve');
});
