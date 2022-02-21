<?php

use App\Http\Controllers\bill;
use App\Http\Controllers\Patient_info;
use App\Http\Controllers\reports;
use App\Http\Controllers\Reservation;
use App\Http\Controllers\service;
use App\Http\Middleware\checkschedule;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('search', [Patient_info::class,'index']);
Route::post('bill', [Patient_info::class,'bill']);
Route::get('reserve', [Patient_info::class,'reserve']);
Route::post('reservation', [Reservation::class,'index']);
Route::get('price/{id}', [service::class,'index']);
Route::post('transaction', [bill::class,'index']);
Route::get('today/{id}', [Reservation::class,'today']);
Route::get('balance/{id}', [Reservation::class,'balance']);
Route::get('todayReservation/{date}', [Reservation::class,'todayReservation']);
Route::get('report/{id}', [reports::class,'index']);
Route::get('addreport/{id}', [reports::class,'addreport']);
Route::post('adding',[reports::class,'adding']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
