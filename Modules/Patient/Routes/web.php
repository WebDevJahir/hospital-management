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

use Illuminate\Support\Facades\Route;
use Modules\Patient\Http\Controllers\PatientController;
use Modules\Patient\Http\Controllers\PatientProfileController;

Route::prefix('patient')->group(function () {
    Route::get('/', 'AdminController@index');

    Route::resources([
        'patients' => PatientController::class,
        'patient-profile' => PatientProfileController::class,
    ]);
    Route::get('patient-plan-and-status-edit', [PatientController::class, 'planAndStatusEdit'])->name('patient.plan.and.statu.edit');
    Route::post('patient-plan-and-status-update/{id}', [PatientController::class, 'planAndStatusUpdate'])->name('patient.plan.and.status.update');
    Route::get('patient-profile-edit/{id}', [PatientProfileController::class, 'edit'])->name('patient-profile-edit');
});
