<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\IncomeHeadController;
use Modules\Admin\Http\Controllers\IncomeSubCategoryController;
use Modules\Admin\Http\Controllers\ProjectController;
use Modules\Admin\Http\Controllers\StaffController;
use Modules\Admin\Http\Controllers\ExpenseHeadController;
use Modules\Admin\Http\Controllers\ExpenseSubCategoryController;
use Modules\Admin\Http\Controllers\CityController;
use Modules\Admin\Http\Controllers\CommonController;
use Modules\Admin\Http\Controllers\PoliceStationController;
use Modules\Admin\Http\Controllers\DeliveryChargeController;
use Modules\Admin\Http\Controllers\MedicalSupportController;
use Modules\Admin\Http\Controllers\ServiceChargeController;
use Modules\Admin\Http\Controllers\MedicalProcedureController;
use Modules\Admin\Http\Controllers\AlliedHealthController;
use Modules\Admin\Http\Controllers\InstrumentController;

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

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index');
    //staff
    Route::get('staff-list', [StaffController::class, 'index']);
    Route::post('add-staff', [StaffController::class, 'addStaff']);
    Route::get('edit-staff', [StaffController::class, 'editStaff']);
    Route::post('update-staff/{id}', [StaffController::class, 'updateStaff']);
    Route::post('delete-staff', [StaffController::class, 'deleteStaff']);
    //income head
    Route::resources([
        'income-head' => IncomeHeadController::class,
        'income-sub-category' => IncomeSubCategoryController::class,
        'project' => ProjectController::class,
        'expense-head' => ExpenseHeadController::class,
        'expense-sub-category' => ExpenseSubCategoryController::class,
        'city' => CityController::class,
        'police-station' => PoliceStationController::class,
        'delivery-charge' => DeliveryChargeController::class,
        'service-charge' => ServiceChargeController::class,
        'medical-support' => MedicalSupportController::class,
        'medical-procedure' => MedicalProcedureController::class,
        'allied-health' => AlliedHealthController::class,
        'instrument' => InstrumentController::class,
        'product' => ProductController::class,
    ]);
});

Route::get('get-police-station', [PoliceStationController::class, 'getPoliceStation'])->name('get-police-station');
Route::get('get-income-heads', [CommonController::class, 'getIncomeHeads'])->name('get-income-heads');
Route::get('get-income-sub-categories', [CommonController::class, 'getIncomeSubCategories'])->name('get-income-sub-categories');
Route::get('get-income-heads-sub-category-edit', [CommonController::class, 'getIncomeHeadsAndSubCategories'])->name('get-income-heads-sub-category-edit');
