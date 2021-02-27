<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\ValuationController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\SubcriteriaController;

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
    return redirect('login');
});

Auth::routes();

Route::get('home',[HomeController::class,'index'])->name('home');
Route::resource('criterias', CriteriaController::class);
Route::resource('subcriterias', SubcriteriaController::class);
Route::get('alternatifs/data', [AlternatifController::class,'data']);
Route::resource('alternatifs', AlternatifController::class);
Route::get('valuations/results',[ValuationController::class,'results']);
Route::resource('valuations', ValuationController::class);