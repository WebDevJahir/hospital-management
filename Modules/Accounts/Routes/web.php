<?php

use Illuminate\Support\Facades\Route;
use Modules\Accounts\Http\Controllers\ExpenseController;
use Modules\Accounts\Http\Controllers\InvoiceController;
use Modules\Accounts\Http\Controllers\LeaveController;

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
    ]);
    Route::get('update-invoice-status', [InvoiceController::class, 'updateInvoiceStatus'])->name('update-invoice-status');
    Route::get('get-advance-modal', [InvoiceController::class, 'getAdvanceModal'])->name('get-advance-modal');
    Route::post('add-advance', [InvoiceController::class, 'addAdvance'])->name('add-advance');
    Route::get('delete-advance', [InvoiceController::class, 'deleteAdvance'])->name('delete-advance');
    Route::get('get-used-leave', [LeaveController::class, 'getUsedLeave'])->name('get-used-leave');
    Route::get('get-leave', [LeaveController::class, 'getLeave'])->name('get-leave');
    Route::get('pending-leaves', [LeaveController::class, 'pendingLeaves'])->name('pending-leaves');
    Route::get('approved-leaves', [LeaveController::class, 'approvedLeaves'])->name('approved-leaves');
    Route::get('leave-details', [LeaveController::class, 'leaveDetails'])->name('leave-details');
    // /approve-leave
    Route::get('approve-leave', [LeaveController::class, 'approveLeave'])->name('approve-leave');
});
