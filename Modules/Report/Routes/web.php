<?php

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

Route::prefix('report')->group(function () {
    Route::get('cash-book-head', 'ReportController@cashBookByIncomeAndExpenseHead')->name('report.cash-book-head');
    Route::get('cash-book-sub-cat', 'ReportController@cashBookByIncomeAndExpenseSubCat')->name('report.cash-book-sub-cat');
    Route::get('salary-report', 'ReportController@salaryReport')->name('report.salary-report');

    Route::get('leave-report', 'ReportController@leaveReport')->name('report.leave-report');
});
