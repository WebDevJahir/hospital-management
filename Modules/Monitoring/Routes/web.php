<?php

use Illuminate\Support\Facades\Route;
use Modules\Monitoring\Http\Controllers\CommonController;
use Modules\Monitoring\Http\Controllers\InvestigationCategoryController;
use Modules\Monitoring\Http\Controllers\InvestigationReportController;
use Modules\Monitoring\Http\Controllers\InvestigationSubCategoryController;
use Modules\Monitoring\Http\Controllers\PainClcAssmntController;
use Modules\Monitoring\Http\Controllers\WoundDescribeController;
use Modules\Monitoring\Http\Controllers\PrescriptionController;
use Modules\Monitoring\Http\Requests\InvestigationRequest;

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

Route::prefix('monitoring')->group(function () {
    Route::resources([
        'investigation-categories' => InvestigationCategoryController::class,
        'investigation-sub-categories' => InvestigationSubCategoryController::class,
        'wound-describes' => WoundDescribeController::class,
        'prescription' => PrescriptionController::class,
        'investigation' => InvestigationReportController::class,
    ]);
    Route::get('prescription/{patient}/create', [PrescriptionController::class, 'create'])->name('prescription.create');
    Route::get('get-investigation', [PrescriptionController::class, 'getInvestigation'])->name('get-investigation');
    Route::prefix('pain-clinic')->group(function () {
        Route::resources([
            'assesment' => PainClcAssmntController::class,
        ]);
    });
    Route::get('get-patients', [CommonController::class, 'getPatients'])->name('get-patients');
    Route::get('active-medicine', [PrescriptionController::class, 'activeMedicine'])->name('active-medicine');
    Route::get('cancel-medicine', [PrescriptionController::class, 'cancelMedicine'])->name('cancel-medicine');
    Route::get('add-medicine', [PrescriptionController::class, 'store'])->name('add-medicine');
    Route::get('edit-medicine', [PrescriptionController::class, 'edit'])->name('edit-medicine');
    Route::post('update-medicine', [PrescriptionController::class, 'update'])->name('update-medicine');
    Route::get('get-normal-value', [InvestigationSubCategoryController::class, 'getNormalValue'])->name('get-normal-value');
});
