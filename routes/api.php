<?php

use App\Http\Controllers\API\HospitalController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\Api\DoctorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'], function () {
    Route::get('news', [NewsController::class, 'all']);
    Route::get('hospitals', [HospitalController::class, 'all']);
    Route::get('doctors', [DoctorController::class, 'all']);
});
