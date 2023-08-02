<?php

use Illuminate\Support\Facades\Route;
use Modules\Monitoring\Http\Controllers\InvestigationCategoryController;

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

Route::prefix('monitoring')->group(function() {
    Route::resources([
        'investigation-categories' => InvestigationCategoryController::class,
    ]);
});
