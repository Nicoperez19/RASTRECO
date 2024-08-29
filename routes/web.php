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
Route::get('/tabladatosdht11', function () {
    return view('data_dht11');
})->name('Datos_dht11');
Route::get('/tabladatosground', function () {
    return view('data_ground');
})->name('Datos_ground');
Route::get('/tabladatoslux', function () {
    return view('data_lux');
})->name('Datos_lux');
Route::get('/tabladatosrain', function () {
    return view('data_rain');
})->name('Datos_rain');
Route::get('/tabladatoswater', function () {
    return view('data_water');
})->name('Datos_water');

Route::get('/data-dht11', [SensorDataController::class, 'showViewdht11'])->name('data.dht11');
