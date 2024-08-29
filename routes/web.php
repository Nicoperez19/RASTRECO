<?php

use App\Http\Controllers\SensorDataController;

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/data-dht11', [SensorDataController::class, 'showViewdht11'])->name('Datos_dht11');
Route::get('/data-rain', [SensorDataController::class, 'showViewrain'])->name('Datos_rain');
Route::get('/data-water', [SensorDataController::class, 'showViewwater'])->name('Datos_water');
Route::get('/data-lux', [SensorDataController::class, 'showViewlux'])->name('Datos_lux');
Route::get('/data-ground', [SensorDataController::class, 'showViewground'])->name('Datos_ground');




