<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MediumController;
use App\Http\Controllers\RegencyController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProvinceController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::resource('provinces', ProvinceController::class);
Route::resource('regencies', RegencyController::class);
Route::resource('districts', DistrictController::class);
Route::resource('villages', VillageController::class);
Route::resource('groups', GroupController::class);
Route::resource('categories', CategoryController::class);
Route::resource('media', MediumController::class);
Route::resource('logs', LogController::class);
Route::resource('news', NewsController::class);