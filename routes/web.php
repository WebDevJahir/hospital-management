<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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