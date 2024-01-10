<?php

use Illuminate\Support\Facades\Route;
use Modules\Accounts\Http\Controllers\InvoiceController;
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
        'invoice' => InvoiceController::class,
    ]);
    Route::get('update-invoice-status', [InvoiceController::class, 'updateInvoiceStatus'])->name('update-invoice-status');
    Route::get('get-advance-modal', [InvoiceController::class, 'getAdvanceModal'])->name('get-advance-modal');
    Route::post('add-advance', [InvoiceController::class, 'addAdvance'])->name('add-advance');
    Route::get('delete-advance', [InvoiceController::class, 'deleteAdvance'])->name('delete-advance');
});
