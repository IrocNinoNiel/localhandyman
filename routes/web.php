<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'CheckType:user'],function(){ 
    Route::get('/appointment', [App\Http\Controllers\AppointmentController::class, 'index'])->name('appointment.index');
    Route::post('/appointment', [App\Http\Controllers\AppointmentController::class, 'submitAppointment'])->name('appointment.submitAppointment');
});

Route::group(['middleware' => 'CheckType:admin'],function(){ 
    Route::get('/addadmin', [App\Http\Controllers\AdminController::class, 'index'])->name('registeradmin.index');
    Route::post('/addadmin', [App\Http\Controllers\AdminController::class, 'store'])->name('registeradmin.store');
});