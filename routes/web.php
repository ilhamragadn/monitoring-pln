<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Unit\Manager_Unit\Harga\HargaPasangController as MNGRUnitHargaPasangController;
use App\Http\Controllers\UP3\Manager_Perencanaan\Calon_Pelanggan\CalonPelangganController as MNGRUP3CalonPelangganController;
use App\Http\Controllers\UP3\Manager_Perencanaan\Harga\HargaBongkarController as MNGRUP3HargaBongkarController;
use App\Http\Controllers\UP3\Manager_Perencanaan\Harga\HargaPasangController as MNGRUP3HargaPasangController;
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

//ROUTE FOR MANAGER PERENCANAAN
Route::middleware(['auth', 'verified', 'checkrole:Manager Perencanaan'])->group(function () {
    //redirect to dashboard manager
    Route::get('/dashboard-mngr-ren', function () {
        return view('up3.manager-perencanaan.dashboard.dashboard');
    })->name('dashboard.mngr.perencanaan');

    //redirect data harga
    Route::resource('/hargapasang-mngr-ren', MNGRUP3HargaPasangController::class);
    Route::resource('/hargabongkar-mngr-ren', MNGRUP3HargaBongkarController::class);
    //Route::get('/harga-pasang/data', [HargaPasangController::class, 'data'])->name('harga-pasang.data');

    //redirect data calon pelanggan
    Route::resource('/capel-mngr-ren', MNGRUP3CalonPelangganController::class);


    //redirect to configure profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//END ROUTE FOR MANAGER PERENCANAAN


//ROUTE FOR MANAGER UNIT
Route::middleware(['auth', 'verified', 'checkrole:Manager Unit'])->group(function () {
    //redirect to dashboard manager
    Route::get('/dashboard-mngr-unit', function () {
        return view('unit.manager-unit.dashboard.dashboard');
    })->name('dashboard.mngr.unit');

    //redirect data harga
    Route::resource('/hargapasang-mngr-unit', MNGRUnitHargaPasangController::class);
    //Route::get('/harga-pasang/data', [MNGRUnitHargaPasangController::class, 'data'])->name('harga-pasang.data');

    //redirect to configure profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//END ROUTE FOR MANAGER UNIT



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
