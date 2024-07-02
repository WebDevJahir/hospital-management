<?php

use Illuminate\Support\Facades\Route;
use Modules\Monitoring\Entities\PsychologicalStatus;
use Modules\Monitoring\Http\Controllers\CommonController;
use Modules\Monitoring\Http\Controllers\DeathCertificateController;
use Modules\Monitoring\Http\Controllers\InvestigationCategoryController;
use Modules\Monitoring\Http\Controllers\InvestigationSubCategoryController;
use Modules\Monitoring\Http\Controllers\WoundDescribeController;
use Modules\Monitoring\Http\Controllers\PrescriptionController;
use Modules\Monitoring\Http\Controllers\InvestigationController;
use Modules\Monitoring\Http\Controllers\NextPlanController;
use Modules\Monitoring\Http\Controllers\FollowUpController;
use Modules\Monitoring\Http\Controllers\OpdPrescriptionController;
use Modules\Monitoring\Http\Controllers\PainAssesmentController;
use Modules\Monitoring\Http\Controllers\PainManagementController;
use Modules\Monitoring\Http\Controllers\PainMonitoringController;
use Modules\Monitoring\Http\Controllers\WoundManagementController;
use Modules\Monitoring\Http\Controllers\PsychoAssesmentController;
use Modules\Monitoring\Http\Controllers\PsychologicalStatusesController;

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
        'investigation' => InvestigationController::class,
        'next-plan' => NextPlanController::class,
        'patient-follow-up' => FollowUpController::class,
        'death-certificate' => DeathCertificateController::class,
        'opd-prescription' => OpdPrescriptionController::class,
        'pain-assesment' => PainAssesmentController::class,
        'pain-management' => PainManagementController::class,
        'pain-monitoring' => PainMonitoringController::class,
        'wound-management' => WoundManagementController::class,
        'psychological-status' => PsychologicalStatusesController::class,
    ]);
    Route::get('prescription/{patient}/create', [PrescriptionController::class, 'create'])->name('prescription.create');
    Route::get('get-investigation', [PrescriptionController::class, 'getInvestigation'])->name('get-investigation');
    Route::get('get-patients', [CommonController::class, 'getPatients'])->name('get-patients');
    Route::get('active-medicine', [PrescriptionController::class, 'activeMedicine'])->name('active-medicine');
    Route::get('cancel-medicine', [PrescriptionController::class, 'cancelMedicine'])->name('cancel-medicine');
    Route::get('get-normal-value', [InvestigationSubCategoryController::class, 'getNormalValue'])->name('get-normal-value');
    Route::get('get-opd-prescription-information', [OpdPrescriptionController::class, 'getOpdPrescriptionInformation'])->name('get-opd-prescription-information');
    Route::get('patient-wise-follow-up/{patient}', [FollowUpController::class, 'patientWiseFollowUp'])->name('patient-wise-follow-up');
    Route::get('pain-assesment-list', [PainAssesmentController::class, 'list'])->name('pain-assesment-list');
    Route::get('pain-management-list', [PainManagementController::class, 'list'])->name('pain-management-list');
    Route::get('pain-monitoring-list', [PainMonitoringController::class, 'list'])->name('pain-monitoring-list');
    Route::get('wound-describe-list', [WoundDescribeController::class, 'list'])->name('wound-describe-list');
    Route::get('wound-management-list', [WoundManagementController::class, 'list'])->name('wound-management-list');
    Route::get('psychological-status-list', [PsychologicalStatusesController::class, 'list'])->name('psychological-status-list');
});
