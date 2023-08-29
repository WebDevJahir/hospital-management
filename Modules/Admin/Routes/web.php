<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Entities\District;
use Modules\Admin\Http\Controllers\VatController;
use Modules\Admin\Http\Controllers\CityController;
use Modules\Admin\Http\Controllers\StaffController;
use Modules\Admin\Http\Controllers\BannerController;
use Modules\Admin\Http\Controllers\CommonController;
use Modules\Admin\Http\Controllers\DoctorController;
use Modules\Admin\Http\Controllers\LabTestController;
use Modules\Admin\Http\Controllers\ProductController;
use Modules\Admin\Http\Controllers\ProjectController;
use Modules\Admin\Http\Controllers\EmployeeController;
use Modules\Admin\Http\Controllers\PromoCodeController;
use Modules\Admin\Http\Controllers\IncomeHeadController;
use Modules\Admin\Http\Controllers\InstrumentController;
use Modules\Admin\Http\Controllers\ExpenseHeadController;
use Modules\Admin\Http\Controllers\AlliedHealthController;
use Modules\Admin\Http\Controllers\PoliceStationController;
use Modules\Admin\Http\Controllers\ServiceChargeController;
use Modules\Admin\Http\Controllers\DeliveryChargeController;
use Modules\Admin\Http\Controllers\DistrictController;
use Modules\Admin\Http\Controllers\MedicalSupportController;
use Modules\Admin\Http\Controllers\MedicalProcedureController;
use Modules\Admin\Http\Controllers\IncomeSubCategoryController;
use Modules\Admin\Http\Controllers\ExpenseSubCategoryController;

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

    //income head
    Route::resources([
        'staffs' => StaffController::class,
        'doctors' => DoctorController::class,
        'income-head' => IncomeHeadController::class,
        'income-sub-category' => IncomeSubCategoryController::class,
        'project' => ProjectController::class,
        'expense-head' => ExpenseHeadController::class,
        'expense-sub-category' => ExpenseSubCategoryController::class,
        'district' => DistrictController::class,
        'police-station' => PoliceStationController::class,
        'delivery-charge' => DeliveryChargeController::class,
        'service-charge' => ServiceChargeController::class,
        'medical-support' => MedicalSupportController::class,
        'medical-procedure' => MedicalProcedureController::class,
        'allied-health' => AlliedHealthController::class,
        'instrument' => InstrumentController::class,
        'product' => ProductController::class,
        'lab-test' => LabTestController::class,
        'employee' => EmployeeController::class,
        'banners' => BannerController::class,
        'packages' => PackageController::class,
        'promo-codes' => PromoCodeController::class,
    ]);
    Route::match(['get', 'post'], 'vat', [VatController::class, 'index'])->name('vat');
});

Route::get('get-police-station', [PoliceStationController::class, 'getPoliceStation'])->name('get-police-station');
Route::get('get-income-heads', [CommonController::class, 'getIncomeHeads'])->name('get-income-heads');
Route::get('get-income-sub-categories', [CommonController::class, 'getIncomeSubCategories'])->name('get-income-sub-categories');
Route::get('get-income-heads-sub-category-edit', [CommonController::class, 'getIncomeHeadsAndSubCategories'])->name('get-income-heads-sub-category-edit');
Route::get('edit-staff/{id}', [EmployeeController::class, 'edit'])->name('edit.staff');
