<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\awalController;
use App\Http\Controllers\laporanController;

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

route::middleware(['auth'])->group(function(){
    Route::resource('contoh', tubes::class);
    Route::resource('laporan', laporanController::class);
    Route::resource('awal', awalController::class);
    Route::get('/laporan', [laporanController::class, 'create']);
    Route::get('/laporanDetail', [laporanController::class, 'store']);

});








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
