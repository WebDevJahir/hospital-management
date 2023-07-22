<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\StaffController;
use Modules\Admin\Http\Controllers\DoctorController;
use Modules\Admin\Http\Controllers\ProjectController;
use Modules\Admin\Http\Controllers\IncomeHeadController;
use Modules\Admin\Http\Controllers\IncomeSubCategoryController;

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

    //Video Consultation Doctor
    Route::get('doctor-list', 'DoctorController@index');
    Route::get('add-doctor', 'DoctorController@addDoctor');
    Route::post('edit-doctor', 'DoctorController@editDoctor');
    Route::post('update-doctor', 'DoctorController@updateDoctor');
    Route::post('delete-doctor-view', 'DoctorController@deleteDoctorView');
    Route::post('delete-doctor', 'DoctorController@deleteDoctor');

    //Prescription Doctor
    Route::get('prescription-doctor-list', 'DoctorController@prescriptionDoctorList');
    Route::post('add-prescription-doctor', 'DoctorController@addPrescriptionDoctor');
    Route::post('edit-prescription-doctor', 'DoctorController@editPrescriptionDoctor');
    Route::post('update-prescription-doctor/{id}', 'DoctorController@updatePrescriptionDoctor');
    Route::post('delete-prescription-doctor', 'DoctorController@deletePrescriptionDoctor');

    //Attendance
    Route::get('attendance', 'AttendanceController@staffAttendance');
    Route::post('add-attendance', 'AttendanceController@addAttendance');
    Route::post('attendance-report/{id}', 'AttendanceController@getReport');

    //Project
    Route::get('projects', 'ProjectInfoController@index');
    Route::post('add-project', 'ProjectInfoController@add');
    Route::post('delete-project-view', 'ProjectInfoController@deleteView');
    Route::post('delete-project', 'ProjectInfoController@remove');
    Route::post('edit-project-view', 'ProjectInfoController@editProjectView');
    Route::post('update-project', 'ProjectInfoController@updateProject');

    //income head
    Route::resources([
        'staffs' => StaffController::class,
        'doctors' => DoctorController::class,
        'income-head' => IncomeHeadController::class,
        'income-sub-category' => IncomeSubCategoryController::class,
        'project' => ProjectController::class,
        'expense-head' => ExpenseHeadController::class,
        'expense-sub-category' => ExpenseSubCategoryController::class,
    ]);
});
