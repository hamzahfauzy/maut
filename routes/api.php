<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LogController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\GroupController;
use App\Http\Controllers\API\MediumController;
use App\Http\Controllers\API\RegencyController;
use App\Http\Controllers\API\VillageController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\DistrictController;
use App\Http\Controllers\API\ProvinceController;

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

Route::post('login', [UserController::class,'login']);

Route::middleware('auth:api')->group(function() {
    Route::get('details', [UserController::class,'details']);
    
    Route::resource('provinces', ProvinceController::class);
    Route::resource('regencies', RegencyController::class);
    Route::resource('districts', DistrictController::class);
    Route::resource('villages', VillageController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('media', MediumController::class);
    Route::resource('logs', LogController::class);
    Route::resource('news', NewsController::class);
});
