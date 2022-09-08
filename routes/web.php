<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorCategoryController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HospitalController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('news', NewsController::class);
Route::resource('hospital', HospitalController::class);
Route::resource('doctor-category', DoctorCategoryController::class);
Route::resource('doctor', DoctorController::class);
