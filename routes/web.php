<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommonApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin-login', [AuthController::class, 'index'])->name('admin-login');
//Route::get('login', 'AuthController@index');
Route::get('logout',  [AuthController::class, 'logout']);
Route::post('post-login',  [AuthController::class, 'postLogin']);

Route::get('/dashboard', [AuthController::class, 'dashboard']);

Route::get('get-account-head', [CommonApiController::class, 'getAccountHead']);
Route::get('get-sub-category', [CommonApiController::class, 'getSubCategory']);
Route::get('get-charge', [CommonApiController::class, 'getCharge']);
Route::get('get-income-head', [CommonApiController::class, 'getIncomeHead'])->name('get-income-head');
Route::get('get-income-subcategory', [CommonApiController::class, 'getIncomeSubCategory'])->name('get-income-subcategory');
Route::get('get-expense-head', [CommonApiController::class, 'getExpenseHead'])->name('get-expense-head');
Route::get('get-expense-sub-category', [CommonApiController::class, 'getExpenseSubCategory'])->name('get-expense-sub-category');
Route::get('get-income-subcategory-vat', [CommonApiController::class, 'getIncomeSubCategoryVat'])->name('get-income-subcategory-vat');
Route::get('get-payment-method', [CommonApiController::class, 'getPaymentMethod'])->name('get-payment-method');
