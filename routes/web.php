<?php

use App\Http\Controllers\Harga\HargaPasangController as HargaPasangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/harga', HargaPasangController::class);
Route::get('/harga/data', [HargaPasangController::class, 'data'])->name('harga.data');
