<?php

use Illuminate\Support\Facades\Route;
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
});
