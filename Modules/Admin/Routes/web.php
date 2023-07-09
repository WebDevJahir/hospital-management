<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\StaffController;

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
});
